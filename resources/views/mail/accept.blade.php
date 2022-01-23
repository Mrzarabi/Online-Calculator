@extends('mail.app')

@section('content')
<div id="main-div">
    <h2 class="main-h2">[Order Number: {{$order->order_number}}] In ({{Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }})</h2>
    <p>Dear {{$order->user->name . " " . $order->user->family}} The order:</p>
    <h3 class="text-center">
        @if (isset($order->calculator->name))
            {{$order->calculator->name}} 
        @endif
        {{$order->input_number}}
        {{$order->input_currency_unit}} 
        <br>
        TO 
        <br>
        @if (isset($order->element->name))
            {{$order->element->name}} 
        @endif
        {{$order->output_number}} 
        {{$order->output_currency_unit}}
    </h3>
    <p>
        is accepted successfully .
    </p>
    <p class="extra-space">You can see more detail in your <a href="https://samxpay.com/customer/orders">DASHBOARD</a></p>
</div>
@endsection