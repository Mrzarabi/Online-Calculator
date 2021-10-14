@extends('mail.app')

@section('content')
<div id="main-div">
    <h2 class="main-h2">[Order Number: {{$order->order_no}}]</h2>
    <h3>HI Dear {{$order->user->name . " " . $order->user->family}}</h3>
    <h3>
        The order :
        @if (isset($input->name))
            {{$input->name}} 
        @endif
        {{$order->input_number}}
        {{$order->input_currency_unit}} 
        TO 
        @if (isset($output->name))
            {{$output->name}} 
        @endif
        {{$order->output_number}} 
        {{$order->output_currency_unit}}
        is accepted successfully .
    </h3>
</div>
@endsection