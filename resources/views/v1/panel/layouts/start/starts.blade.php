@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Ticket;
    use App\Models\Starter;
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')

    {{-- table views --}}
    @include('v1.panel.layouts.start.search-starts')
    
    {{-- table views --}}
    @include('v1.panel.layouts.start.table-view-starts')
    
    {{-- card views --}}
    @include('v1.panel.layouts.start.card-view-starts')

    <div class="d-flex justify-content-center show-table">
        {!! $starts->render('/vendor.pagination.bootstrap-4') !!}
    </div>
@endsection

