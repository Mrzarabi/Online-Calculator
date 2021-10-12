@php
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')

    <!-- Search form -->
    @include('v1.panel.layouts.user.search-user')
    
    <div class="container">
        @foreach ($users as $user)
            <div class="card custom-card-color">
                <div class="card-header">
                    <img src=" {{$user->avatar ? $user->avatar : '/defaultImages/avatar.png'}} " alt="user" />
                </div>
                <div class="card-body pb-0">
                    <span class="tag tag-teal">{{$user->email}}</span>
                    <h4>{{$user->name . ' ' . $user->family}}</h4>
                    <h6>{{$user->address ? $user->address : 'NO ADDRESS'}}</h6>
                    <h6>{{$user->phone ? $user->phone : 'NO PHONE'}}</h6>
                    <div class="user">
                        <div class="user-info">
                            <small class="custom-user-info"> {{ Carbon::parse($user->created_at)->format('d/m/Y') }} </small>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-2">
                    <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#deleteUser-{{$user->id}}" data-whatever="@mdo">Delete</button>
                    <form action="{{ route('locations.index', ['user' => $user->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-warning">Show Locations</button>
                    </form>
                </div>
            </div>
            {{-- modal --}}
            <div class="modal fade" id="deleteUser-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content custom-card-color">
                        <div class="modal-body">
                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    @method('DELETE')
                                    <h5 class="text-center">Are you sure you want to delete user {{$user->name . ' ' . $user->family}}?</h5>
                                    <div class="mt-3 ml-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Yes, Delete User</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {!! $users->render('/vendor.pagination.bootstrap-4') !!}
    </div>
@endsection

