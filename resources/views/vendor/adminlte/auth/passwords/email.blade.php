@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@php( $password_email_url = View::getSection('password_email_url') ?? config('adminlte.password_email_url', 'password/email') )

@if (config('adminlte.use_route_url', false))
    @php( $password_email_url = $password_email_url ? route($password_email_url) : '' )
@else
    @php( $password_email_url = $password_email_url ? url($password_email_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.password_reset_message'))

@section('auth_body')
    <div class="d-flex justify-content-center">

        <form action="{{ $password_email_url }}" method="post">
            {{ csrf_field() }}
    
            {{-- Email field --}}
            {{-- <div class="input-group mb-3">
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} custom-form-control"
                       value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text custom-icon-back-color">
                        <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                    </div>
                </div>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
            </div> --}}
    
            <div class="form-group mb-3">
                <input type="email" class="form-control form-control-sm background-color-inputs border-0" id="email" name="email" value="{{old('email')}}" placeholder="{{ __('adminlte::adminlte.email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="d-block text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            {{-- Send reset link button --}}
            {{-- <button type="submit" class="rounded btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                <span class="fas fa-share-square"></span>
                {{ __('adminlte::adminlte.send_password_reset_link') }}
            </button> --}}
    
            <div class="col-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <button type="submit" class="btns text-color custom-font-size pt-2 pb-2 btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat') }} rounded">
                            <span class="fas fa-sign-in-alt"></span>
                            {{ __('adminlte::adminlte.send_password_reset_link') }}
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>

@stop
