@php
    use App\Models\Ticket;
@endphp
@extends('adminlte::page')
@section('content')
    
    @if ($starter->closed == false)
        {{-- create ticket --}}
        @include('V1.customer.layouts.ticket.create-ticket')
    @endif
    
    {{-- show tickets --}}
    @include('V1.customer.layouts.ticket.show-tickets')
    
@endsection