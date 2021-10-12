@extends('mail.app')

@section('content')
<div id="main-div">
    <h2 class="main-h2">[Order Number: {{$order->order_no}}] ({{Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }})</h2>
    <h3>Hello I'm {{$user->name . " " . $user->family}}</h3>
    <h3>My Form Information Are:</h3>
    <p>My E-mail Is <a href="mailto:{{ $form->email }}" class="custom-a"> {{ $form->email }} </a></p>
    <p>My Contact E-mail Is <a href="mailto:{{ $form->contact_email }}" class="custom-a"> {{ $form->contact_email }} </a></p>
    @if (isset($input->name))
        <p>My {{$input->name}} Wallet Is <a class="custom-a"> {{ $form->wallet }} </a></p>
    @endif
    <p>My Contact E-mail Is <a href="mailto:{{ $form->contact_email }}" class="custom-a"> {{ $form->contact_email }} </a></p>
    <p>My Contact E-mail Is <a href="mailto:{{ $form->contact_email }}" class="custom-a"> {{ $form->contact_email }} </a></p>
    <p>My Contact E-mail Is <a href="mailto:{{ $form->contact_email }}" class="custom-a"> {{ $form->contact_email }} </a></p>
    @if ($user->phone)
        <p>My number Is <a href="tel:{{ $user->phone }}"> {{ $user->phone }} </a></p>
    @endif
    <h3>
        I want to trade 
        {{isset($input->name)}} 
        {{$order->input_number}}
        {{$order->input_currency_unit}} 
        TO 
        {{isset($output->name)}} 
        {{$order->output_number}} 
        {{$order->output_currency_unit}}
        .
    </h3>
</div>
@endsection