@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Element;
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')

    {{-- order choosed --}}
    @include('v1.panel.layouts.clearing.card-view-order-clearing')

    @include('v1.panel.layouts.clearing.table-view-order-clearing')
    
    @include('v1.panel.layouts.clearing.create-clearing')
    
@endsection