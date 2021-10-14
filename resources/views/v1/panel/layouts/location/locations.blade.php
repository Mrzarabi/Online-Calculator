@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Element;
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')
    <div class="d-flex justify-content-center">
        <a href=" {{route('users.index')}} " class="btn btn-primary mr-3 justify-center">Return To Page Users</a>
    </div>
    <div class="container">
        @foreach ($locations as $location)
        <div class="d-flex justify-content-center m-4">
        </div>
            <div class="card custom-back-color-card">
                <div class="card-body pb-0">
                    <span class="custom-font-weight badge badge-pill mb-1 badge-primary" title="{{$location->title}}"> {{ $location->title }} </span>
                    <span class="custom-font-weight badge badge-pill mb-1 badge-success"> {{ Carbon::parse($location->created_at)->format('d/m/Y H:m') }} </span>
                    <span class="custom-font-weight badge badge-pill mb-1 badge-warning"> {{ $location->ip }} </span>
                    <div>
                        <table class="m-0">
                            <tr>
                                <td class="text-left text-white">Country Name:</td>
                                <td class="{{$location->countryName ? '' : 'text-danger'}}"> 
                                        {{$location->countryName ? $location->countryName : 'NULL'}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left text-white">Country Code:</td>
                                <td class="{{$location->countryCode ? '' : 'text-danger'}}">
                                    {{$location->countryCode ? $location->countryCode : "NULL"}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left text-white">Region Code:</td>
                                <td class="{{$location->regionCode ? '' : 'text-danger'}}">
                                    {{$location->regionCode ? $location->regionCode : 'NUll'}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left text-white">Region Name:</td>
                                <td class="{{$location->regionName ? '' : 'text-danger'}}">
                                    {{$location->regionName ? $location->regionName : 'NUll'}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left text-white">City Name:</td>
                                <td class="{{$location->cityName ? '' : 'text-danger'}}">
                                    {{$location->cityName ? $location->cityName : 'NUll'}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left text-white">Zip Code:</td>
                                <td class="{{$location->zipCode ? '' : 'text-danger'}}">
                                    {{$location->zipCode ? $location->zipCode : 'NUll'}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left text-white">Iso Code:</td>
                                <td class="{{$location->isoCode ? '' : 'text-danger'}}">
                                    {{$location->isoCode ? $location->isoCode : 'NUll'}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left text-white">Postal Code:</td>
                                <td class="{{$location->postalCode ? '' : 'text-danger'}}">
                                    {{$location->postalCode ? $location->postalCode : 'NUll'}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left text-white">Latitude:</td>
                                <td class="{{$location->latitude ? '' : 'text-danger'}}">
                                    {{$location->latitude ? $location->latitude : 'NUll'}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left text-white">Longitude:</td>
                                <td class="{{$location->longitude ? '' : 'text-danger'}}">
                                    {{$location->longitude ? $location->longitude : 'NUll'}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left text-white">Metro Code:</td>
                                <td class="{{$location->metroCode ? '' : 'text-danger'}}">
                                    {{$location->metroCode ? $location->metroCode : 'NUll'}}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left text-white">Area Code:</td>
                                <td class="{{$location->areaCode ? '' : 'text-danger'}}">
                                    {{$location->areaCode ? $location->areaCode : 'NUll'}}
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="user mt-2">
                        <img src=" {{$location->user->avatar ? $location->user->avatar : '/defaultImages/avatar.png'}} " alt="user" />
                        <div class="user-info">
                            <h5 class="custom-user-info"> {{$location->user->name . ' ' . $location->user->family}} </h5>
                            <small class="custom-user-info"> {{$location->user->email}} </small>
                            <br>
                            <small class="custom-user-info"> {{$location->user->phone ? $location->user->phone : 'NO PHONE' }} </small>
                            <br>
                            <small class="custom-user-info">{{$location->user->address ? $location->user->address : 'NO ADDRESS'}}</small>
                            <br>
                            <small class="custom-user-info"> {{ Carbon::parse($location->created_at)->format('d/m/Y') }} </small>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-2">
                    {{-- <form action="{{route('orders.accept', ['location' => $location->id])}} " method="POST" class="mr-1">
                        @if ($location->accept == false)
                            <button type="submit" class="btn btn-sm btn-success">Accept</button>
                        @else 
                            <button type="submit" class="btn btn-sm btn-secondary">Pending</button>
                        @endif
                        @csrf
                    </form> --}}
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center show-table">
        {!! $locations->render('/vendor.pagination.bootstrap-4') !!}
    </div>
@endsection

