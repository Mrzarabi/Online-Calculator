@php
    use App\Models\Inventory;
    $inventory = Inventory::latest()->first();
@endphp

@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))


@section('auth_body')
    <div>
        @if (isset($inventory->paypalInv))
            <h6 class="text-color text-sm text-nowrap text-center">PayPal Reserve Balance: {{$inventory->paypalInv}}</h6>
        @endif
        @if (isset($inventory->cashInv))
            <h6 class="text-color text-sm text-nowrap text-center @if (empty($inventory->perfectMoneyInv) && empty($inventory->webMoneyInv) && empty($inventory->tetherInv) ) mb-4 @endif ">Cash Reserve Balance: {{$inventory->cashInv}}</h6>
        @endif
        @if (isset($inventory->perfectMoneyInv))
            <h6 class="text-color text-sm text-nowrap text-center @if (empty($inventory->webMoneyInv) && empty($inventory->tetherInv) ) mb-4 @endif">Perfect Money Balance Reserve: {{$inventory->perfectMoneyInv}}</h6>
        @endif
        @if (isset($inventory->webMoneyInv))
            <h6 class="text-color text-sm text-nowrap text-center @if (empty($inventory->tetherInv)) mb-4 @endif">Web Money Balance Reserve: {{$inventory->webMoneyInv}}</h6>
        @endif
        @if (isset($inventory->tetherInv))
            <h6 class="text-color text-sm text-nowrap text-center @if (isset($inventory->tetherInv)) mb-4 @endif">Tether Balance Reserve: {{$inventory->tetherInv}}</h6>
        @endif
    </div>
    <form action="{{ $register_url }}" method="post">
        {{ csrf_field() }}
            <div class="mb-3">
                <a href=" {{route('auth.google')}} " class="btns custom-font-size text-color text-center d-block btn-sm">Sign up with Google</a>
            </div>

        {{-- Name field --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} custom-form-control"
                   value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text custom-icon-back-color">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} custom-form-control"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
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
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
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
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }} custom-form-control"
                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">
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
        </div>

        {{-- Register button --}}
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <button type="submit" class="btns custom-font-size pt-2 pb-2 btn-block text-color {{ config('adminlte.classes_auth_btn', 'btn-flat') }} rounded">
                    <span class="fas fa-user-plus"></span>
                    {{ __('adminlte::adminlte.register') }}
                </button>
            </div>
        </div>

    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}" class="color">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop
