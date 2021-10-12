 

@extends('v1.view.app')
@section('content')
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
            <div class="col-md-8 offset-md-2 col-sm-12 d-flex justify-content-center align-items-center">
                <div class="site-background-color rounded p-3 text-justify">
                    <p class="mb-0 custom-font-size">
                        PayPal orders are processed in approximately 1-2 hours.
                        SamxPay send PayPal transactions as payments for “Goods and Services”.
                        PayPal may charge an additional commission to the recipient when accepting funds, which will be deducted from received amount.
                    </p>
                    <h6 class="mb-2 mt-2 site-color font-weight-lighter custom-font-size">
                        Please be careful when you are typing the email address which is linked to your PayPal account. 
                        We do not accept any responsibility if the given email address spelling is wrong by users.
                    </h6>
                    <p class="mb-0 custom-font-size">
                        Upon PayPal transaction completion and providing you with transaction ID & receipt screenshots, we will not accept any refunds from receiver PayPal account.
                    </p>
                    <h6 class="mb-2 mt-2 site-color font-weight-lighter custom-font-size">
                        Please contact us before any refunds and get sure we can accept your refunds or not. <span class="custom-text-decoration"> We will not </span> responsible for any loss if you do refunds without any further notice.
                    </h6> 
                    <div class="mt-4">
                        <h6 class="text-center">
                            <a href="mailto:Support@Samxpay.com" class="site-color">Support@Samxpay.com</a>
                            &
                            <a href="mailto:SamxPay@gmail.com" class="site-color">SamxPay@gmail.com</a>
                            <br>
                            <a href="https://wa.me/19286519314" class="site-color">
                                WhatsApp: +1 928 6519 314
                            </a>
                        </h6>
                    </div>
                    <p class="mb-0 mt-3 text-center">If we could accept your refunds, we will take 10% as fine.</p>
                    <h6 class="mb-2 mt-2 site-color font-weight-lighter text-center custom-font-size">
                        If you are not sure about your PayPal account safety and stability, please do not use our PayPal service.
                    </h6>
                </div>
            </div>
        </div>
    </div>
@endsection