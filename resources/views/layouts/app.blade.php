@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    
    {{$slot}}

@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="/panel/css/custom-style.css">
@stop

@section('js')

@stop