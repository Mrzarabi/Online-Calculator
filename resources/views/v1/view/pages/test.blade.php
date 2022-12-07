@extends('v1.view.app')
@section('content')
    <div class="container p-0 h100 position-relative">
        <div class="col-md-12">
            @include('v1.view.layouts.top')
            {{-- @include('v1.view.layouts.navbar') --}}
        </div>
        <div class="col-12">
            <div class="row justify-content-center">

                <div class="card-body">
                    <form action="" method="post">
                        <div class="col-12">
                            <label for="form-label">send</label>
                            <div class="input-group">
                                <input type="text" name="" id="">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown">
                                        Dropdown button
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Link 1</a></li>
                                        <li><a class="dropdown-item" href="#">Link 2</a></li>
                                        <li><a class="dropdown-item" href="#">Link 3</a></li>
                                    </ul>
                                </div>
                                {{-- <button type="button" class="bg-danger" onclick="open">تتر
                                    <ul class="d-none" id="ul">
                                        <li>
                                            <div class="d-flex">
                                                <img src="/defaultImages/bitcoin-gold-1.png" alt="bitcoin-gold"
                                                    width="30">
                                                <span>تتر</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <img src="/defaultImages/bitcoin-gold-1.png" alt="bitcoin-gold"
                                                    width="30">
                                                <span>تتر</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <img src="/defaultImages/bitcoin-gold-1.png" alt="bitcoin-gold"
                                                    width="30">
                                                <span>تتر</span>
                                            </div>
                                        </li>
                                    </ul>
                                </button> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <div class="col-md-12 my-3 index-footer">
            @include('v1.view.layouts.footer')
        </div>
    </div>
@endsection

@section('script')
    <script>
        function open() {
            var el = document.getElementById('#ul');

            el.addClass('d-block');
        }
    </script>
@endsection
