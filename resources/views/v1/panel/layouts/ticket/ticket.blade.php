@extends('adminlte::page')
@section('content')
    @if ($starter->closed == false)
        {{-- create ticket --}}
        @include('v1.panel.layouts.ticket.create-ticket')
    @else 
        <div class="d-flex justify-content-start">
            <a href=" {{route('starters.index')}} " >
                <img src="/defaultImages/panel/ticket/back-left.png" alt="back left">
            </a>
        </div>
    @endif
@endsection