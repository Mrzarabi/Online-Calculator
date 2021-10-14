@php
    use App\Models\Ticket;
@endphp
@extends('adminlte::page')
@section('content')
    
    @if ($starter->closed == false)
        {{-- create ticket --}}
        @include('v1.customer.layouts.ticket.create-ticket')
    @endif
    
    {{-- show tickets --}}
    @include('v1.customer.layouts.ticket.show-tickets')
    
@endsection