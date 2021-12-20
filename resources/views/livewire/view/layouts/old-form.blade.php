<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="div rounded p-5 site-background-color">

                <div class="row">
                    <div class="col-md-12">
                        <h6 class="mb-2 mt-2 site-color font-weight-lighter text-center">
                            Exchange {{$this->input->name}} to {{$this->output->name}} 
                        </h6>
                    </div>
                </div>

                <form action=" {{route('customer.forms.send')}} " method="POST">
                    @csrf 
                    
                    <input type="hidden" name="order_id" value=" {{$order->id}} ">
                    <div class="form-group">
                        <label for="email">Your PayPal E-mail Address:  <span class="text-danger custom-font-size"> * </span>  </label>
                        <input type="email" class="form-control form-control-lg mb-2 rounded" id="email" name="email"  wire:model.lazy="email" required>
                        @if ($errors->has('email'))
                            <span class="d-block text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email_confirmation">Confirm Your PayPal E-mail Address: <span class="text-danger custom-font-size"> * </span> </label>
                        <input type="email" class="form-control form-control-lg mb-2 rounded" id="email_confirmation" name="email_confirmation"  wire:model.lazy="email_confirmation" required>
                        @if ($errors->has('email_confirmation'))
                            <span class="d-block text-danger">{{ $errors->first('email_confirmation') }}</span>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="mb-2 mt-2 site-color font-weight-lighter text-center">
                                @if ($order->input_currency_unit == 'USD')
                                    You will be received {{$order->output_number}} {{$order->output_currency_unit}} to this PayPal account.
                                @else
                                    You will be received {{$order->output_number}} {{$order->output_currency_unit}} to this PayPal account.
                                @endif
                            </h6>
                            <h6 class="text-center text-danger custom-font-size mt-2">Please note PayPal internal fee is not included this amount.</h6>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="text-center text-danger custom-font-size mt-2" >{{$email_text }}</h6>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="wallet">Your {{$this->input->name}} Wallet:  <span class="text-danger custom-font-size"> * </span> </label>
                        <input type="text" class="form-control form-control-lg mb-2 rounded" id="wallet" name="wallet" wire:model.lazy="wallet" required>
                        @if ($errors->has('wallet'))
                            <span class="d-block text-danger">{{ $errors->first('wallet') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="contact_email">Your Contact E-mail Address:  <span class="text-danger custom-font-size"> * </span>  </label>
                        <input type="email" class="form-control form-control-lg mb-2 rounded" id="contact_email" name="contact_email"  wire:model.lazy="contact_email" required>
                        @if ($errors->has('contact_email'))
                            <span class="d-block text-danger">{{ $errors->first('contact_email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="contact_email_confirmation">Confirm Your Contact E-mail Address: <span class="text-danger custom-font-size"> * </span>  </label>
                        <input type="email" class="form-control form-control-lg mb-2 rounded" id="contact_email_confirmation" name="contact_email_confirmation"  wire:model.lazy="contact_email_confirmation" required>
                        @if ($errors->has('contact_email_confirmation'))
                            <span class="d-block text-danger">{{ $errors->first('contact_email_confirmation') }}</span>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="text-center text-danger custom-font-size mt-2" >{{$contact_email_text }}</h6>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="text-center text-danger custom-font-size mt-2">The transaction will be sent to this email.</h6>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telegram">Please let us know your contact info such as Telegram: </label>
                        <input type="text" class="form-control form-control-lg mb-2 rounded" id="telegram" name="telegram"  wire:model.lazy="telegram">
                        @if ($errors->has('telegram'))
                            <span class="d-block text-danger">{{ $errors->first('telegram') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="whatsApp">Please let us know your contact info such as WhatsApp: </label>
                        <input type="text" class="form-control form-control-lg mb-2 rounded" id="whatsApp" name="whatsApp"  wire:model.lazy="whatsApp">
                        @if ($errors->has('whatsApp'))
                            <span class="d-block text-danger">{{ $errors->first('whatsApp') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="skype">Please let us know your contact info such as Skype: </label>
                        <input type="text" class="form-control form-control-lg mb-2 rounded" id="skype" name="skype"  wire:model.lazy="skype">
                        @if ($errors->has('skype'))
                            <span class="d-block text-danger">{{ $errors->first('skype') }}</span>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="mb-2 mt-2 font-weight-lighter custom-font-size text-center site-color">
                                You will be notified upon transaction completion by Transaction Id & Transaction Receipt Screenshots.
                            </h6>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="extra">Please let us know if you want us add any extra note on your transaction: </label>
                        <input type="text" class="form-control form-control-lg mb-2 rounded" id="extra" name="extra"  wire:model.lazy="extra">
                        @if ($errors->has('extra'))
                            <span class="d-block text-danger">{{ $errors->first('extra') }}</span>
                        @endif
                    </div>
                    @guest
                        <h6 class="site-color mt-4 text-center">If You Are Interesting To Trade Please, Loing/Register At First...</h6>
                    @else
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="cheack" value="{{true}}" id="flexCheckDefault" wire:model.lazy="cheack">
                            <label class="form-check-label" for="flexCheckDefault">
                                I agree to the 
                                <button type="button" class="custom-btn-form-terms mr-1" data-toggle="modal" data-target="#show-terms" data-whatever="@mdo">terms of service</button>
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <div class="col-md-6">
                                <span class="captcha-image">{!! Captcha::img() !!}</span> &nbsp;&nbsp;
                                <button type="button" class="btn btn-success btn-sm rounded refresh-button">Refresh</button>
                                <input id="captcha" type="text" class="form-control form-control-lg rounded mt-2 @error('captcha') is-invalid @enderror" name="captcha" required>
                                @error('captcha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4 ml-4">
                            <a href=" {{route('home')}} " class="btn btn-sm rounded btn-secondary" onclick="document.getElementById('sound').play();">Cancel</a>
                            @if($isDisabled)
                                <button type="submit" class="btn btn-sm rounded custom-btn-content ml-1" disabled="{{ $isDisabled }}">Send Order</button>
                            @else
                                <button type="submit" class="btn btn-sm rounded custom-btn-content ml-1" onclick="document.getElementById('sound').play();">Send Order</button>
                            @endif
                        </div>
                    @endguest
                </form>
                {{-- modal --}}
                <div class="modal fade" id="show-terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content custom-back-color-card">
                            <div class="modal-body">
                                <div class="col-md-12 d-flex justify-content-center align-items-center mb-3">
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
                                                    whatsApp: +1 928 6519 314
                                                </a>
                                            </h6>
                                        </div>
                                        <p class="mb-0 mt-3 text-center">If we could accept your refunds, we will take 10% as fine.</p>
                                        <h6 class="mb-2 mt-2 site-color font-weight-lighter text-center custom-font-size">
                                            If you are not sure about your PayPal account safety and stability, please do not use our PayPal service.
                                        </h6>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary mr-2 rounded float-right" data-dismiss="modal"  onclick="document.getElementById('sound').play();">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal --}}
            </div>
        </div>
    </div>
    @section('script')
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.refresh-button').click(function() {
                    $.ajax({
                        type: 'get',
                        url: '{{ route('refreshCaptcha') }}',
                        success:function(data) {
                            $('.captcha-image').html(data.captcha);
                        }
                    });
                });
            });
        </script>
    @endsection
</div>
{{-- <div class="with-bottom-linear-gradient-to-left p-position mb-4">
    <label for="email" class="site-color float-left label-position" id="l_email">YOUR PayPal E-mail ADDRESS: *</label>
    <div class="form-group d-flex align-items-baseline mb-0 w100">
        <input type="email" class="form-control form-control-sm input-style-form z-index-input" 
            id="email" name="email" wire:model.lazy="email" wire:model.defer="inputValue" required 
            onclick="animation('l_email')" onchange="getVal('email')">
        <div class="cmb">
            <img src="/defaultImages/view/form/paypal email.png" alt="paypal email" width="18">
        </div>
    </div>
</div>
@if ($errors->has('email'))
    <span class="d-block text-danger">{{ $errors->first('email') }}</span>
@endif --}}