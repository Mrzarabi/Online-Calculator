@extends('mail.app')

@section('content')
    <h2 class="main-h2">[Order Number : {{$order->order_no}}] ({{Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }})</h2>
    <div id="main-div">
        <h4 class="custom-h4">SEND TO US :<strong class="site-color"> {{$order->input_number}} $ Tether (TRC-20)</strong></h4>
        <h4 class="custom-h4">RECEIVE FROM US :<strong class="site-color"> {{$order->output_number}} $ PayPal (Goods & Services)</strong></h4>
        <p>
            Please Send {{$order->input_number}} $ to wallet below and wait for your PayPal transaction to be completed,
            you will be notified via email upon completion of transaction. 
        </p>
        <p id="custom-p">
            (PayPal Receipt Screenshot & Transaction id will be available in our email to our customers)
        </p>
        <h2 class="main-h2">TUuPMtEvetkzPEpTVatRu5oLpbMxSARLMe</h2>

        <div class="custom-style-image">
            <img width="500" src="{{ asset('/defaultImages/picture.png') }}" alt="logo">
        </div>
    </div>

@endsection