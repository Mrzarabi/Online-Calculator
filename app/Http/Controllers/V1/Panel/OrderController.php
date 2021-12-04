<?php

namespace App\Http\Controllers\V1\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Search\SearchRequest;
use App\Mail\accept;
use App\Models\Calculator;
use App\Models\Element;
use App\Models\Form;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399')) {

            $orders = Order::with('user')->latest()->paginate(8);
            return view('v1.panel.layouts.order.orders', compact('orders'));
        } else {

            abort(403, 'Forbidden.');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accept(Order $order)
    {
        if(auth()->user()->isAbleTo('order-accept') ) {

            if($order->accept == false) {

                DB::transaction(function () use($order) {
                    $form = $order->update([
                        'accept' => true
                    ]);
                });
                
                $form = Form::where('order_id', $order->id)->first();
                $input = Calculator::where('id', $order->input_currency_type)->first();
                $output = Element::where('id', $order->output_currency_type)->first();
                Mail::to($form->contact_email)->send( new accept($order, $input, $output) );

                $this->custom_alert('Order', 'accepted');
                
            } else {

                DB::transaction(function () use($order) {
                    $form = $order->update([
                        'accept' => false
                    ]);
                });

                $this->custom_alert('Order', 'is not accept');
            }
            return redirect()->back();
        } else {

            abort(403, 'Forbidden.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if(auth()->user()->isAbleTo('form-delete')) {

            DB::transaction(function () use($order) {
                $order->delete();
            });
            
            $this->custom_alert('Order', 'deleted');
            return redirect()->back();
        } else {

            abort(403, 'Forbidden.');
        }
    }

    public function search(SearchRequest $request)
    {
        // Search only active users
        if(auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399')) {
            
            if ($request->has('search')) {
     
                $orders = Order::search($request->get('search'))->with('user')->latest()->paginate(9);
            } else {
                
                $orders = Order::with('user')->latest()->paginate(9);
            }

            return view('v1.panel.layouts.order.orders', compact('orders'));
        } else {

            abort(403, 'Forbidden.');
        }
    }
}
