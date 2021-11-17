<!doctype html>
<html lang="fa">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Hidden">
    <meta name="description" content="online calculator for digital money">
    <meta name="keywords" content="Paypal, WebMoney, Tether, PerfectMoney, BitCoin">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700">
    <link rel="stylesheet" href="/view/assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/view/assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/view/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/view/assets/css/odometer-theme-default.css">
    <link rel="stylesheet" href="/view/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/view/assets/css/style.css">
    <link rel="stylesheet" href="/view/assets/css/custom.css">
    
    @yield('script')

	<title>SAMXPAY</title>
    <livewire:styles />
</head>
<body data-spy="scroll" data-target=".navbar" class="has-loading-screen">
    <audio id="sound" src="/sound/sound.mp3" preload="auto"></audio>
    {{-- <audio id="index" src="/sound/index.mp3" preload="auto"></audio> --}}
    <div class="ts-page-wrapper" id="page-top">
        {{-- @include('/v1/view/layouts/navbar') --}}
        <!--*********************************************************************************************************-->
        <!--************ HERO ***************************************************************************************-->
        <!--*********************************************************************************************************-->
        <div id="ts-hero" class="ts-animate-hero-items">
            <div class="custom-overflow-y" style="width: 100%">
                @yield('content')
            </div>
            
            <!--HERO BACKGROUND *************************************************************************************-->
            <div class="ts-background">
                <div class="ts-background-image custom-style-background-image-index" data-bg-image="/defaultImages/hero.jpg"></div>
            </div>
            <!--END HERO BACKGROUND *********************************************************************************-->
        </div>
        <!--end #hero-->
    </div>
    <!--end page-->
	<script src="/view/assets/js/custom.hero.js"></script>
	<script src="/view/assets/js/jquery-3.3.1.min.js"></script>
	<script src="/view/assets/js/popper.min.js"></script>
	<script src="/view/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/view/assets/js/imagesloaded.pkgd.min.js"></script>
	<script src="/view/assets/js/isInViewport.jquery.js"></script>
	<script src="/view/assets/js/jquery.magnific-popup.min.js"></script>
	<script src="/view/assets/js/scrolla.jquery.min.js"></script>
	<script src="/view/assets/js/jquery.validate.min.js"></script>
	<script src="/view/assets/js/jquery-validate.bootstrap-tooltip.min.js"></script>
	<script src="/view/assets/js/odometer.min.js"></script>
	<script src="/view/assets/js/owl.carousel.min.js"></script>
    <script src="/view/assets/js/custom.js"></script>
    <livewire:scripts />
    
    <script>
        $( document ).ready(function() {
            document.getElementById('index').play();
        });
    </script>
    @include('sweetalert::alert')
    @yield('script')
</body>
</html>
