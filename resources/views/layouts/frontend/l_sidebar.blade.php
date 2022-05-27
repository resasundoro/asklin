<div class="col-lg-3 mt-4 mt-lg-0">
    <div class="d-flex justify-content-center mb-4">
        <div class="profile-image-outer-container">
            <div class="profile-image-inner-container bg-color-primary">
                <img src="{{ asset('/images/klinik/'.$k->logo_klinik) }}">
            </div>
        </div>
    </div>
    <aside class="sidebar mt-2" id="sidebar">
        <ul class="nav nav-list flex-column mb-5">
            <li class="nav-item"><a class="nav-link text-3" href="{{ route('pendaftaran') }}">User Akreditasi</a></li>
            <li class="nav-item"><a class="nav-link text-3" href="{{ route('status_akreditasi') }}">Status Formulir</a></li>
            <li class="nav-item"><a class="nav-link text-3" href="#">Timeline</a></li>
            <li class="nav-item"><a class="nav-link text-3" href="#">Billing & Invoice</a></li>
            <li class="nav-item"><a class="nav-link text-3" href="{{ route('user_profil') }}">My Profile</a></li>
        </ul>
    </aside>
</div>