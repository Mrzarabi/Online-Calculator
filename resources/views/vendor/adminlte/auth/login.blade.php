@php
use App\Models\Financial\Inventory\Inventory;
$inventory = Inventory::latest()->first();
@endphp

@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
@php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))
@php($password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset'))

@if (config('adminlte.use_route_url', false))
    @php($login_url = $login_url ? route($login_url) : '')
    @php($register_url = $register_url ? route($register_url) : '')
    @php($password_reset_url = $password_reset_url ? route($password_reset_url) : '')
@else
    @php($login_url = $login_url ? url($login_url) : '')
    @php($register_url = $register_url ? url($register_url) : '')
    @php($password_reset_url = $password_reset_url ? url($password_reset_url) : '')
@endif

@section('auth_header', __('adminlte::adminlte.login_message'))

@section('auth_body')
    <div>
        @if (isset($inventory->paypalInv))
            <h6 class="text-color text-sm text-nowrap text-center">PayPal Reserve Balance: {{ $inventory->paypalInv }}</h6>
        @endif
        @if (isset($inventory->cashInv))
            <h6 class="text-color text-sm text-nowrap text-center @if (empty($inventory->perfectMoneyInv) && empty($inventory->webMoneyInv) && empty($inventory->tetherInv)) mb-4 @endif ">Cash
                Reserve Balance: {{ $inventory->cashInv }}</h6>
        @endif
        @if (isset($inventory->perfectMoneyInv))
            <h6 class="text-color text-sm text-nowrap text-center @if (empty($inventory->webMoneyInv) && empty($inventory->tetherInv)) mb-4 @endif">Perfect
                Money Balance Reserve: {{ $inventory->perfectMoneyInv }}</h6>
        @endif
        @if (isset($inventory->webMoneyInv))
            <h6 class="text-color text-sm text-nowrap text-center @if (empty($inventory->tetherInv)) mb-4 @endif">Web Money
                Balance Reserve: {{ $inventory->webMoneyInv }}</h6>
        @endif
        @if (isset($inventory->tetherInv))
            <h6 class="text-color text-sm text-nowrap text-center @if (isset($inventory->tetherInv)) mb-4 @endif">Tether
                Balance Reserve: {{ $inventory->tetherInv }}</h6>
        @endif
    </div>

    <form action="{{ $login_url }}" method="post">
        {{ csrf_field() }}

        <div class="mb-3">
            <a href=" {{ route('auth.google') }} "
                class="btns custom-font-size btn-sm pt-2 pb-2 text-color d-block text-center">Sign in with google</a>
        </div>

        {{-- Email field --}}
        {{-- <div class="input-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} custom-form-control"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text custom-icon-back-color">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div> --}}
        <div class="form-group mb-3">
            <input type="email" class="form-control form-control-sm background-color-inputs border-0" id="email"
                name="email" value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" required
                autofocus>
            @if ($errors->has('email'))
                <span class="d-block text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>

        {{-- Password field --}}
        {{-- <div class="input-group mb-3">
            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} background-color-inputs"
                   placeholder="{{ __('adminlte::adminlte.password') }}">
            <div class="input-group-append">
                <div class="input-group-text background-color-inputs">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div> --}}

        <div class="form-group mb-3">
            <input type="password" class="form-control form-control-sm background-color-inputs border-0" id="password"
                name="password" value="{{ old('password') }}" placeholder="{{ __('adminlte::adminlte.password') }}"
                required>
            @if ($errors->has('password'))
                <span class="d-block text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>

        {{-- Login field --}}
        <div class="row">
            {{-- <div class="col-7">
                <div class="icheck-primary">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">{{ __('adminlte::adminlte.remember_me') }}</label>
                </div>
            </div> --}}
            <div class="col-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-5">
                        <button type="submit"
                            class="btns text-color custom-font-size pt-2 pb-2 btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat') }} rounded">
                            <span class="fas fa-sign-in-alt"></span>
                            {{ __('adminlte::adminlte.sign_in') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </form>
@stop

@section('auth_footer')
    {{-- Password reset link --}}
    @if ($password_reset_url)
        <p class="my-0">
            <a href="{{ $password_reset_url }}" class="color">
                {{ __('adminlte::adminlte.i_forgot_my_password') }}
            </a>
        </p>
    @endif

    {{-- Register link --}}
    @if ($register_url)
        <p class="my-0">
            <a href="{{ $register_url }}" class="color">
                {{ __('adminlte::adminlte.register_a_new_membership') }}
            </a>
        </p>
    @endif
@stop
