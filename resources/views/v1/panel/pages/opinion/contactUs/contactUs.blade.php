@extends('adminlte::page')
@section('content')
    <div class="col-md-12">
        <div class="custom-background-card p-4 h-indexes">
            <div class="row">

                {{-- table views --}}
                @include('v1.panel.pages.opinion.contactUs.table-view-contactus')


                <div class="d-flex justify-content-center show-table">
                    {!! $contactUses->render('/vendor.pagination.bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
