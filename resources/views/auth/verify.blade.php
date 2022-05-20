@extends('layouts.auth.main')

@section('title')
    {{ __('Verify Your Email Address') }}
@endsection

@section('content')
<div class="container-login100">
    <div class="wrap-login100 p-6">
        <form class="login100-form validate-form" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <span class="login100-form-title pb-5">{{ __('Verify Your Email Address') }}</span>
            <p class="text-muted">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
            <p class="text-muted">{{ __('If you did not receive the email') }},</p>
            
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn btn-primary">{{ __('click here to request another') }}</button>
            </div>

        </form>
    </div>
</div>
@endsection
