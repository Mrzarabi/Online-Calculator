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
use App\Mail\recieveNewContactUsMessage;
use App\Mail\tether;
use App\Mail\welcome;
use App\Models\Calculator;
use App\Models\ContactUs;
use App\Models\Element;
use App\Models\Feedback;
use App\Models\Form;
use App\Models\Financial\Inventory\Inventory;
use App\Models\Order;
use App\Rules\CustomConfirm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Captcha;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ViewController extends Controller
{
    public function index()
    {
        //TODO
        $inventory = Inventory::latest()->first();
        $perfect = false;
        $tether = false;
        return view('v1.view.pages.index', compact('tether', 'perfect', 'inventory'));
    }

    public function tether()
    {
        $perfect = false;
        $tether = true;
        return view('v1.view.pages.index', compact('tether', 'perfect'));
    }

    public function perfect()
    {
        $tether = false;
        $perfect = true;
        return view('v1.view.pages.index', compact('perfect', 'tether'));
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
        return view('v1.view.pages.form', compact('order'));
    }

    public function storeForm(Request $request)
    {
        $request->email = strtolower($request->email);
        $request->email_confirmation = strtolower($request->email_confirmation);
        // dd($request);
        $this->validate($request, [
            'email'         => 'required|string|email|max:100|confirmed',
            'email_confirmation'         => 'required|string|email|max:100|same:email',
            'contact_email' => 'required|string|email|max:100',
            'wallet'        => 'required|string|max:255',
            'telegram'      => 'nullable|string|max:50',
            'whatsApp'      => 'nullable|string|max:50',
            'skype'         => 'nullable|string|max:50',
            'extra'         => 'nullable|string|max:255',
            'cheack'        => 'required|boolean',
            'captcha'       => 'required|captcha',

            //* Relations
            'order_id'        => 'required|integer|exists:orders,id' 
        ]);
        dd($request, $request->email_confirmation);
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

            ProcessForm::dispatch($order)->delay(now()->addSeconds(10));

            // dd($time + microtime(true));
            $this->custom_alert('Your Order', 'Submited');
            return redirect()->route('home');
        }
    }

    public function contactUs(ContactUsRequest $request) 
    {
        ContactUs::create($request->all());

        Mail::to('samxpay@gmail.com')
            ->send( new recieveNewContactUsMessage( $request->name, $request->email, $request->body ) );

        $this->custom_alert('Your Message', 'Received');
        return redirect()->back();
    }

    public function feedbacks()
    {
        $feedbacks = Feedback::with('order')->where('show', true)->latest()->paginate(5);
        
        return view('v1.view.pages.feedback', [
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
        return new welcome(auth()->user());
        $order = Order::with('user')->with('form', 'calculator', 'element')->latest()->first();

        // return new accept($order);
        ProcessForm::dispatch($order);
        // return back();
    }
}
