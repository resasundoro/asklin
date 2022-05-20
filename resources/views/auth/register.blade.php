@extends('layouts.auth.main')

@section('title')
    {{ __('Register') }}
@endsection

@section('content')
<div class="container-login100">
    <div class="wrap-login100 p-6">
        <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
            @csrf
            <span class="login100-form-title">{{ __('Register') }}</span>

            <div class="wrap-input100 validate-input input-group">
                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                    <i class="mdi mdi-account" aria-hidden="true"></i>
                </a>
                <input id="name" type="text" class="input100 border-start-0 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input input-group">
                <a href="javascript:void(0)" class="input-group-text bg-white text-muted"><i class="zmdi zmdi-email text-muted" aria-hidden="true"></i></a>
                <input id="email" type="email" class="input100 border-start-0 form-control ms-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Email Address') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                <a href="javascript:void(0)" class="input-group-text bg-white text-muted"><i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i></a>
                <input id="password" type="password" class="input100 border-start-0 form-control ms-0 @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                <a href="javascript:void(0)" class="input-group-text bg-white text-muted"><i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i></a>
                <input id="password-confirm" type="password" class="input100 border-start-0 form-control ms-0 @error('password') is-invalid @enderror" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn btn-primary">{{ __('Register') }}</button>
            </div>
            <div class="text-center pt-3">
                <p class="text-dark mb-0">Already have account?<a href="{{ route('login') }}" class="text-primary ms-1">Sign In</a></p>
            </div>

        </form>
    </div>
</div>
@endsection
