@section('title')
    Register
@endsection

@extends('layouts.frontend.main')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-light-scale-2 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">Register Akun</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-info alert-admin">
                    <div class="row">
                        <div class="col-lg-8">
                            <h4>Info</h4>
                            <p> Dengan ini menyatakan bersedia mematuhi semua peraturan perundang-undangan yang berlaku di Negara Republik Indonesia untuk Akreditasi Klinik dan ketentuan-ketentuan yang diterbitkan oleh ASKI</p>
                            <p>
                                Setelah anda melakukan pendaftaran ini, silahakan anda <a href="{{ route('login') }}">Klik login</a> supaya dapat mengisi formulir pendaftaran
                            </p>
                        </div>
                        <div class="col-lg-4 col-sm-12 visible-md visible-lg">
                            <img class="appear-animation float-end" src="{{ asset('frontend/img/registerakun.png') }}" data-appear-animation="fadeIn">
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<div role="main" class="main shop py-4">
		<div class="container py-4">
            <form action="{{ route('register') }}" id="frmSignIn" method="POST" class="needs-validation">
                @csrf
			    <div class="row justify-content-center col-md-12">
				    <div class="col-md-6 col-lg-5 mb-5">
                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label text-color-dark text-3">Nama Lengkap <span class="text-color-danger">*</span></label>
                                <input id="name" type="text" class="form-control form-control-lg text-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label text-color-dark text-3">Email <span class="text-color-danger">* Yang digunakan untuk Login nanti</span></label>
                                <input id="email" type="email" class="form-control form-control-lg text-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Email Address') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label text-color-dark text-3">Password <span class="text-color-danger">*</span></label>
                                <input id="password" type="password" class="form-control form-control-lg text-4 @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label text-color-dark text-3">Confirm Password <span class="text-color-danger">*</span></label>
                                <input id="password-confirm" type="password" class="form-control form-control-lg text-4 @error('password') is-invalid @enderror" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <button type="submit" class="btn btn-primary btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>
@endsection