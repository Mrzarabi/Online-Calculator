<?php

namespace App\Http\Controllers\V1\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()) {

            $orders = Order::where('user_id', auth()->user()->id)->with([
                'clearing', 'form', 'feedback', 'calculator', 'element'
            ])->latest()
            ->paginate(8);

            return view('v1.customer.layouts.order.orders', compact('orders'));
        } else {

            abort(403, 'Forbidden.');
        }
    }
}
