@extends('mail.app')

@section('content')
<div id="main-div">
    <h2 class="main-h2">[Order Number: {{$order->order_no}}] ({{Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }})</h2>
    <div class="custom-div-text-center">
        <h3>Hello I'm {{isset($order->user->name) . " " . isset($order->user->family)}} And My Form Information Are:</h3>
        <p>E-mail: <a href="mailto:{{ $form->email }}" class="custom-a"> {{ $form->email }} </a></p>
        <p>Contact E-mail:<a href="mailto:{{ $form->contact_email }}" class="custom-a"> {{ $form->contact_email }} </a></p>
        @if (isset($input->name))
            <p>{{$input->name}} Wallet: <a class="custom-a"> {{ $form->wallet }} </a></p>
        @endif
        @if ($form->telegram)
            <p>Telegram: <a href="tel:{{ $form->telegram }}" class="custom-a"> {{ $form->telegram }} </a></p>
        @endif
        @if ($form->whatsApp)
            <p>WhatsApp: <a href="https://wa.me/{{ $form->whatsApp }}" class="custom-a"> {{ $form->whatsApp }} </a></p>
        @endif
        @if ($form->skype)
            <p>Skype: <a  class="custom-a"> {{ $form->skype }} </a></p>
        @endif
        @if ($form->extra)
            <p>Extra Note: <a class="custom-a"> {{ $form->extra }} </a></p>
        @endif
        @if ($order->user->phone)
            <p>My number Is <a href="tel:{{ $order->user->phone }}" class="custom-a"> {{ $order->user->phone }} </a></p>
        @endif
        <h3>
            I want to trade 
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
            .
        </h3>
    </div>
</div>
@endsection