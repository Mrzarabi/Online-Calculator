@extends('adminlte::page')
@section('content')
    <div class="col-md-12">
        <div class="custom-background-card p-4 h-indexes">
            <div class="row">

                <!-- Search form -->
                @include('v1.panel.layouts.order.search-order')
                
                {{-- table view --}}
                @include('v1.panel.layouts.order.table-view-orders')
                
                <div class="custom-style-pagination mt-3 show-table">
                    <div class="mt-auto">
                        {!! $orders->render('/vendor.pagination.bootstrap-4') !!}
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- card veiw --}}
    @include('v1.panel.layouts.order.card-view-orders')
@endsection

