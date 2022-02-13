@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.password_reset_message'))

@section('auth_body')
    <form action="{{ $password_reset_url }}" method="post">
        {{ csrf_field() }}

        {{-- Token field --}}
        <input type="hidden" name="token" value="{{ $token }}">

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

        {{-- Password field --}}
        {{-- <div class="input-group mb-3">
            <input type="password" name="password"
                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} custom-form-control"
                   placeholder="{{ __('adminlte::adminlte.password') }}">
            <div class="input-group-append">
                <div class="input-group-text custom-icon-back-color">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div> --}}

        <div class="form-group mb-3">
            <input type="password" class="form-control form-control-sm background-color-inputs border-0" id="password" name="password" value="{{old('password')}}" placeholder="{{ __('adminlte::adminlte.password') }}" required autofocus>
            @if ($errors->has('password'))
                <span class="d-block text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>

        {{-- Password confirmation field --}}
        {{-- <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }} custom-form-control"
                   placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
            <div class="input-group-append">
                <div class="input-group-text custom-icon-back-color">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
            @endif
        </div> --}}

        <div class="form-group mb-3">
            <input type="password" class="form-control form-control-sm background-color-inputs border-0" id="password_confirmation" name="password_confirmation" placeholder="{{ __('adminlte::adminlte.retype_password') }}" required>
            @if ($errors->has('password_confirmation'))
                <span class="d-block text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        {{-- Confirm password reset button --}}
        {{-- <button type="submit" class="rounded btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-sync-alt"></span>
            {{ __('adminlte::adminlte.reset_password') }}
        </button> --}}

        <div class="col-12">
            <div class="row d-flex justify-content-center">
                <div class="col-7">
                    <button type="submit" class="btns text-color custom-font-size pt-2 pb-2 btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat') }} rounded">
                        <span class="fas fa-sign-in-alt"></span>
                        {{ __('adminlte::adminlte.reset_password') }}
                    </button>
                </div>
            </div>
        </div>

    </form>
@stop
