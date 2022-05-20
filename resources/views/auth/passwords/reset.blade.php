@extends('layouts.auth.main')

@section('title')
    {{ __('Reset Password') }}
@endsection

@section('content')
<div class="container-login100">
    <div class="wrap-login100 p-6">
        <form class="login100-form validate-form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <span class="login100-form-title pb-5">{{ __('Reset Password') }}</span>
            <p class="text-muted">Enter the email address registered on your account</p>

            <div class="wrap-input100 validate-input input-group">
                <a href="javascript:void(0)" class="input-group-text bg-white text-muted"><i class="zmdi zmdi-email text-muted" aria-hidden="true"></i></a>
                <input id="email" type="email" class="input100 border-start-0 form-control ms-0 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ __('Email Address') }}" required autocomplete="email" autofocus>
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
                <button type="submit" class="login100-form-btn btn-primary">{{ __('Reset Password') }}</button>
            </div>

        </form>
    </div>
</div>
@endsection
