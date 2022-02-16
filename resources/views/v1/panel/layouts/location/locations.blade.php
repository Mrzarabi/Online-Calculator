@php
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="d-flex justify-content-start mt-4 ml-0 mb-4">
                <a href=" {{route('locations.index')}} "> <img src="/defaultImages/panel/ticket/back-left.png" alt="back left"></a>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($locations as $location)
                        <div class="col-6">
                            <div class="card custom-back-color-card">
                                <div class="card-body pb-0">
                                    <span class="custom-font-weight badge badge-pill mb-1 badge-primary" title="{{$location->title}}"> {{ $location->title }} </span>
                                    <span class="custom-font-weight badge badge-pill mb-1 badge-success"> {{ Carbon::parse($location->created_at)->format('d/m/Y H:m') }} </span>
                                    <span class="custom-font-weight badge badge-pill mb-1 badge-warning"> {{ $location->ip }} </span>
                                    <div>
                                        <table class="m-0">
                                            <tr>
                                                <td class="text-left color">Country Name:</td>
                                                <td class="{{$location->countryName ? 'text-color' : 'text-danger'}}"> 
                                                        {{$location->countryName ? $location->countryName : 'NULL'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left color">Latitude:</td>
                                                <td class="{{$location->latitude ? 'text-color' : 'text-danger'}}">
                                                    {{$location->latitude ? $location->latitude : 'NUll'}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left color">Longitude:</td>
                                                <td class="{{$location->longitude ? 'text-color' : 'text-danger'}}">
                                                    {{$location->longitude ? $location->longitude : 'NUll'}}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-start align-items-end show-table">
                {!! $locations->render('/vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection

