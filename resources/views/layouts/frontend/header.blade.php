<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0">
        <div class="header-container container-fluid px-lg-4">
            <div class="header-row">
                <div class="header-column header-column-border-right flex-grow-0">
                    <div class="header-row pe-4">
                        <div class="header-logo">
                            <a href="{{ route('home') }}">
                                <img width="100" height="48" data-sticky-width="82" data-sticky-height="40" src="/storage/{{ setting('light_logo1') }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-nav header-nav-links justify-content-center">
                            <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse header-mobile-border-top">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li><a class="dropdown-item" href="{{ route('home') }}">Beranda</a></li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" href="#">Tentang Kami</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="tentang-kami.html">Sejarah Dan Fungsi ASKI</a></li>
                                                <li><a class="dropdown-item" href="404.html">Struktur Organisasi</a></li>
                                                <li><a class="dropdown-item" href="404.html">Rencana Strategis</a></li>
                                                <li><a class="dropdown-item" href="404.html">Berita</a></li>
                                                <li><a class="dropdown-item" href="event.html">Event</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" href="#">Tentang Akreditasi</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="404.html">Instrumen Akreditasi</a></li>
                                                <li><a class="dropdown-item" href="404.html">Alur Tahapan Akreditasi</a></li>
                                                <li><a class="dropdown-item" href="404.html">Biaya Akreditasi</a></li>
                                                <li><a class="dropdown-item" href="404.html">Galery Kegiatan</a></li>
                                                <li><a class="dropdown-item" href="404.html">Jadwal Diklat</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="dropdown-item" href="karir.html">Karir</a></li>
                                        <li><a class="dropdown-item" href="kontak-kami.html">Kontak Kami</a></li>
                                        @guest
                                            <li><a class="dropdown-item" href="{{ route('register') }}">Pendaftaran Aski</a></li>
                                        @else
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" href="#">Panel {{ '('.Auth::user()->name.')' }}</a>
                                            <ul class="dropdown-menu">
                                                @if(Auth::user()->hasRole('Peserta'))
                                                    <li class="dropdown-item"><a class="dropdown-item" href="{{ route('pendaftaran') }}">User Akreditasi</a></li>
                                                    <li class="dropdown-item"><a class="dropdown-item" href="{{ route('status_akreditasi') }}">Status Formulir</a></li>
                                                    <li class="dropdown-item"><a class="dropdown-item" href="{{ route('pendaftaran') }}">Timeline</a></li>
                                                    <li class="dropdown-item"><a class="dropdown-item" href="{{ route('pendaftaran') }}">Billing & Invoice</a></li>
                                                    <li class="dropdown-item"><a class="dropdown-item" href="{{ route('user_profil') }}">My Profile</a></li>
                                                @else
                                                    <li class="dropdown-item"><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                                @endif
                                                <li class="dropdown-item">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                        @endguest
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-column header-column-border-left flex-grow-0 justify-content-center">
                    <div class="header-row ps-4 justify-content-end">
                        <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean m-0">
                            <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                        <button class="btn header-btn-collapse-nav ms-0 ms-sm-3" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>