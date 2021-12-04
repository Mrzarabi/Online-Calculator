@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Element;
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')

    {{-- order choosed card view--}}
    @include('v1.panel.layouts.clearing.card-view-order-clearing')
    <div class="custom-background-card p-4">
        {{-- order choosed  table view --}}
        @include('v1.panel.layouts.clearing.table-view-order-clearing')
    
        {{-- card view --}}
        @include('v1.panel.layouts.clearing.create-clearing')
    </div>
    
    
@endsection