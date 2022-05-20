@extends('layouts.auth.main')

@section('title')
    {{ __('Reset Password') }}
@endsection

@section('content')
<div class="container-login100">
    <div class="wrap-login100 p-6">
        <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <span class="login100-form-title pb-5">{{ __('Reset Password') }}</span>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="wrap-input100 validate-input input-group">
                <a href="javascript:void(0)" class="input-group-text bg-white text-muted"><i class="zmdi zmdi-email text-muted" aria-hidden="true"></i></a>
                <input id="email" type="email" class="input100 border-start-0 form-control ms-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Email Address') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn btn-primary">{{ __('Send Password Reset Link') }}</button>
            </div>

        </form>
    </div>
</div>
@endsection
