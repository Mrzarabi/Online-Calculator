<?php

namespace App\Http\Controllers\V1\View;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Form\CustomerFormRequest;
use App\Http\Requests\V1\ContactUs\ContactUsRequest;
use App\Http\Requests\V1\Order\OrderRequest;
use App\Jobs\ProcessForm;
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
        return view('v1.view.layouts.form', compact('order'));
    }

    public function storeForm(CustomerFormRequest $request)
    {;
        if(! auth()->user()) {

            return redirect()->route('login');
        } else {
                
            // $time  = -microtime(true);
            $form = auth()->user()->forms()->create(
                array_merge($request->all(), [
                    'order_id' => $request->order_id
                ]) 
            );
            
            
            $order = Order::where('id', $request->order_id)->with('user', 'form', 'calculator', 'element')->first();  

            ProcessForm::dispatch($order)->delay(now()->addSeconds(20));

            // dd($time + microtime(true));
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

        $order = Order::with('user')->with('form', 'calculator', 'element')->latest()->first();

        // return new accept($order);
        ProcessForm::dispatch($order);
        // return back();
    }
}
