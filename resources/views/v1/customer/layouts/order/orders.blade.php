@extends('adminlte::page')
@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-10 col-sm-12">

                {{-- table view orders --}}
                @include('v1.customer.layouts.order.table-view-orders')

                {{-- card view orders --}}
                @include('v1.customer.layouts.order.card-view-orders')

                <div class="d-flex justify-content-start">
                    {!! $orders->render('/vendor.pagination.bootstrap-4') !!}
                </div>

            </div>

            <div class="col-md-2 col-sm-12 display-image-none d-flex align-items-end justify-content-center">
                <img src="/defaultImages/Right.png" alt="vector" height="500" class="size-image-dashboard">
            </div>
        </div>
    </div>
    
    
@endsection

