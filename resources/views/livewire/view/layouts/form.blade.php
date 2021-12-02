<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div class="container p-0"  style="height: 100%">
        <div class="col-md-12" style="width: 100%; background-color: #0501003b;">
            <h6 class="site-color text-center mb-3"> Form</h6>
            <div class="row d-flex justify-content-center" style="width: 100%">
                <div class="p-4 with-linear-gradient" style="border-radius: 4px; width: 80%; height: 100%;">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <div class="row">
                                @csrf
                                <div class="col-md-5">
                                    <div class="with-bottom-linear-gradient-to-left" >
                                        <label for="name" class="site-color float-left">YOUR PayPal E-mail ADDRESS: *</label>
                                        <div class="form-group d-flex align-items-baseline mb-0" style="width: 100%">
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
                                </div>
                                <div class="col-md-4=2">
                                    <div class="d-flex justify-content-center align-items-center" hidden="400">
                                        <img src="/defaultImages/Vector Smart Object form.png" alt="image">
                                    </div>
                                </div>
                                <div class="col-md-5 bg-danger">
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
