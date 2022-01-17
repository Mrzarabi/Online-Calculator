<?php

namespace App\Http\Controllers\V1\View;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Form\CustomerFormRequest;
use App\Http\Requests\V1\ContactUs\ContactUsRequest;
use App\Http\Requests\V1\Order\OrderRequest;
use App\Mail\accept;
use App\Mail\adminRequest;
use App\Mail\perfect;
use App\Mail\tether;
use App\Mail\welcome;
use App\Models\Calculator;
use App\Models\ContactUs;
use App\Models\Element;
use App\Models\Feedback;
use App\Models\Form;
use App\Models\Inventory;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Captcha;

class ViewController extends Controller
{
    public function index()
    {
        //TODO
        $inventory = Inventory::latest()->first();
        $perfect = false;
        $tether = false;
        return view('v1.view.layouts.index', compact('tether', 'perfect', 'inventory'));
    }

    public function tether()
    {
        $tether = true;
        return view('v1.view.layouts.index', compact('tether'));
    }

    public function perfect()
    {
        $perfect = true;
        return view('v1.view.layouts.index', compact('perfect'));
    }

    public function store(OrderRequest $request)
    {
        if(! auth()->user()) {

            return redirect()->route('login');
        } else {

            $day = Carbon::now()->day;
            $second = carbon::now()->second;
                $order = auth()->user()->orders()->create(
                    array_merge($request->all(), [
                        'order_number' => rand(0, 9999) . $day. $second,
                    ])
                ); 

            return redirect()->route('customer.forms', ['order' => $order->id]);
        }

    }

    public function createForms(Order $order)
    {
        $input = Calculator::where('id', $order->input_currency_type)->firstOrFail();
        $output = Element::where('id', $order->output_currency_type)->firstOrFail();
        return view('v1.view.layouts.form', compact('order', 'input', 'output'));
    }

    public function storeForm(CustomerFormRequest $request)
    {
        $form = [];
        if(! auth()->user()) {

            return redirect()->route('login');
        } else {
                
            $this->form = auth()->user()->forms()->create(
                array_merge($request->all(), [
                    'order_id' => $request->order_id
                ]) 
            );

            $order = Order::where('id', $request->order_id)->first();
        
            dispatch( function() use($order) {

                $tether = Calculator::where('name', 'Tether (TRC 20)')->first();
                $perfect = Calculator::where('name', 'Perfect Money')->first();
                // dd($tether->id);
                if($order->input_currency_type == $tether->id) {
    
                    Mail::to($this->form->contact_email)->send( new tether(auth()->user() ,$order));
                } elseif($order->input_currency_type == $perfect->id) {
                    
                    Mail::to($this->form->contact_email)->send( new perfect(auth()->user() ,$order));
                }
    
                
                $input = Calculator::where('id', $order->input_currency_type)->first();
                $output = Element::where('id', $order->output_currency_type)->first();
                
                Mail::to('samxpay@gamil.com')->send( new adminRequest($order, $input, $output, $this->form) );

                $this->location(auth()->user(), "User Created New Order With ID: {$order->order_number}");
            })->afterResponse();

            $this->custom_alert('Your Order', 'Submited');
            return redirect()->route('home');
        }
    }

    public function contacUs(ContactUsRequest $request) 
    {
        ContactUs::create($request->all());
        $this->custom_alert('Your Message', 'Received');
        return redirect()->back();
    }

    public function feedbacks()
    {
        $feedbacks = Feedback::with('order')->where('show', true)->latest()->paginate(5);
        
        return view('v1.view.layouts.feedback', [
            'feedbacks' => $feedbacks,
        ]);
    }

    // ================================================
    /* method : refreshCaptcha
    * @param  : 
    * @Description : return captcha code
    */// ==============================================
    public function refreshCaptcha()
    {
        return response()->json([
            'captcha' => Captcha::img()
        ]);
    }
    
    public function email()
    {  
        $order = Order::with('user')->latest()->first();
        $form = Form::where('order_id', $order->id)->first();
        $input = Calculator::where('id', $order->input_currency_type)->first();
        $output = Element::where('id', $order->output_currency_type)->first();


        return new adminRequest($order, $input, $output, $form);
    }
}
