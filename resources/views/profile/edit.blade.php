@extends('layouts.backend.main')

@section('breadcrumb')
    Edit Profile
@endsection

@section('content')
<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Password</div>
            </div>
            <form method="POST" action="{{ route('profile.update.password') }}">
                @csrf
                <div class="card-body">
                    <div class="text-center chat-image mb-5">
                        <div class="avatar avatar-xxl chat-profile mb-3 brround">
                            <img src="{{ asset('assets/images/users/7.jpg') }}" class="brround">
                        </div>
                        <div class="main-chat-msg-name">
                            <a href="profile.html">
                                <h5 class="mb-1 text-dark fw-semibold">{{ Auth::user()->name }}</h5>
                            </a>
                            <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{ Auth::user()->roles()->first()->name }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password Lama</label>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input name="old_password" type="password" class="input100 form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password Baru</label>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input name="new_password" type="password" class="input100 form-control @error('new_password') is-invalid @enderror" id="newPasswordInput">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Konfirmasi Password</label>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input name="new_password_confirmation" type="password" class="input100 form-control" id="confirmNewPasswordInput">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <input type="submit" class="btn btn-primary" value="Update Password">
                </div>
            </form>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
            </div>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="email">Alamat Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <input type="submit" class="btn btn-primary" value="Update Akun">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets//js/show-password.min.js') }}"></script>

<script>
</script>
@endsection