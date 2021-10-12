@extends('v1.view.app')
@section('content')
    
    {{-- @php
        
        $ip= \Request::ip();
    $data = \Location::get($ip);
    $position = Location::get('192.168.1.1');
    dd($data);
    @endphp --}}

    <div class="row nav">
        <div class="col-12">
            @include('v1.view.layouts.navbar')
        </div>
    </div>
    <div class="row logo-styles">
        <img src="/defaultImages/samxpay-logo-removebg-preview.png" alt="logo">
    </div>
    <div class="col-md-12 custom-overflow-y">
        <div class="row top-nav">
            <div class="col-12">
                @include('v1.view.layouts.top-navbar')
            </div>
        </div>
        <div class="row content-style">
            @if (! $form && ! $tether && ! $perfect)
                <div class="col-12">
                    <livewire:view.layouts.index />
                </div>
            @endif
            @if ($form && ! $tether && ! $perfect )
                <div class="col-12 custom-overflow-y">
                    <livewire:view.layouts.form />
                </div>
            @endif
            @if ($tether)
                <div class="col-12 custom-overflow-y">
                    <livewire:view.layouts.tether />
                </div>
            @endif
            @if($perfect)
                <div class="col-12 custom-overflow-y">
                    <livewire:view.layouts.perfect />
                </div>
            @endif
        </div>
    </div>
    
    <small class="footer-reserved-text" >© SAMXPAY, All Rights Reserved</small>
@endsection