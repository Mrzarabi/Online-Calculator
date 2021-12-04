@extends('adminlte::page')
@section('content')
    <div class="col-md-12">
        <div class="row custom-background-card p-4">

            <!-- Search form -->
            @include('v1.panel.layouts.order.search-order')
            
            {{-- table view --}}
            @include('v1.panel.layouts.order.table-view-orders')
            
            <div class="d-flex justify-content-center show-table">
                {!! $orders->render('/vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>

    {{-- card veiw --}}
    @include('v1.panel.layouts.order.card-view-orders')
@endsection

