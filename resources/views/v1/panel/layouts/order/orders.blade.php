@extends('adminlte::page')
@section('content')
    <div class="col-md-12">
        <div class="custom-background-card p-4 h-indexes">
            <div class="row">

                <!-- Search form -->
                @include('v1.panel.layouts.order.search-order')
                
                {{-- table view --}}
                @include('v1.panel.layouts.order.table-view-orders')
                
                <div class="d-flex justify-content-start align-items-end show-table">
                    {!! $orders->render('/vendor.pagination.bootstrap-4') !!}
                </div>
            </div>

        </div>
    </div>
@endsection

