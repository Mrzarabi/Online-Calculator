<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>

        body {
            justify-content: center;
        }

        #main {
            background: #ffffff !important; 
            height: auto !important; 
            text-align: left !important; 
            font-family: system-ui, sans-serif !important;
            width: 450px;
            max-width: 450px;
            justify-content: center;
            margin: auto;
            color: #000;
        }

        .custom-qr-image {
            display: flex !important;
            justify-content: center !important;
            margin-bottom: 50px;
        }

        .custom-style-image {
            display: flex !important;
            justify-content: center !important;
            background-color: black;
            border-radius: 6px 6px 0 0;
        }

        .main-h2 {
            color:black !important;
            display: block;
            text-align: center !important;
            font-size: 1rem;
        }

        #main-div, .custom-h4, #custom-p {
            color: #000;
        }

        .custom-a {
            color: #000 !important;
            text-decoration: none;
        }

        .text-center {
            text-align: center;
        }

        .site-color {
            background-image: -webkit-linear-gradient(
                90deg,
                rgb(183, 131, 24) 0%,
                rgb(196, 149, 46) 47%,
                rgb(255, 241, 164) 73%,
                rgb(205, 148, 49) 96%
            );
            background-size: 100%;
            -webkit-background-clip: text;
            -moz-background-clip: text;
            -webkit-text-fill-color: transparent;
            -moz-text-fill-color: transparent;
            font-size: .7rem;
        }

        .main-a {
            padding: 15px;
            text-align: left !important;
        }
        
        .content {
            padding: 15px;
        }

        .footer {
            background-color: black;
            border-radius: 0 0 6px 6px;
        }

        .a-1 {
            margin: 5px 0 0 8px;
            font-size: .8rem !important;
            text-decoration: underline !important;
        }

        #a-2 {
            margin-left: 15px;
            font-size: .8rem !important;
            text-decoration: underline !important;
        }

        .custom-font-size {
            font-size: .7rem
        }

        .d-block {
            display: block;
        }

        .d-flex {
            display: flex;
        }

        .mx-3 {
            margin: 0 5px;
        }

        .align-items-center {
            align-items: center;
        }

        .custom-div-text-center {
            text-align: center !important;            
        }

        .rights-reserved {
            text-align: center;
        }

        .m-h6 {
            margin: 10px;
        } 

        .first-d-block {
            border-top: 1px solid #fbeca1;
            padding-top: 3px;
        }

        .image-soldier {
            margin-top: -50px;
        }

        .d-inline {
            display: inline;
        }

        .extra-space {
            margin-bottom: 50px;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mt-0 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div id="main">
        @php
            use Carbon\Carbon;
        @endphp
        <a href="https://samxpay.com" class="custom-style-image">
            <img width="150" src="{{ asset('/defaultImages/samxpay-logo-removebg-preview.png') }}" alt="logo">
        </a>
        <div class="content">
            

            @yield('content')

        </div>
        <div class="footer">
            <a href="https://samxpay.com" class="custom-style-image">
                <img width="100" class="image-soldier" src="{{ asset('/defaultImages/Soldier.png') }}" alt="soldier">
            </a>
            <h6 class="main-a">
                <table>
                    <tr>
                        <td>
                            <img src=" {{asset('/defaultImages/mail/footer/telegram.png')}} " alt="telegram" class="" width="25">
                        </td>
                        <td>
                            <a href="tel:SamxPayExchanger" class="site-color a-1"> 
                                @SamxPayExchanger  
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src=" {{asset('/defaultImages/mail/footer/whatsapp.png')}} " alt="whatsapp" class="" width="25">
                        </td>
                        <td>
                            <a href="https://wa.me/+19286519314" class="site-color a-1"> 
                                +1 928 6519 314  
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src=" {{asset('/defaultImages/mail/footer/email.png')}} " alt="email" class="" width="25">
                        </td>
                        <td>
                            <a href="mailto:SamxPay@gmail.com" class="site-color a-1"> 
                                SamxPay@gmail.com 
                            </a>
                            <h6 class="site-color a-1 d-inline"> & </h6>
                            <a href="mailto:Support@Samxpay.com" class="site-color a-1">
                                Support@Samxpay.com  
                            </a>
                        </td>
                    </tr>
                </table>

                <div class="d-block first-d-block">
                    <h6 class="rights-reserved site-color m-h6">Unsubscribe</h6>
                </div>
                <div class="d-block">
                    <a href="https://samxpay.com" class="site-color a-1">
                        Visit our website  
                    </a>
                    <h6 class="site-color a-1 d-inline"> | </h6>
                    <a href="https://samxpay.com/login" class="site-color a-1">
                        Log in to your account  
                    </a>
                    <h6 class="site-color a-1 d-inline"> | </h6>
                    <a href="https://samxpay.com/customer/starters" class="site-color a-1">
                        Get support  
                    </a>
                </div>
                <div class="d-block">
                    <h6 class="rights-reserved site-color m-h6">Copyright © SamxPay.com , All rights reserved.</h6>
                </div>
            </h6>
        </div>
    </div>
    
</body>
</html>