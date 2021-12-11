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

    <div class="col-md-12">
        <div class="custom-background-card p-4 h-indexes">
            <div class="row">
                {{-- table views --}}
                @include('v1.panel.layouts.start.search-starts')
                
                {{-- table views --}}
                @include('v1.panel.layouts.start.table-view-starts')
                
                
                <div class="d-flex justify-content-center show-table">
                    {!! $starts->render('/vendor.pagination.bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
    
    
    {{-- card views --}}
    @include('v1.panel.layouts.start.card-view-starts')

@endsection

