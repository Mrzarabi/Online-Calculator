@extends('adminlte::page')
@section('content')
    @if ($starter->closed == false)
        {{-- create ticket --}}
        @include('v1.panel.layouts.ticket.create-ticket')
    @else 
        {{-- show tickets blade --}}
        @include('v1.panel.layouts.ticket.show-tickets')
    @endif
@endsection