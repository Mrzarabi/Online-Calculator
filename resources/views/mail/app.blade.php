<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        #main {
            background: #343a40 !important; 
            height: auto !important; 
            text-align: left !important; 
            font-family: system-ui, sans-serif !important;
        }

        .custom-style-image {
            display: flex;
            justify-content: center !important;
        }

        .main-h2 {
            color:#fff !important;
            display: block;
            text-align: center !important;
        }

        #main-div {
            color: #f6fd09 !important; 
            background-color: #343a40 !important; 
            border-radius: 4px !important;
            padding: 10px !important;
        }

        #custom-p, .custom-h4, .custom-a {
            color: #fff !important;
            text-decoration: none;
        }

        .site-color {
            color: #f6fd09 !important; 
        }

        .main-a {
            color: #fff !important; 
            display: flex !important;
            justify-content: center;
            text-align: center !important;
        }
        
        #a-1 {
            margin-right: 15px;
            font-size: .8rem !important;
            text-decoration: underline !important;
        }

        #a-2 {
            margin-left: 15px;
            font-size: .8rem !important;
            text-decoration: underline !important;
        }
    </style>
</head>
<body id="main">
    <div class="custom-style-image" style="justify-content: center !important;">
        <a href="https://samxpay.com" class="custom-a">
            <img width="150" src="{{ asset('/defaultImages/samxpay-logo-removebg-preview.png') }}" alt="logo">
        </a>
    </div>
    @php
        use Carbon\Carbon;
    @endphp

    @yield('content')

    <h6 class="main-a" style="text-align: center !important;">
        <a href="mailto:Support@Samxpay.com" class="site-color" id="a-1">Support@Samxpay.com</a>
        &
        <a href="mailto:SamxPay@gmail.com" class="site-color" id="a-2">SamxPay@gmail.com</a>
    </h6>
    <a href="https://wa.me/19286519314" class="main-a" style="style="text-align: center !important;"">
        WhatsApp: +1 928 6519 314
    </a>
    <a href="tel:SamxPayExchanger" class="main-a" style="text-align: center !important;">
        Telegram: @SamxPayExchanger  
    </a>
</body>
</html>