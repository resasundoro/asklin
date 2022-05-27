@section('title')
    Login
@endsection

@extends('layouts.frontend.main')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">Login Akun</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Login</li>
                    </ul>
                </div>
            </div>
        </div>

        <br>

        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="featured-box featured-box-primary text-start mt-0">
                    <div class="box-content">
                        <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">LOGIN ASKI</h4>
                        <form action="{{ route('login') }}" id="frmSignIn" method="POST" class="needs-validation">
                            @csrf
                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label"> E-mail Address</label>
                                    <input id="email" type="email" class="form-control form-control-lg" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Email Address') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    @if (Route::has('password.request'))
                                        <a class="float-end" href="{{ route('password.request') }}">(Lupa Password?)</a>
                                    @endif
                                    <label class="form-label">Password</label>
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label text-2" for="rememberme">Remember Me</label>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="submit" value="Login" class="btn btn-primary btn-modern float-end" data-loading-text="Loading...">
                                </div>
                                <p>Belum Mempunyai Akun ?<a href="{{ route('register') }}"> Klik Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
