     

@extends('v1.view.app')
@section('content')
    <div class="container p-0" style="height: 100%">
        @include('v1.view.layouts.top')
        <div class="col-md-12" style="width: 100%; background-color: #0501003b; height: 70%;">
            <h6 class="site-color text-center mb-3"> CONTACT US </h6>
            <div class="row d-flex justify-content-center" style="width: 100%">
                <div class="p-4 with-linear-gradient" style="border-radius: 4px; width: 80%; height: 100%;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="left-aboutus">
                                    <form action="" method="post">
                                        @csrf
                                        <div class="with-bottom-linear-gradient-to-left" style="width: 20rem">
                                            <div class="form-group d-flex align-items-baseline mb-0" style="width: 100%">
                                                <label for="name" class="site-color">NAME</label>
                                                <input type="name" class="form-control form-control-sm" id="name" name="name" required style="
                                                    background-color: transparent;
                                                    max-width: 90%;
                                                    width: 90%;
                                                    font-size: .8rem;
                                                    max-height: 40px;
                                                    
                                                height: 40px;
                                                margin-top: -2px;
                                                    ">
                                                @if ($errors->has('name'))
                                                    <span class="d-block text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                                <div style="margin-bottom: -7px">
                                                    <img src="/defaultImages/user.png" alt="user" width="15">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="with-bottom-linear-gradient-to-left mt-2" style="width: 20rem">
                                            <div class="form-group d-flex align-items-baseline mb-0" style="width: 100%">
                                                <label for="email" class="site-color">EMAIL</label>
                                                <input type="email" class="form-control form-control-sm" id="email" name="email" required style="
                                                    background-color: transparent;
                                                    max-width: 90%;
                                                    width: 90%;
                                                    font-size: .8rem;
                                                    max-height: 40px;
                                                    
                                                height: 40px;
                                                margin-top: -2px;
                                                    ">
                                                @if ($errors->has('email'))
                                                    <span class="d-block text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                                <div style="margin-bottom: -7px">
                                                    <img src="/defaultImages/email.png" alt="user" width="15">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="with-bottom-linear-gradient-to-left mt-2" style="width: 20rem">
                                            <div class="form-group d-flex align-items-baseline mb-0" style="width: 100%">
                                                <label for="body" class="site-color">TEXT</label>
                                                <textarea class="form-control form-control-sm" id="body" rows="3" name="body" required style="
                                                background-color: transparent;
                                                max-width: 90%;
                                                width: 90%;
                                                font-size: .8rem;
                                                margin-top: -2px;
                                                ">{{old('body')}}</textarea>
                                                @if ($errors->has('body'))
                                                    <span class="d-block text-danger">{{ $errors->first('body') }}</span>
                                                @endif

                                                <div style="margin-bottom: -7px">
                                                    <img src="/defaultImages/4172169_edit_info_information_note_notes_icon.png" alt="user" width="15">
                                                </div>
                                            </div>
                                        </div>         
                                        <div class="d-flex justify-content-start mt-4">
                                            <button type="submit" class="btn btn-sm rounded custom-btn-content">Confirm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <img class="p-4" src="/defaultImages/Remember Me.png" alt="image" width="280" height="280">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="d-flex justify-content-start">
                            <li class="d-flex mb-2 mr-2"> 
                                <span class="mr-2">
                                    <img src="/defaultImages/5340292_locate_location_map_pin_icon.png" alt="location" width="15">
                                </span> 
                                <h6 class="site-color font-weight-lighter mt-1" style="font-size: .7rem;">
                                    26 Shabdiz St, Fereshteh, Tehran
                                </h6>    
                            </li>
                            <li class="d-flex mb-2 mr-2"> 
                                <span class="mr-2">
                                    <img src="/defaultImages/2561369_phone_icon.png" alt="phone" width="15">
                                </span> 
                                <a href="https://wa.me/+19286519314" class="site-color font-weight-lighter mt-1" style="font-size: .7rem;"> 
                                    +1 928 6519 314
                                </a>
                            </li>
                            <li class="d-flex"> 
                                <span class="mr-2 mb-2 mr-2">
                                    <img src="/defaultImages/email copy.png" alt="email" width="15">
                                </span> 
                                <a href="mailto:SamxPay@gmail.com " class="site-color font-weight-lighter mt-1" style="font-size: .7rem;"> 
                                    SamxPay@gmail.com 
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer" style="width: 100%; height: 12%;">
            @include('v1.view.layouts.footer')
        </div>
    </div>
@endsection