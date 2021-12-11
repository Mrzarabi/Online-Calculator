@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Ticket;
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')
    


    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9 custom-background-card custom-card h-indexes p-4">
                {{-- create starts --}}
                @include('v1.customer.layouts.start.create-starts')

                {{-- table views --}}
                @include('v1.customer.layouts.start.table-view-starts')

                <div class="d-flex justify-content-start show-table">
                    {!! $starts->render('/vendor.pagination.bootstrap-4') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex justify-content-end">
                    <img src="/defaultImages/Right.png" alt="vector" height="780">
                </div>
            </div>
        </div>
    </div>



    
    {{-- card views --}}
    @include('v1.customer.layouts.start.card-view-starts')
    
    
@endsection

