     @extends('v1.view.app')
     @section('content')
         <div class="container p-0 position-relative custom-h100">
             <div class="row">
                 <div class="col-12">
                     @include('v1.view.layouts.top')
                 </div>
                 <div class="col-12 form-background">
                     <h6 class="site-color text-center mb-3"> CONTACT US </h6>
                     <div class="row justify-content-center align-items-center">
                         <div class="p-4 with-linear-gradient w80">
                             <div class="col-12">
                                 <div class="row">
                                     <div class="col-md-5 col-sm-12">
                                         <div class="left-aboutus">
                                             <form action=" {{ route('customer.contactUs.send') }} " method="post">
                                                 @csrf
                                                 <div class="wrap-input2 mb-3 d-flex">
                                                     <input class="bg-transparent input2" type="text" name="name" required>
                                                     <span class="focus-input2" data-placeholder="NAME"></span>
                                                     <img src="/defaultImages/user.png" class="float-right pb-3 pt-2"
                                                         alt="name" width="18" height="45">
                                                 </div>
                                                 @if ($errors->has('name'))
                                                     <span class="d-block text-danger">{{ $errors->first('name') }}</span>
                                                 @endif

                                                 <div class="wrap-input2 mb-3 d-flex">
                                                     <input class="bg-transparent input2" type="email" name="email"
                                                         required>
                                                     <span class="focus-input2" data-placeholder="EMAIL"></span>
                                                     <img src="/defaultImages/email.png" class="float-right pb-3 pt-3"
                                                         alt="email" width="18" height="46">
                                                 </div>
                                                 @if ($errors->has('email'))
                                                     <span
                                                         class="d-block text-danger">{{ $errors->first('email') }}</span>
                                                 @endif

                                                 <div class="wrap-input2 mb-2 d-flex">
                                                     <textarea class="input2 bg-transparent" name="body" required></textarea>
                                                     <span class="focus-input2" data-placeholder="TEXT"></span>
                                                     <img src="/defaultImages/4172169_edit_info_information_note_notes_icon.png"
                                                         class="float-right mt-2 pb-5" alt="text" width="18" height="66">
                                                 </div>
                                                 @if ($errors->has('body'))
                                                     <span class="d-block text-danger">{{ $errors->first('body') }}</span>
                                                 @endif

                                                 <div class="d-flex justify-content-start mb-2">
                                                     <button type="submit"
                                                         class="btn btn-sm rounded custom-btn-content">Confirm</button>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                     <div class="col-md-2"></div>
                                     <div class="col-md-5 col-sm-12">
                                         {{-- <div class="row">
                                             <div class="col-md-12 d-flex justify-content-center">
                                                 <img class="p-4" src="/defaultImages/Remember Me.png"
                                                     alt="image" width="280" height="280">
                                             </div>
                                         </div> --}}
                                         <div class="">
                                             <h5
                                                 class="mb-0 mt-4 site-color font-weight-lighter text-left custom-font-size">
                                                 GET IN TOUCH
                                             </h5>
                                             <img src="/defaultImages/Rectangle 5 copy.png" alt="line" width="30">
                                             <ul class="mt-4">
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
                             {{-- <div class="col-md-12">
                                 <ul class="d-sm-flex justify-content-start">
                                     <li class="d-flex mb-2 mr-4">
                                         <span class="mr-2">
                                             <i class="bi bi-geo-alt icon-color"></i>
                                         </span>
                                         <h6 class="site-color font-weight-lighter mt-1 login-text tes">
                                             892 Ingram Road
                                             Eden, NC 27288
                                         </h6>
                                     </li>
                                     <li class="d-flex mb-2 mr-4">
                                         <span class="mr-2">
                                             <i class="bi bi-whatsapp icon-color"></i>
                                         </span>
                                         <a href="https://wa.me/+19286519314"
                                             class="site-color font-weight-lighter login-text" target="_blink">
                                             +1 928 6519 314
                                         </a>
                                     </li>
                                     <li class="d-flex mb-2 mr-4">
                                         <span class="mr-2">
                                             <i class="bi bi-telegram icon-color"></i>
                                         </span>
                                         <a href="https://wa.me/+19286519314"
                                             class="site-color font-weight-lighter login-text" target="_blink">
                                             Telegram
                                         </a>
                                     </li>
                                     <li class="d-flex mb-2 mr-4">
                                         <span class="mr-2">
                                             <i class="bi bi-envelope icon-color"></i>
                                         </span>
                                         <a href="mailto:SamxPay@gmail.com "
                                             class="site-color font-weight-lighter login-text" target="_blink">
                                             SamxPay@gmail.com
                                         </a>
                                     </li>
                                 </ul>
                             </div> --}}
                         </div>
                     </div>
                 </div>
                 <div class="footer col-md-12 my-3">
                     @include('v1.view.layouts.footer')
                 </div>
             </div>
         </div>
     @endsection
     @section('script')
         <script>
             $('.input2').each(function() {
                 $(this).on('blur', function() {
                     if ($(this).val().trim() != "") {
                         $(this).addClass('anim');
                     } else {
                         $(this).removeClass('anim');
                     }
                 })
             })
         </script>
     @endsection
