@section('title')
    My Profile
@endsection

@extends('layouts.frontend.main')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-light-scale-2 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">User Profil</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">User Profil</li>
                    </ul>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
							</ul>
						</div>
					@endif
                </div>
            </div>
        </div>
    </section>
    <div class="container pt-3 pb-2">
        <div class="row pt-2">
            @include('layouts.frontend.l_sidebar')
            <div class="col-lg-9">
				<form action="{{ route('profile.update.account') }}" role="form" class="needs-validation" method="POST">
					@csrf
					<div class="form-group row">
						<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Nama Lengkap</label>
						<div class="col-lg-9">
							<input class="form-control text-3 h-auto py-2" type="text" name="name" value="{{ $u->name }}" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Email</label>
						<div class="col-lg-9">
							<input class="form-control text-3 h-auto py-2" type="email" name="email" value="{{ $u->email }}" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Password</label>
						<div class="col-lg-9">
							<input class="form-control text-3 h-auto py-2" type="password" name="password">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Konfirmasi password</label>
						<div class="col-lg-9">
							<input class="form-control text-3 h-auto py-2" type="password" name="confirm-password">
						</div>
					</div>
					<div class="form-group row">
						<div class="form-group col-lg-9"></div>
						<div class="form-group col-lg-3">
							<input type="submit" value="Simpan" class="btn btn-primary btn-modern float-end" data-loading-text="Loading...">
						</div>
					</div>
				</form>
			</div>
        </div>
    </div>
</div>
@endsection