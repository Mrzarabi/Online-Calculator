@extends('v1.view.app')
@section('content')
    <div class="container p-0 w100 h100">
        @include('v1.view.layouts.top')
        <div class="middle w100 h70">
            @if (! $form && ! $tether && ! $perfect)
                <livewire:view.layouts.index />
            @endif
            @if ($form && ! $tether && ! $perfect )
                <div class="col-12 custom-overflow-y">
                    <livewire:view.layouts.form />
                </div>
            @endif
            @if ($tether)
                <livewire:view.layouts.tether />
            @endif
            @if($perfect)
                <livewire:view.layouts.perfect />
            @endif
        </div>
        <div class="footer w100 h100">
            @include('v1.view.layouts.footer')
        </div>
    </div>
    {{-- <div class="row logo-styles">
        <div class="row nav">
            <div class="col-12">
                @include('v1.view.layouts.navbar')
            </div>
        </div>
        <img src="/defaultImages/samxpay-logo-removebg-preview.png" alt="logo">
    </div>
    <div class="">
        <div class="row top-nav">
            <div class="col-12">
                @include('v1.view.layouts.top-navbar')
            </div>
        </div>
        <div class="row content-style">
            
            
            
        </div>
    </div> --}}
    
    
@endsection