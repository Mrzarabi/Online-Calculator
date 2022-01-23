@extends('mail.app')

@section('content')
<div id="main-div">
    <h2 class="main-h2">[Order Number: {{$order->order_number}}] In ({{Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }})</h2>
    <div class="custom-div-text-center">
        @php
            // dd($input->name);  
        @endphp
        <h3>Hello I'm {{$order->user->name . " " . $order->user->family}} And My Form Information Are:</h3>
        <p>E-mail: <a href="mailto:{{ $order->form->email }}"> {{ $order->form->email }} </a></p>
        <p>Contact E-mail:<a href="mailto:{{ $order->form->contact_email }}"> {{ $order->form->contact_email }} </a></p>
        @if (isset($order->form->wallet))
            <p>{{$order->calculator->name}} Wallet: <a> {{ $order->form->wallet }} </a></p>
        @endif
        @if ($order->form->telegram)
            <p>Telegram: <a href="tel:{{ $order->form->telegram }}"> {{ $order->form->telegram }} </a></p>
        @endif
        @if ($order->form->whatsApp)
            <p>WhatsApp: <a href="https://wa.me/{{ $order->form->whatsApp }}"> {{ $order->form->whatsApp }} </a></p>
        @endif
        @if ($order->form->skype)
            <p>Skype: <a> {{ $order->form->skype }} </a></p>
        @endif
        @if ($order->form->extra)
            <p>Extra Note: <a> {{ $order->form->extra }} </a></p>
        @endif
        @if ($order->user->phone)
            <p>My number Is <a href="tel:{{ $order->user->phone }}"> {{ $order->user->phone }} </a></p>
        @endif
        <h3 class="extra-space">
            I want to trade:
            <br>
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
            .
        </h3>
    </div>
</div>
@endsection