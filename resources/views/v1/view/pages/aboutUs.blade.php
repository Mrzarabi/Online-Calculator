     @extends('v1.view.app')
     @section('content')
         <div class="container p-0 custom-h100 position-relative">
             <div class="col-md-12">
                 @include('v1.view.layouts.top')
             </div>
             <div class="col-md-12 form-background">
                 <h6 class="site-color text-center mb-3"> ABOUT US </h6>
                 <div class="row d-flex justify-content-center">
                     <div class="p-4 with-linear-gradient w80">
                         <div class="col-md-12">
                             <div class="row">
                                 <div class="col-md-8 align-self-center">
                                     <div class="left-aboutus">
                                         <div class="top-left-aboutus with-left-linear-gradient-to-bottom">
                                             <h5 class="text-left site-color pl-3 mb-3">We are the Market Leader
                                                 Exchanger
                                             </h5>
                                             <h6 class="text-justify pl-3 cutom-font-size-bold">
                                                 SamxPay.com is a platform that has been specifically developed by a
                                                 team of
                                                 highly competent and experienced professionals. The main reason for
                                                 designing SamxPay.com was to provide a service where digital and
                                                 cryptocurrencies like Bitcoin/USDT or PayPal/Perfect Money could be
                                                 refilled or withdrawn.
                                             </h6>
                                         </div>
                                         <div class="middle-left-aboutus">
                                             <h5 class="my-3 text-color custom-font-size">
                                                 SamxPay.com Major focus now is to help our clients with PayPal/Perfect
                                                 Money/Tether(TRC20) & Cash exchanges.
                                             </h5>
                                             <h5 class="my-3 text-color custom-font-size">
                                                 We have been doing PayPal & Cash exchange business from 2010 through
                                                 different platforms and we have helped hundreds of online businesses
                                                 vendors from different countries globally which are not allowed to do
                                                 business via PayPal.
                                             </h5>
                                             <h5 class="my-3 text-color custom-font-size">
                                                 We hope that your experience with us at SamxPay.com became an amazing
                                                 journey for all of us. Here at SamxPay.com customer experience is at
                                                 the
                                                 heart of everything we do. It's why we come to work each day.
                                             </h5>
                                             <h5 class="text-left site-color my-3">What Are SamxPay.Com Main
                                                 Advantages?
                                             </h5>
                                             <table class="cutom-font-size-bold col-12">
                                                 <tr>
                                                     <td class="pb-3">
                                                         <span class="with-radius-gradient">1</span>
                                                         <span class="ml-2 mr-4">
                                                             Lowest possible fixed rates
                                                         </span>
                                                     </td>
                                                     <br>
                                                     <td>
                                                         <span class="with-radius-gradient">2</span>
                                                         <span class="ml-2">
                                                             24/7 Customer Service Support
                                                         </span>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td class="pb-3">
                                                         <span class="with-radius-gradient">3</span>
                                                         <span class="ml-2 mr-4">
                                                             No Personal Information Required
                                                         </span>
                                                     </td>
                                                     <td>
                                                         <span class="with-radius-gradient">4</span>
                                                         <span class="ml-2">
                                                             User Friendly Platform
                                                         </span>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td class="pb-3">
                                                         <span class="with-radius-gradient">5</span>
                                                         <span class="ml-2 mr-4">
                                                             Fast & Reliable Exchange
                                                         </span>
                                                     </td>
                                                 </tr>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="row">
                                         <div class="col-md-12 d-flex justify-content-center">
                                             <img class="p-4" src="/defaultImages/Circle.png" alt="image"
                                                 width="280" height="280">
                                         </div>
                                         <div class="col-md-10 offset-md-1 with-linear-gradient ">
                                             <h5
                                                 class="mb-0 mt-4 site-color font-weight-lighter text-left custom-font-size">
                                                 GET IN TOUCH
                                             </h5>
                                             <img src="/defaultImages/Rectangle 5 copy.png" alt="line" width="30">
                                             <ul class="mt-2">
                                                 <li class="d-flex mb-3">
                                                     <span class="mr-2">
                                                         <i class="bi bi-envelope icon-color"></i>
                                                     </span>
                                                     {{-- <a href="mailto:Support@Samxpay.com"
                                                         class="site-color font-weight-lighter mt-1 custom-font-size">
                                                         Support@Samxpay.com
                                                     </a> --}}
                                                     <a href="mailto:SamxPay@gmail.com"
                                                         class="site-color font-weight-lighter custom-font-size"
                                                         target="_blink">
                                                         SamxPay@gmail.com
                                                     </a>
                                                 </li>
                                                 {{-- <li class="ml-4 mb-2">
                                                     <a href="mailto:SamxPay@gmail.com"
                                                         class="site-color font-weight-lighter mt-1 custom-font-size">
                                                         SamxPay@gmail.com
                                                     </a>
                                                 </li> --}}
                                                 <li class="d-flex mb-3">
                                                     <span class="mr-2">
                                                         <i class="bi bi-geo-alt icon-color"></i>
                                                     </span>
                                                     <h6 class="site-color font-weight-lighter mt-1 custom-font-size">
                                                         892 Ingram Road
                                                         Eden, NC 27288
                                                     </h6>
                                                 </li>
                                                 <li class="d-flex mb-3">
                                                     <span class="mr-2">
                                                         <i class="bi bi-telephone-x icon-color"></i>
                                                     </span>
                                                     <a href="tel:+13024551234"
                                                         class="site-color font-weight-lighter mt-1 custom-font-size"
                                                         target="_blink">
                                                         +1 302 455 1234
                                                     </a>
                                                 </li>
                                                 <li class="d-flex mb-3">
                                                     <span class="mr-2">
                                                         <i class="bi bi-whatsapp icon-color"></i>
                                                     </span>
                                                     <a href="https://wa.me/+19286519314"
                                                         class="site-color font-weight-lighter login-text" target="_blink">
                                                         +1 928 6519 314
                                                     </a>
                                                 </li>
                                                 <li class="d-flex mb-3">
                                                     <span class="mr-2">
                                                         <i class="bi bi-telegram icon-color"></i>
                                                     </span>
                                                     <a href="https://wa.me/+19286519314"
                                                         class="site-color font-weight-lighter login-text" target="_blink">
                                                         Telegram
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
             <div class="col-md-12 my-3 footer">
                 @include('v1.view.layouts.footer')
             </div>
         </div>
     @endsection
