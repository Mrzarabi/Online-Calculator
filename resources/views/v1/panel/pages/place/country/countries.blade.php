@php
use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')
    <div class="h-indexes custom-background-card p-4">
        {{-- order choosed table view --}}
        @include('v1.panel.pages.place.country.table-view-countries')
    </div>
@endsection
