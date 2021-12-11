@php
    use App\Models\Ticket;
@endphp
@extends('adminlte::page')
@section('content')
    
    @if ($starter->closed == false)
        {{-- create ticket --}}
        @include('v1.customer.layouts.ticket.create-ticket')
    @else
        {{-- table view tickets --}}
        @include('v1.customer.layouts.ticket.show-table-view-tickets')


        {{-- card view tickets  --}}
        @include('v1.customer.layouts.ticket.show-card-view-tickets')
   @endif
    
@endsection