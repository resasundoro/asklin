@section('title')
    {{ __('Reset Password') }}
@endsection

@extends('layouts.frontend.main')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">{{ __('Reset Password') }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">{{ __('Reset Password') }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <br>
		<div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="featured-box featured-box-primary text-start mt-0">
                    <div class="box-content">
                        <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-0">{{ __('Reset Password') }}</h4>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('password.email') }}" id="frmLostPassword" method="POST" class="needs-validation">
                            @csrf
                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Email Address') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input type="submit" value="{{ __('Send Password Reset Link') }}" class="btn btn-primary btn-modern float-end" data-loading-text="Loading...">
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
