@extends('adminlte::page')
@section('content')
        
    @if ($starter->closed == false)
        {{-- create ticket --}}
        @include('V1.panel.layouts.ticket.create-ticket')
    @endif

    {{-- show tickets --}}
    @include('V1.panel.layouts.ticket.show-tickets')

@endsection