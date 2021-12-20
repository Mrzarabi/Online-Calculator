<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div class="container p-0"  style="height: 100%">
        <div class="col-md-12" style="width: 100%; background-color: #0501003b;">
            <h6 class="site-color text-center mb-3"> Exchange {{$this->input->name}} to {{$this->output->name}} </h6>
            <div class="row d-flex justify-content-center" style="width: 100%">
                <div class="p-4 with-linear-gradient" style="border-radius: 4px; width: 80%; height: 100%;">
                    <div class="col-md-12">
                        <form action="{{route('customer.forms.send')}}" method="post">
                            @csrf

                            <input type="hidden" name="order_id" value=" {{$order->id}} ">
                            <div class="row">
                                <div class="col-md-5">

                                    <div class="wrap-input2 mb-3 d-flex">
                                        <input class="bg-transparent input2" type="email" name="email" wire:model.lazy="email" required>
                                        <span class="focus-input2" data-placeholder="YOUR PayPal E-mail ADDRESS *"></span>
                                        <img src="/defaultImages/view/form/paypal email.png" alt="paypal email" class="float-right pb-3 pt-2" width="18" height="45">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="d-block text-danger">{{ $errors->first('email') }}</span>
                                    @endif

                                    <div class="wrap-input2 mb-3 d-flex">
                                        <input class="bg-transparent input2" type="email" name="email_confirmation" wire:model.lazy="email_confirmation" required>
                                        <span class="focus-input2" data-placeholder="Confirm PayPal E-mail Address *"></span>
                                        <img src="/defaultImages/view/form/paypal email.png" alt="paypal email" class="float-right pb-3 pt-2" width="18" height="45">
                                    </div>
                                    @if ($errors->has('email_confirmation'))
                                        <span class="d-block text-danger">{{ $errors->first('email_confirmation') }}</span>
                                    @endif


                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <h6 class="text-center text-danger custom-font-size mt-2" >{{$email_text }}</h6>
                                        </div>
                                    </div>

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

                                    <div class="wrap-input2 mb-3 d-flex">
                                        <input class="bg-transparent input2" type="text" name="wallet" wire:model.lazy="wallet" required>
                                        <span class="focus-input2" data-placeholder="Your {{$this->input->name}} Wallet *"></span>
                                        <img src="/defaultImages/view/form/paypal email.png" alt="wallet" class="float-right pb-3 pt-2" width="18" height="45">
                                    </div>
                                    @if ($errors->has('wallet'))
                                        <span class="d-block text-danger">{{ $errors->first('wallet') }}</span>
                                    @endif
                                    
                                    <div class="wrap-input2 mb-3 d-flex">
                                        <input class="bg-transparent input2" type="email" name="contact_email" wire:model.lazy="contact_email" required>
                                        <span class="focus-input2" data-placeholder="Your Contact E-mail Address *"></span>
                                        <img src="/defaultImages/view/form/email.png" alt="email" class="float-right pb-3 pt-2" width="18" height="45">
                                    </div>
                                    @if ($errors->has('contact_email'))
                                        <span class="d-block text-danger">{{ $errors->first('contact_email') }}</span>
                                    @endif

                                    <div class="wrap-input2 mb-3 d-flex">
                                        <input class="bg-transparent input2" type="email" name="contact_email_confirmation" wire:model.lazy="contact_email_confirmation" required>
                                        <span class="focus-input2" data-placeholder="Confirm Contact E-mail Address *"></span>
                                        <img src="/defaultImages/view/form/email.png" alt="email" class="float-right pb-3 pt-2" width="18" height="45">
                                    </div>
                                    @if ($errors->has('contact_email_confirmation'))
                                        <span class="d-block text-danger">{{ $errors->first('contact_email_confirmation') }}</span>
                                    @endif

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
                                </div>
                                <div class="col-md-2">
                                    <div class="d-flex justify-content-center align-items-center" hidden="400">
                                        <img src="/defaultImages/Vector Smart Object form.png" alt="image">
                                    </div>
                                </div>
                                <div class="col-md-5">

                                    <div class="wrap-input2 mb-3 d-flex">
                                        <input class="bg-transparent input2" type="text" name="telegram" wire:model.lazy="telegram" required>
                                        <span class="focus-input2" data-placeholder="Telegram *"></span>
                                        <img src="/defaultImages/view/form/telegram.png" alt="telegram" class="float-right pb-3 pt-2" width="18" height="45">
                                    </div>
                                    @if ($errors->has('telegram'))
                                        <span class="d-block text-danger">{{ $errors->first('telegram') }}</span>
                                    @endif

                                    <div class="wrap-input2 mb-3 d-flex">
                                        <input class="bg-transparent input2" type="text" name="whatsApp" wire:model.lazy="whatsApp" required>
                                        <span class="focus-input2" data-placeholder="WhatsApp *"></span>
                                        <img src="/defaultImages/view/form/whatsApp.png" alt="whatsApp" class="float-right pb-3 pt-2" width="18" height="45">
                                    </div>
                                    @if ($errors->has('whatsApp'))
                                        <span class="d-block text-danger">{{ $errors->first('whatsApp') }}</span>
                                    @endif

                                    <div class="wrap-input2 mb-3 d-flex">
                                        <input class="bg-transparent input2" type="text" name="skype" wire:model.lazy="skype" required>
                                        <span class="focus-input2" data-placeholder="Skype *"></span>
                                        <img src="/defaultImages/view/form/email.png" alt="skype" class="float-right pb-3 pt-2" width="18" height="45">
                                    </div>
                                    @if ($errors->has('skype'))
                                        <span class="d-block text-danger">{{ $errors->first('skype') }}</span>
                                    @endif

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <h6 class="mb-2 mt-2 font-weight-lighter custom-font-size text-center site-color">
                                                You will be notified upon transaction completion by Transaction Id & Transaction Receipt Screenshots.
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="wrap-input2 mb-3 d-flex">
                                        <input class="bg-transparent input2" type="text" name="extra" wire:model.lazy="extra" required>
                                        <span class="focus-input2" data-placeholder="extra *"></span>
                                        <img src="/defaultImages/view/form/extra note.png" alt="extra" class="float-right pb-3 pt-2" width="18" height="45">
                                    </div>
                                    @if ($errors->has('extra'))
                                        <span class="d-block text-danger">{{ $errors->first('extra') }}</span>
                                    @endif

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
                                </div>
                            </div>
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
        </div>
    </div>

    @section('script')
        <script>
            function animation(name) {
                console.log(name);
                el = document.getElementById(name);
                el.classList.add('anim');
            }
        </script>
        <script>
            function getVal(name) {
                val = document.getElementById(name).value;
                if(val !== null) {
                    var label = "l_" + name;
                    el = document.getElementById(label);
                    el.classList.add('anim');
                } 
            }
        </script>
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
