@php
use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')
    <!-- Search form -->
    @include('v1.panel.pages.user.user.search-user')

    <div class="col-md-12">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="custom-card custom-background-card">
                        <div class="card-header d-flex align-items-center">
                            <img src=" {{ $user->avatar ? $user->avatar : '/defaultImages/avatar.png' }} " alt="user"
                                class="rounded-circle profile-image" height="165" width="165" />
                            <h4 class="ml-3 color">{{ $user->name . ' ' . $user->family }}</h4>
                        </div>
                        <div class="card-body pb-0">
                            <div class="d-flex mb-3">
                                <span class="mr-3">
                                    <img src="/defaultImages/panel/profile/email.png" alt="email">
                                </span>
                                <h6 class="color mt-1">{{ $user->email }}</h6>
                            </div>
                            <div class="d-flex">
                                <span class="mr-3">
                                    <img src="/defaultImages/panel/profile/address.png" alt="address">
                                </span>
                                <h6 class="color mt-1">{{ $user->address ? $user->address : 'NO ADDRESS' }}</h6>
                            </div>
                            <div class="d-flex">
                                <span class="mr-3">
                                    <img src="/defaultImages/panel/profile/phone.png" alt="phone">
                                </span>
                                <h6 class="color mt-1">{{ $user->phone ? $user->phone : 'NO PHONE' }}</h6>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btns pr-3 pl-3 btn-sm text-color mr-1" data-toggle="modal"
                                data-target="#deleteUser-{{ $user->id }}" data-whatever="@mdo">DELETE</button>
                            <form action="{{ route('locations.index', ['user' => $user->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="btns text-color btn-sm pr-3 pl-3">SHOW LOCATION</button>
                            </form>
                        </div>
                    </div>
                    {{-- modal --}}
                    <div class="modal fade" id="deleteUser-{{ $user->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content background-color-modals modal-border">
                                <div class="modal-body">
                                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                                        <div class="modal-body">
                                            @csrf
                                            @method('DELETE')
                                            <h5 class="text-center text-color"> ARE YOU SURE THAT YOU WANT TO DELETE THE
                                                USER {{ $user->name . ' ' . $user->family }}?</h5>
                                            <div class="mt-3 ml-4 d-flex justify-content-end">
                                                <button type="button"
                                                    class="btn text-color pr-4 pl-4 pt-2 pb-2 mr-2 custom-font-size"
                                                    data-dismiss="modal">CANCEL</button>
                                                <button type="submit"
                                                    class="btns text-color pr-4 pl-4 pt-2 pb-2 custom-font-size">YES, DELETE
                                                    USER</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end modal --}}
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-start align-items-end show-table">
        {!! $users->render('/vendor.pagination.bootstrap-4') !!}
    </div>
@endsection
