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

    {{-- table view orders --}}
    @include('v1.customer.layouts.order.table-view-orders')
    
    <div class="d-flex justify-content-center show-table">
        {!! $orders->render('/vendor.pagination.bootstrap-4') !!}
    </div>
@endsection

