     

@extends('v1.view.app')
@section('content')
    <div class="container p-0 position-relative custom-h100">
        <div class="col-md-12">
            @include('v1.view.layouts.top')
        </div>
        <div class="col-md-12 form-background">
            <h6 class="site-color text-center mb-3"> CONTACT US </h6>
            <div class="row d-flex justify-content-center">
                <div class="p-4 with-linear-gradient w80">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-5 col-sm-12">
                                <div class="left-aboutus">
                                    <form action=" {{ route('customer.contactUs.send')}} " method="post">
                                        @csrf
                                        <div class="wrap-input2 mb-3 d-flex">
                                            <input class="bg-transparent input2" type="text" name="name" required>
                                            <span class="focus-input2" data-placeholder="NAME"></span>
                                            <img src="/defaultImages/user.png" class="float-right pb-3 pt-2" alt="name" width="18" height="45">
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="d-block text-danger">{{ $errors->first('name') }}</span>
                                        @endif

                                        <div class="wrap-input2 mb-3 d-flex">
                                            <input class="bg-transparent input2" type="email" name="email" required>
                                            <span class="focus-input2" data-placeholder="EMAIL"></span>
                                            <img src="/defaultImages/email.png" class="float-right pb-3 pt-3" alt="email" width="18" height="46">
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="d-block text-danger">{{ $errors->first('email') }}</span>
                                        @endif

                                        <div class="wrap-input2 mb-2 d-flex">
                                            <textarea class="input2 bg-transparent" name="body" required></textarea>
                                            <span class="focus-input2" data-placeholder="TEXT"></span>
                                            <img src="/defaultImages/4172169_edit_info_information_note_notes_icon.png" class="float-right mt-2 pb-5" alt="text" width="18" height="66">
                                        </div>
                                        @if ($errors->has('body'))
                                            <span class="d-block text-danger">{{ $errors->first('body') }}</span>
                                        @endif

                                        <div class="d-flex justify-content-start mb-2">
                                            <button type="submit" class="btn btn-sm rounded custom-btn-content">Confirm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <img class="p-4" src="/defaultImages/Remember Me.png" alt="image" width="280" height="280">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="d-sm-flex justify-content-start">
                            <li class="d-flex mb-2 mr-2"> 
                                <span class="mr-2">
                                    <img src="/defaultImages/5340292_locate_location_map_pin_icon.png" alt="location" width="15">
                                </span> 
                                <h6 class="site-color font-weight-lighter mt-1 login-text">
                                    26 Shabdiz St, Fereshteh, Tehran
                                </h6>    
                            </li>
                            <li class="d-flex mb-2 mr-2"> 
                                <span class="mr-2">
                                    <img src="/defaultImages/2561369_phone_icon.png" class="mt-1" alt="phone" width="15">
                                </span> 
                                <a href="https://wa.me/+19286519314" class="site-color font-weight-lighter login-text"> 
                                    +1 928 6519 314
                                </a>
                            </li>
                            <li class="d-flex"> 
                                <span class="mr-2 mb-2 mr-2">
                                    <img src="/defaultImages/email copy.png" class="mt-1" alt="email" width="15">
                                </span> 
                                <a href="mailto:SamxPay@gmail.com " class="site-color font-weight-lighter login-text"> 
                                    SamxPay@gmail.com 
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer col-md-12 my-3">
            @include('v1.view.layouts.footer')
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.input2').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('anim');
            }
            else {
                $(this).removeClass('ranim');
            }
        })    
    })
    </script>
@endsection