@extends('adminlte::page')
@section('content')
    <!-- Search form -->
    @include('v1.panel.layouts.order.search-order')
    
    {{-- card veiw --}}
    @include('v1.panel.layouts.order.card-view-orders')

    {{-- table view --}}
    @include('v1.panel.layouts.order.table-view-orders')
    
    <div class="d-flex justify-content-center show-table">
        {!! $orders->render('/vendor.pagination.bootstrap-4') !!}
    </div>
@endsection

