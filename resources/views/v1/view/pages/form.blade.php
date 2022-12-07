@extends('v1.view.app')
@section('content')
    <div class="container p-0 position-relative custom-h100">
        @include('v1.view.layouts.top')
        <div class="middle w100">
            <div class="h100 p-0">
                <div class="col-md-12 w100 pbc p-0">
                    <h6 class="site-color text-center mb-3"> Exchange {{ $order->calculator->name }} To
                        {{ $order->element->name }} </h6>
                    <div class="row d-flex justify-content-center">
                        <div class="p-4 with-linear-gradient h100 w80">
                            <div class="col-md-12">
                                <form action="{{ route('customer.forms.send') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="order_id" value=" {{ $order->id }} ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="wrap-input2 mb-3 d-flex">
                                                <input class="bg-transparent input2" id="email" type="email" name="email"
                                                    value=" {{ old('email') }} " required>
                                                <span class="focus-input2 text-uppercase"
                                                    data-placeholder="YOUR PayPal E-mail ADDRESS *"></span>
                                                <i class="bi bi-wallet-fill align-self-center icon-color"></i>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span
                                                    class="d-block text-danger custom-font-size mb-3">{{ $errors->first('email') }}</span>
                                            @endif

                                            <div class="wrap-input2 mb-3 d-flex">
                                                <input class="bg-transparent input2" type="email" name="email_confirmation"
                                                    value=" {{ old('email_confirmation') }} " required>
                                                <span class="focus-input2 text-uppercase"
                                                    data-placeholder="Confirm PayPal E-mail Address *"></span>
                                                <i class="bi bi-wallet-fill align-self-center icon-color"></i>
                                            </div>
                                            @if ($errors->has('email_confirmation'))
                                                <span
                                                    class="d-block text-danger custom-font-size mb-3">{{ $errors->first('email_confirmation') }}</span>
                                            @endif

                                            <div class="col-md-12 mb-2 mt-2">
                                                <h6 class=" text-color font-weight-lighter text-center custom-font-size">
                                                    Please Note that you will be received Net Amount
                                                    @if ($order->input_currency_unit == 'USD')
                                                        {{ $order->output_number }}
                                                        {{ $order->output_currency_unit }}.
                                                    @else
                                                        {{ $order->output_number }}
                                                        {{ $order->output_currency_unit }}.
                                                    @endif
                                                </h6>
                                            </div>

                                            <div class="wrap-input2 mb-3 d-flex">
                                                <input class="bg-transparent input2" type="text" name="wallet"
                                                    value=" {{ old('wallet') }} " required>
                                                <span class="focus-input2 text-uppercase "
                                                    data-placeholder="Your {{ $order->calculator->name }} Wallet *"></span>

                                                <i class="bi bi-wallet2 align-self-center icon-color"></i>
                                            </div>
                                            @if ($errors->has('wallet'))
                                                <span
                                                    class="d-block text-danger custom-font-size mb-3">{{ $errors->first('wallet') }}</span>
                                            @endif

                                            <div class="wrap-input2 mb-3 d-flex">
                                                <input class="bg-transparent input2" type="email" name="contact_email"
                                                    value=" {{ old('contact_email') }} " required>
                                                <span class="focus-input2 text-uppercase"
                                                    data-placeholder="Your Contact E-mail Address *"></span>
                                                <i class="bi bi-envelope align-self-center icon-color"></i>
                                            </div>
                                            @if ($errors->has('contact_email'))
                                                <span
                                                    class="d-block text-danger custom-font-size mb-3">{{ $errors->first('contact_email') }}</span>
                                            @endif

                                            <div class="wrap-input2 mb-3 d-flex">
                                                <input class="bg-transparent input2" type="text" name="extra"
                                                    value=" {{ old('extra') }} ">
                                                <span class="focus-input2 text-uppercase" data-placeholder="extra"></span>
                                                <i class="bi bi-paperclip align-self-center icon-color"></i>
                                            </div>
                                            @if ($errors->has('extra'))
                                                <span
                                                    class="d-block text-danger custom-font-size mb-3">{{ $errors->first('extra') }}</span>
                                            @endif

                                            {{-- <div class="wrap-input2 mb-3 d-flex">
                                                <input class="bg-transparent input2" type="email"
                                                    name="contact_email_confirmation"
                                                    value=" {{ old('contact_email_confirmation') }} " required>
                                                <span class="focus-input2 text-uppercase"
                                                    data-placeholder="Confirm Contact E-mail Address *"></span>
                                                <img src="/defaultImages/view/form/email.png" alt="email"
                                                    class="float-right pb-3 pt-3" width="18" height="45">
                                            </div>
                                            @if ($errors->has('contact_email_confirmation'))
                                                <span
                                                    class="d-block text-danger custom-font-size mb-3">{{ $errors->first('contact_email_confirmation') }}</span>
                                            @endif --}}

                                            {{-- <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <h6 class="text-center text-color custom-font-size mt-2">The transaction
                                                        will be sent to this email.</h6>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="col-md-6">

                                            <div class="wrap-input2 mb-3 d-flex">
                                                <input class="bg-transparent input2" type="text" name="telegram"
                                                    value=" {{ old('telegram') }} ">
                                                <span class="focus-input2 text-uppercase"
                                                    data-placeholder="Telegram"></span>
                                                <i class="bi bi-telegram align-self-center icon-color"></i>
                                            </div>
                                            @if ($errors->has('telegram'))
                                                <span
                                                    class="d-block text-danger custom-font-size mb-3">{{ $errors->first('telegram') }}</span>
                                            @endif

                                            <div class="wrap-input2 mb-3 d-flex">
                                                <input class="bg-transparent input2" type="text" name="whatsApp"
                                                    value=" {{ old('whatsApp') }} ">
                                                <span class="focus-input2 text-uppercase"
                                                    data-placeholder="WhatsApp"></span>
                                                <i class="bi bi-whatsapp align-self-center icon-color"></i>
                                            </div>
                                            @if ($errors->has('whatsApp'))
                                                <span
                                                    class="d-block text-danger custom-font-size mb-3">{{ $errors->first('whatsApp') }}</span>
                                            @endif

                                            <div class="wrap-input2 mb-3 d-flex">
                                                <input class="bg-transparent input2" type="text" name="skype"
                                                    value=" {{ old('skype') }} ">
                                                <span class="focus-input2 text-uppercase" data-placeholder="Skype"></span>
                                                <i class="bi bi-skype align-self-center icon-color"></i>
                                            </div>
                                            @if ($errors->has('skype'))
                                                <span
                                                    class="d-block text-danger custom-font-size mb-3">{{ $errors->first('skype') }}</span>
                                            @endif

                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <h6
                                                        class="mb-2 mt-2 font-weight-lighter custom-font-size text-center site-color">
                                                        You will be notified upon transaction completion by Transaction Id &
                                                        Transaction Receipt Screenshots.
                                                    </h6>
                                                </div>
                                            </div>

                                            @guest
                                                <h6 class="site-color mt-4 text-center">If you are interested in an exchange,
                                                    Please sign up/sign in first.</h6>
                                            @else
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="cheack"
                                                        value="{{ true }}" id="flexCheckDefault" required>
                                                    <label class="form-check-label mt-1 site-color" for="flexCheckDefault">
                                                        I AGREE TO THE
                                                        <button type="button" class="custom-btn-form-terms border-bottom mr-1"
                                                            data-toggle="modal" data-target="#show-terms"
                                                            data-whatever="@mdo">TERMS OF SERVICE</button>
                                                    </label>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <div class="col-md-12">
                                                        <span class="captcha-image ">{!! Captcha::img() !!}</span>
                                                        &nbsp;&nbsp;
                                                        <button type="button"
                                                            class="btn btn-sm rounded custom-btn-content refresh-button mt--5">Refresh</button>

                                                        <div class="wrap-input2 mt-4 mb-3 d-flex">
                                                            <input
                                                                class="bg-transparent input2 @error('captcha') is-invalid @enderror"
                                                                type="text" id="captcha" name="captcha" required>
                                                            <span class="focus-input2 text-uppercase"
                                                                data-placeholder="Captcha"></span>
                                                            <i class="bi bi-exclamation-lg align-self-center icon-color"></i>
                                                        </div>

                                                        @error('captcha')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            @endguest
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center mt-4 ml-4">
                                                <a href=" {{ route('home') }} " class="btn btn-sm text-color"
                                                    onclick="document.getElementById('sound').play();">Cancel</a>
                                                <button type="submit" class="btn btn-sm rounded custom-btn-content ml-1"
                                                    onclick="document.getElementById('sound').play();">Send Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                {{-- modal --}}
                                <div class="modal fade" id="show-terms" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content background-color-modals modal-border">
                                            <div class="modal-body">
                                                <div
                                                    class="col-md-12 d-flex justify-content-center align-items-center mb-3">
                                                    <div class="rounded p-3 text-justify">
                                                        <p class="mb-0 custom-font-size text-light">
                                                            PayPal orders are processed in approximately 1-2 hours.
                                                            SamxPay send PayPal transactions as payments for “Goods and
                                                            Services”.
                                                            PayPal may charge an additional commission to the recipient when
                                                            accepting funds, which will be deducted from received amount.
                                                        </p>
                                                        <h6
                                                            class="mb-2 mt-2 site-color font-weight-lighter custom-font-size">
                                                            Please be careful when you are typing the email address which is
                                                            linked to your PayPal account.
                                                            We do not accept any responsibility if the given email address
                                                            spelling is wrong by users.
                                                        </h6>
                                                        <p class="mb-0 custom-font-size text-light">
                                                            Upon PayPal transaction completion and providing you with
                                                            transaction ID & receipt screenshots, we will not accept any
                                                            refunds from receiver PayPal account.
                                                        </p>
                                                        <h6
                                                            class="mb-2 mt-2 site-color font-weight-lighter custom-font-size">
                                                            Please contact us before any refunds and get sure we can accept
                                                            your refunds or not. <span class="custom-text-decoration"> We
                                                                will not </span> responsible for any loss if you do refunds
                                                            without any further notice.
                                                        </h6>
                                                        <div class="mt-4">
                                                            <h6 class="text-center">
                                                                <a href="mailto:Support@Samxpay.com"
                                                                    class="site-color">Support@Samxpay.com</a>
                                                                &
                                                                <a href="mailto:SamxPay@gmail.com"
                                                                    class="site-color">SamxPay@gmail.com</a>
                                                                <br>
                                                                <a href="https://wa.me/19286519314" class="site-color">
                                                                    whatsApp: +1 928 6519 314
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <p class="mb-0 mt-3 text-center text-light">If we could accept your
                                                            refunds, we will take 10% as fine.</p>
                                                        <h6
                                                            class="mb-2 mt-2 site-color font-weight-lighter text-center custom-font-size">
                                                            If you are not sure about your PayPal account safety and
                                                            stability, please do not use our PayPal service.
                                                        </h6>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn site-color mr-2 rounded float-right"
                                                    data-dismiss="modal"
                                                    onclick="document.getElementById('sound').play();">Cancel</button>
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

        </div>
        <div class="footer col-md-12 my-3">
            @include('v1.view.layouts.footer')
        </div>
    </div>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.refresh-button').click(function() {
                $.ajax({
                    type: 'get',
                    url: '{{ route('refreshCaptcha') }}',
                    success: function(data) {
                        $('.captcha-image').html(data.captcha);
                    }
                });
            });
        });
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            let inputs = document.querySelectorAll('.input2')

            inputs.forEach(input => {
                input.value && input.focus()
            });
        });
    </script>
@endsection
