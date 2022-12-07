@php
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="d-flex justify-content-start">
                    <div class="custom-card custom-background-card custom-sm-card">
                        <div class="card-header d-flex align-items-center">
                            <img src=" {{$user->avatar ? $user->avatar : '/defaultImages/avatar.png'}} " alt="user" class="rounded-circle profile-image" height="165" width="165"/>
                            <h4 class="ml-3 color">{{$user->name . ' ' . $user->family}}</h4>
                        </div>
                        <div class="card-body pb-0">
                            <div class="d-flex mb-3">
                                <span class="mr-3">
                                    <img src="/defaultImages/panel/profile/email.png" alt="email">    
                                </span> 
                                <h6 class="color mt-1">{{$user->email}}</h6>
                            </div>
                            <div class="d-flex">
                                <span class="mr-3">
                                    <img src="/defaultImages/panel/profile/address.png" alt="address">
                                </span>
                                <h6 class="color mt-1">{{$user->address ? $user->address : 'NO ADDRESS'}}</h6>
                            </div>
                            <div class="d-flex">
                                <span class="mr-3">
                                    <img src="/defaultImages/panel/profile/phone.png" alt="phone">
                                </span>
                                <h6 class="color mt-1">{{$user->phone ? $user->phone : 'NO PHONE'}}</h6>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-2 p-4">
                            <button type="button" class="btn-sm btns text-color custom-font-size pr-3 pl-3" data-toggle="modal" data-target="#user-{{$user->id}}" data-whatever="@mdo">Edit Profile</button>
                            <small class="custom-user-info color"> {{ Carbon::parse($user->created_at)->format('d/m/Y') }} </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex justify-content-end">
                    <img src="/defaultImages/Right.png" alt="vector" height="780">
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="user-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content background-color-modals modal-border">
                <div class="modal-body">
                    <form action="{{route('settings.profile', ['user' => $user->id])}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="color custom-font-size">NAME</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="name" name="name" value="{{isset($user) ? $user->name : '' }}">
                            @if ($errors->has('name'))
                                <span class="d-block text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="family" class="color custom-font-size">FAMILY</label>>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="family" name="family" value="{{isset($user) ? $user->family : '' }}">
                            @if ($errors->has('family'))
                                <span class="d-block text-danger">{{ $errors->first('family') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email" class="color custom-font-size">EMAIL</label>
                            <input type="email" class="form-control form-control-sm background-color-inputs border-0" id="email" name="email" value="{{isset($user) ? $user->email : '' }}">
                            @if ($errors->has('email'))
                                <span class="d-block text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone" class="color custom-font-size">PHONE</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="phone" name="phone" value="{{isset($user) ? $user->phone : '' }}">
                            @if ($errors->has('phone'))
                                <span class="d-block text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address" class="color custom-font-size">ADDRESS</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="address" name="address" value="{{isset($user) ? $user->address : '' }}">
                            @if ($errors->has('address'))
                                <span class="d-block text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label color custom-font-size" for="avatar"> AVATAR </label>
                            <div class="input-group">
                                <input type="file" name="avatar" class="file-input-text border-0" id="avatar"/>
                            </div>
                            @if ($errors->has('avatar'))
                                <span class="d-block text-danger">{{ $errors->first('avatar') }}</span>
                            @endif
                            <div class="d-flex justify-content-center mt-3">
                                @isset ($user->avatar)
                                    <img src=" {{$user->avatar}} " alt="avatar" class="custom-style-user">
                                @endisset
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="button" class="btn text-color custom-font-size pr-3 pl-3 btn-sm mr-2" data-dismiss="modal">CLOSE</button>
                            <button type="submit" class="btns text-color custom-font-size pr-3 pl-3 btn-sm">SUBMIT</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
@endsection

