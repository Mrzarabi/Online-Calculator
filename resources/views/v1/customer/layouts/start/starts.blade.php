@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Ticket;
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')
    
    {{-- create starts --}}
    @include('v1.customer.layouts.start.create-starts')

    {{-- table views --}}
    @include('v1.customer.layouts.start.table-view-starts')
    
    {{-- card views --}}
    @include('v1.customer.layouts.start.card-view-starts')
    
    <div class="d-flex justify-content-center show-table">
        {!! $starts->render('/vendor.pagination.bootstrap-4') !!}
    </div>
@endsection

