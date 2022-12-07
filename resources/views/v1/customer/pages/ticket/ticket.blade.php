@extends('adminlte::page')
@section('content')
    
    @if ($starter->closed == false)
    
        {{-- create ticket --}}
        @include('v1.customer.layouts.ticket.create-ticket')
    
    @else
        
        {{-- show tickets --}}
        @include('v1.customer.layouts.ticket.show-tickets')
   @endif
    
@endsection