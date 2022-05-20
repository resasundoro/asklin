@extends('layouts.auth.main')

@section('title')
    {{ __('Login') }}
@endsection

@section('content')
<div class="container-login100">
    <div class="wrap-login100 p-6">
        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
            @csrf
            <span class="login100-form-title pb-5">{{ __('Login') }}</span>
            <p class="text-muted">Enter the email address registered on your account</p>

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
                <input id="password" type="password" class="input100 border-start-0 form-control ms-0 @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="text-start">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn btn-primary">{{ __('Login') }}</button>
            </div>
            <div class="text-center pt-3">
                @if (Route::has('password.request'))
                    <p class="text-dark mb-0"><a href="{{ route('password.request') }}" class="text-primary ms-1">{{ __('Forgot Your Password?') }}</a></p>
                @endif
            </div>

        </form>
    </div>
</div>
@endsection
