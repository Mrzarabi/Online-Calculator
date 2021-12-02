     

@extends('v1.view.app')
@section('content')
    <div class="container p-0"  style="height: 100%">
        @include('v1.view.layouts.top')
        <div class="col-md-12" style="width: 100%; background-color: #0501003b; height: 70%;">
            <h6 class="site-color text-center mb-3"> TERMS AND CONDITIONS </h6>
            <div class="row d-flex justify-content-center" style="width: 100%;">
                <div class="p-4 with-linear-gradient" style="border-radius: 4px; width: 80%; height: 100%;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="left-aboutus">
                                    <div class="top-left-aboutus with-left-linear-gradient-to-bottom">
                                        <h5 class="text-left site-color pl-3 mb-3">Check Out Our Terms and Conditions</h5>
                                        <h6 class="text-justify pl-3" style="font-size: .7rem; color: rgb(251, 236, 161); font-weight: 100;
                                        line-height: 1.556;">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </h6>
                                    </div>
                                    <div class="middle-left-aboutus">
                                        {{-- <h6 class="mb-3 mt-3 site-color font-weight-lighter" style="font-size: .7rem;">
                                            Our Major focus now is to help our clients with PayPal & Cash exchanges.
                                        </h6> --}}
                                        <h6 class="text-justify mt-3 mb-3 " style="font-size: .7rem; color: rgb(251, 236, 161); font-weight: 100;
                                        line-height: 1.556;">
                                            PayPal orders are processed in approximately 1-2 hours. SamxPay send PayPal transactions as payments for “Goods and Services”.
                                            PayPal may charge an additional commission to the recipient when accepting funds, which will be deducted from received amount.
                                        </h6>
                                        <h6 class="mt-3 site-color font-weight-lighter" style="font-size: .7rem;">
                                            Please be careful when you are typing the email address which is linked to your PayPal account.
                                        </h6>
                                        <h6 class="mb-3 site-color font-weight-lighter" style="font-size: .7rem;">
                                            We do not accept any responsibility if the given email address spelling is wrong by users.
                                        </h6>
                                        <h6 class="text-justify mt-3 mb-3 " style="font-size: .7rem; color: rgb(251, 236, 161); font-weight: 100;
                                        line-height: 1.556;">
                                            Upon PayPal transaction completion and providing you with transaction ID & receipt screenshots, we will not accept any refunds from receiver PayPal account.
                                        </h6>
                                        <h6 class="mt-3 site-color font-weight-lighter" style="font-size: .7rem;">
                                            Please contact us before any refunds and get sure we can accept your refunds or not.
                                        </h6>
                                        <h6 class="mb-3 site-color font-weight-lighter" style="font-size: .7rem;">
                                            We will not responsible for any loss if you do refunds without any further notice.
                                        </h6>
                                        <h6 class="mb-4 mt-3 site-color font-weight-lighter" style="font-size: .8rem;">
                                            If we could accept your refunds, we will take 10% as fine.
                                        </h6>
                                        <h6 class="text-justify mt-3 mb-3 " style="font-size: .7rem; color: rgb(251, 236, 161); font-weight: 100;
                                        line-height: 1.556;">
                                            If you are not sure about your PayPal account safety and stability, please do not use our PayPal service.
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <img class="p-4" src="/defaultImages/Circle.png" alt="image" width="280" height="280">
                                    </div>
                                    <div class="col-md-10 offset-md-1 with-linear-gradient ">
                                        <h5 class="mb-0 mt-4 site-color font-weight-lighter text-left" style="font-size: .7rem;">
                                            GET IN TOUCH
                                        </h5>
                                        <img src="/defaultImages/Rectangle 5 copy.png" alt="line" width="30">
                                        <ul class="mt-2">
                                            <li class="d-flex"> 
                                                <span class="mr-2">
                                                    <img src="/defaultImages/6590522_email_envelope_letter_mail_message_icon.png" alt="email" width="15">
                                                </span> 
                                                <a href="mailto:Support@Samxpay.com" class="site-color font-weight-lighter mt-1" style="font-size: .7rem;"> 
                                                    Support@Samxpay.com 
                                                </a>
                                            </li>
                                            <li class="ml-4 mb-2">
                                                <a href="mailto:SamxPay@gmail.com" class="site-color font-weight-lighter mt-1" style="font-size: .7rem;"> 
                                                    SamxPay@gmail.com    
                                                </a>
                                            </li>
                                            <li class="d-flex mb-2"> 
                                                <span class="mr-2">
                                                    <img src="/defaultImages/2849827_pointer_map_location_place_multimedia_icon.png" alt="location" width="15">
                                                </span> 
                                                <h6 class="site-color font-weight-lighter mt-1" style="font-size: .7rem;">
                                                    892 Ingram Road
                                                    Eden, NC 27288
                                                </h6>    
                                            </li>
                                            <li class="d-flex mb-2"> 
                                                <span class="mr-2">
                                                    <img src="/defaultImages/2561306_phone_call_icon.png" alt="phone" width="15">
                                                </span> 
                                                <a href="tel:+13024551234" class="site-color font-weight-lighter mt-1" style="font-size: .7rem;"> 
                                                    +1 302 455 1234  
                                                </a>
                                            </li>
                                            <li class="d-flex mb-2"> 
                                                <span class="mr-2">
                                                    <img src="/defaultImages/843786_whatsapp_icon.png" alt="phone" width="15">
                                                </span> 
                                                <a href="https://wa.me/+19286519314" class="site-color font-weight-lighter mt-1" style="font-size: .7rem;"> 
                                                    +1 928 6519 314
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="footer" style="width: 100%; height: 12%;">
            @include('v1.view.layouts.footer')
        </div>
    </div>
@endsection