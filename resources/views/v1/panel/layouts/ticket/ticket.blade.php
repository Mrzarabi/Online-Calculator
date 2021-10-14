@extends('adminlte::page')
@section('content')
        
    @if ($starter->closed == false)
        {{-- create ticket --}}
        @include('v1.panel.layouts.ticket.create-ticket')
    @endif

    {{-- show tickets --}}
    @include('v1.panel.layouts.ticket.show-tickets')

@endsection