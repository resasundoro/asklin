@section('title')
    {{ __('Verify Your Email Address') }}
@endsection

@extends('layouts.frontend.main')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">{{ __('Verify Your Email Address') }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Lost Password</li>
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="featured-box featured-box-primary text-start mt-0">
                    <div class="box-content">
                        <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-0">{{ __('Verify Your Email Address') }}</h4>
                        <p class="text-2 opacity-7">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                        <p class="ftext-2 opacity-7">{{ __('If you did not receive the email') }},</p>
                        <form action="{{ route('verification.resend') }}" id="frmLostPassword" method="post" class="needs-validation">
                            <div class="row">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input type="submit" value="{{ __('click here to request another') }}" class="btn btn-primary btn-modern float-end" data-loading-text="Loading...">
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