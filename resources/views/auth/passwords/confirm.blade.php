@section('title')
    {{ __('Confirm Password') }}
@endsection

@extends('layouts.frontend.main')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">{{ __('Confirm Password') }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">{{ __('Confirm Password') }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <br>
		<div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="featured-box featured-box-primary text-start mt-0">
                    <div class="box-content">
                        <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-0">{{ __('Confirm Password') }}</h4>
                        <p class="text-2 opacity-7">{{ __('Please confirm your password before continuing.') }}</p>
                        <form action="{{ route('password.confirm') }}" id="frmLostPassword" method="POST" class="needs-validation">
                            @csrf
                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input type="submit" value="{{ __('Confirm Password') }}" class="btn btn-primary btn-modern float-end" data-loading-text="Loading...">
                                </div>
                                <div class="text-center pt-3">
                                    @if (Route::has('password.request'))
                                        <p class="text-dark mb-0"><a href="{{ route('password.request') }}" class="text-primary ms-1">{{ __('Forgot Your Password?') }}</a></p>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</section>
</div>
@endsection
