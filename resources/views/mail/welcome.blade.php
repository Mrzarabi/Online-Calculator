@extends('mail.app')

@section('content')
<h4> Welcome To SamXpay.com </h4>
<div id="main-div">
    <h5>Dear {{$user['email']}}, Thank you for creating a  SamxPay accout.</h5>
    <div>
        <h3 class="mb-0">Logging In</h3>
        <p class="mb-0 mt-0">You can access our client area at - </p>
        <a class="mt-0" href="https://samxpay.com">https://samxpay.com</a>
    </div>
    <p>Through your client area DASHBOARD. you cheack your order's status all recent and past order's history and more. </p>
    <div>
        <h3 class="mb-0">Getting Support</h3>
        <p class="mt-0">If you have any question. try our extensive list of <a href="">Frequently Asked Question Page</a> or contact us via Email/WhatsApp/Telegram/Skype - </p>
    </div>
    <div class="" style="height: 300px;">
        <div class="d-flex align-items-center">
            <h5>E-mail us at:</h5>
            <a class="mx-3 custom-font-size" href="mailto:SamxPay@gmail.com"> 
                SamxPay@gmail.com 
            </a>
            <h6 class="d-inline"> & </h6>
            <a class="mx-3 custom-font-size" href="mailto:Support@Samxpay.com">
                Support@Samxpay.com  
            </a>
        </div>
        <div class="d-flex align-items-center">
            <h5>WhatsApp us: </h5>
            <a href="https://wa.me/+19286519314" class="mx-3 custom-font-size"> 
                +1 928 6519 314  
            </a>
        </div>
        <div class="d-flex align-items-center">
            <h5>Telegram us: </h5>
            <a href="tel:SamxPayExchanger" class="mx-3 custom-font-size"> 
                @SamxPayExchanger  
            </a>
        </div>
        <div class="d-flex align-items-center extra-space">
            <h5>Skype us: </h5>
            <a href="tel:SamxPayExchanger" class="mx-3 custom-font-size"> 
                test  
            </a>
        </div>
    </div>
    
@endsection