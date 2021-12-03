@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Element;
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')

    

    {{-- card view orders --}}
    @include('v1.customer.layouts.order.card-view-orders')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9  custom-background-card custom-card">
                {{-- create new order and return to the page index --}}
                @include('v1.customer.layouts.order.create-order')

                {{-- table view orders --}}
                @include('v1.customer.layouts.order.table-view-orders')
            </div>
            <div class="col-md-3">
                <div class="d-flex justify-content-end">
                    <img src="/defaultImages/Right.png" alt="vector" height="780">
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-center show-table">
        {!! $orders->render('/vendor.pagination.bootstrap-4') !!}
    </div>
@endsection

