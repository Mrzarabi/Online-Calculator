@extends('adminlte::page')
@section('content')
    <div class="col-md-12">
        <div class="custom-background-card p-4 h-indexes">
            <div class="row">
                
                {{-- table view --}}
                @include('v1.panel.layouts.feedback.table-view-feedbacks')
                
                <div class="d-flex justify-content-center show-table">
                    {!! $feedbacks->render('/vendor.pagination.bootstrap-4') !!}
                </div>
            </div>

        </div>
    </div>

    {{-- card veiw --}}
    {{-- @include('v1.panel.layouts.feedback.card-view-feedbacks') --}}
@endsection

