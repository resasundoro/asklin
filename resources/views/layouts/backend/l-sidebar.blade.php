<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard') }}">
                <img src="/storage/{{ setting('desktop_logo') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="/storage/{{ setting('toggle_logo') }}" class="header-brand-img toggle-logo" alt="logo">
                <img src="/storage/{{ setting('light_logo') }}" class="header-brand-img light-logo" alt="logo">
                <img src="/storage/{{ setting('light_logo1') }}" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg>
            </div>
            <ul class="side-menu">
                <li class="slide {{Request::is('dashboard') ? 'is-expanded' : ''}}">
                    <a class="side-menu__item {{Request::is('dashboard') ? 'active' : ''}}" data-bs-toggle="slide" href="{{ route('dashboard') }}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>

                @can('klinik-list')
                    <li class="slide {{Request::is('klinik') ? 'is-expanded' : ''}}">
                        <a class="side-menu__item {{Request::is('klinik') ? 'active' : ''}}" data-bs-toggle="slide" href="{{ url('klinik') }}"><i class="side-menu__icon fe fe-octagon"></i><span class="side-menu__label">Klinik</span></a>
                    </li>
                @endcan

                @can('karyawan-list')
                    <li class="slide {{Request::is('karyawan') ? 'is-expanded' : ''}}">
                        <a class="side-menu__item {{Request::is('karyawan') ? 'active' : ''}}" data-bs-toggle="slide" href="{{ url('karyawan') }}"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">SDM</span></a>
                    </li>
                @endcan

                @can('rumah-sakit-list')
                    <li class="slide {{Request::is('rumah_sakit') ? 'is-expanded' : ''}}">
                        <a class="side-menu__item {{Request::is('rumah_sakit') ? 'active' : ''}}" data-bs-toggle="slide" href="{{ url('rumah_sakit') }}"><i class="side-menu__icon fe fe-heart"></i><span class="side-menu__label">Rumah Sakit Terdekat</span></a>
                    </li>
                @endcan

                @can('asuransi-list')
                    <li class="slide {{Request::is('asuransi') ? 'is-expanded' : ''}}">
                        <a class="side-menu__item {{Request::is('asuransi') ? 'active' : ''}}" data-bs-toggle="slide" href="{{ url('asuransi') }}"><i class="side-menu__icon fe fe-crosshair"></i><span class="side-menu__label">Provider Asuransi</span></a>
                    </li>
                @endcan

                @can(['paket-list', 'm-kriteria-klinik-list', 'm-fasilitas-klinik-list', 'm-layanan-klinik-list', 'm-karyawan-list'])
                    <li class="slide {{Request::is(['paket', 'kriteria_klinik', 'fasilitas_klinik', 'layanan_klinik', 'm_karyawan']) ? 'is-expanded' : ''}}">
                        <a class="side-menu__item {{Request::is(['paket', 'kriteria_klinik', 'fasilitas_klinik', 'layanan_klinik', 'm_karyawan']) ? 'active is-expanded' : ''}}" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Master Data</span><i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu {{Request::is(['paket', 'kriteria_klinik', 'fasilitas_klinik', 'layanan_klinik', 'm_karyawan']) ? 'open' : ''}}">
                            <li><a href="{{ url('paket') }}" class="slide-item {{Request::is('paket') ? 'active' : ''}}">Harga Paket</a></li>
                            <li><a href="{{ url('kriteria_klinik') }}" class="slide-item {{Request::is('kriteria_klinik') ? 'active' : ''}}">Kriteria Klinik</a></li>
                            <li><a href="{{ url('fasilitas_klinik') }}" class="slide-item {{Request::is('fasilitas_klinik') ? 'active' : ''}}">Fasilitas Klinik</a></li>
                            <li><a href="{{ url('layanan_klinik') }}" class="slide-item {{Request::is('layanan_klinik') ? 'active' : ''}}">Layanan Klinik</a></li>
                            <li><a href="{{ url('m_karyawan') }}" class="slide-item {{Request::is('m_karyawan') ? 'active' : ''}}">Kategori Karyawan</a></li>
                        </ul>
                    </li>
                @endcan

                @can(['user-list', 'role-list'])
                    <li class="sub-category">
                        <h3>Konfigurasi</h3>
                    </li>
                    <li class="slide {{Request::is(['users', 'roles']) ? 'is-expanded' : ''}}">
                        <a class="side-menu__item {{Request::is('users') || Request::is('roles') ? 'active is-expanded' : ''}}" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">User & Role</span><i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu {{Request::is(['users', 'roles']) ? 'open' : ''}}">
                            <li><a href="{{ url('users') }}" class="slide-item {{Request::is('users') ? 'active' : ''}}">Users</a></li>
                            <li><a href="{{ url('roles') }}" class="slide-item {{Request::is('roles') ? 'active' : ''}}">Roles</a></li>
                        </ul>
                    </li>
                @endcan

                @can('settings')
                    <li class="slide {{Request::is('settings') ? 'is-expanded' : ''}}">
                        <a class="side-menu__item {{Request::is('settings') ? 'active' : ''}}" href="{{ url('settings') }}">
                            <i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Konfigurasi</span>
                        </a>
                    </li>
                @endcan
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
        </div>
    </div>
</div>