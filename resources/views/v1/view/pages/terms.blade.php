@extends('v1.view.app')
@section('content')
    <div class="container p-0 position-relative custom-h100">
        <div class="col-md-12">
            @include('v1.view.layouts.top')
        </div>
        <div class="col-md-12 form-background">
            <h6 class="site-color text-center mb-3"> TERMS AND CONDITIONS </h6>
            <div class="row justify-content-center">
                <div class="p-4 with-linear-gradient">
                    <h3 class="site-color mb-2">PayPal</h3>
                    <h6 class="text-justify pl-3 cutom-font-size-bold mb-1">PayPal orders are processed in approximately 4-6
                        hours. </h6>
                    <h6 class="text-justify pl-3 cutom-font-size-bold mb-1">SamxPay will do PayPal transactions as payments
                        for
                        “Goods and Services '. PayPal may charge an
                        additional commission to the recipient when accepting funds, which will be deducted from the
                        received amount. </h6>
                    <h6 class="text-justify pl-3 cutom-font-size-bold mb-1">Please be careful when you are typing the email
                        address which is linked to your PayPal account.
                        We do
                        not accept any responsibility if the given email address spelling is wrong by you. </h6>
                    <h6 class="text-justify pl-3 cutom-font-size-bold mb-1">Upon PayPal transaction completion and providing
                        you
                        with transaction ID & receipt screenshots,
                        we
                        will not accept any refunds from the receiver PayPal account.</h6>
                    <h6 class="text-justify pl-3 cutom-font-size-bold mb-1">Please contact us before any refunds and get
                        sure we
                        can accept your refunds or not. We will not
                        be
                        responsible for any loss if you do refunds without any further notice. </h6>
                    <h6 class="text-justify pl-3 cutom-font-size-bold mb-3">If we could accept your
                        refunds, we will take 5% as a fine. If you are not sure
                        about your PayPal
                        account safety and stability, please do not use our PayPal service.</h6>

                    <h3 class="site-color mb-2">Perfect Money </h3>
                    <h6 class="text-justify pl-3 cutom-font-size-bold mb-1">Please Note to send your payment to our
                        mentioned PM Wallet.</h6>
                    <h6 class="text-justify pl-3 cutom-font-size-bold mb-1">Please note that you should put your order
                        number as a note on your Perfect Money transaction.
                    </h6>
                    <h6 class="text-justify pl-3 cutom-font-size-bold mb-3">Please note that in the case of the refund
                        process, we only send the sent amount to the sender's
                        PM account holder.</h6>
                    <h3 class="site-color mb-2">Cash Delivery</h3>
                    <h6 class="text-justify pl-3 cutom-font-size-bold mb-1">
                        Please note we only have Cash delivery for certain countries at the moment therefore Please Make
                        sure the country you want to receive the cash amount, it is listed with us or not.</h6>
                    <h6 class="text-justify pl-3 cutom-font-size-bold mb-1">Please note that cash will be delivered to the
                        recipient based on an identity card.</h6>
                </div>
            </div>
        </div>
        <div class="col-md-12 footer my-3">
            @include('v1.view.layouts.footer')
        </div>
    </div>
@endsection
