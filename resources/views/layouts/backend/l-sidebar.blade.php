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
                        <a class="side-menu__item {{Request::is('klinik') ? 'active' : ''}}" data-bs-toggle="slide" href="{{ url('klinik') }}"><i class="side-menu__icon fe fe-heart"></i><span class="side-menu__label">Klinik</span></a>
                    </li>
                @endcan

                @can('surveyor-list')
                    <li class="slide {{Request::is('surveyor') ? 'is-expanded' : ''}}">
                        <a class="side-menu__item {{Request::is('surveyor') ? 'active' : ''}}" data-bs-toggle="slide" href="{{ url('surveyor') }}"><i class="side-menu__icon fe fe-briefcase"></i><span class="side-menu__label">Surveyor</span></a>
                    </li>
                @endcan

                <li class="slide {{Request::is(['kriteria_klinik', 'fasilitas_klinik', 'm_ruang_klinik', 'm_karyawan', 'm-persyaratan-list']) ? 'is-expanded' : ''}}">
                    <a class="side-menu__item {{Request::is(['kriteria_klinik', 'fasilitas_klinik', 'm_karyawan', 'm-persyaratan-list']) ? 'active is-expanded' : ''}}" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Master Data</span><i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu {{Request::is(['kriteria_klinik', 'fasilitas_klinik', 'm_ruang_klinik', 'm_karyawan', 'm-persyaratan-list']) ? 'open' : ''}}">
                        @can('m-kriteria-klinik-list')
                            <li><a href="{{ url('kriteria_klinik') }}" class="slide-item {{Request::is('kriteria_klinik') ? 'active' : ''}}">Kriteria Klinik</a></li>
                        @endcan
                        @can('m-fasilitas-klinik-list')
                            <li><a href="{{ url('fasilitas_klinik') }}" class="slide-item {{Request::is('fasilitas_klinik') ? 'active' : ''}}">Fasilitas Klinik</a></li>
                        @endcan
                        @can('m-ruang-klinik-list')
                            <li><a href="{{ url('m_ruang_klinik') }}" class="slide-item {{Request::is('m_ruang_klinik') ? 'active' : ''}}">Ruang Klinik</a></li>
                        @endcan
                        @can('m-karyawan-list')
                            <li><a href="{{ url('m_karyawan') }}" class="slide-item {{Request::is('m_karyawan') ? 'active' : ''}}">Kategori Karyawan</a></li>
                        @endcan
                        @can('m-persyaratan-list')
                            <li><a href="{{ url('m_persyaratan') }}" class="slide-item {{Request::is('m_persyaratan') ? 'active' : ''}}">Kategori Persyaratan Izin</a></li>
                        @endcan
                    </ul>
                </li>

                <li class="slide {{Request::is(['artikel', 'kategori_artikel', 'tags_artikel']) ? 'is-expanded' : ''}}">
                    <a class="side-menu__item {{Request::is(['artikel', 'kategori_artikel', 'tags_artikel']) ? 'active is-expanded' : ''}}" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-book"></i><span class="side-menu__label">Blog</span><i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu {{Request::is(['artikel', 'kategori_artikel', 'tags_artikel']) ? 'open' : ''}}">
                        @can('artikel-list')
                            <li><a href="{{ url('artikel') }}" class="slide-item {{Request::is('artikel') ? 'active' : ''}}">Artikel</a></li>
                        @endcan
                        @can('kategori-artikel-list')
                            <li><a href="{{ url('kategori_artikel') }}" class="slide-item {{Request::is('kategori_artikel') ? 'active' : ''}}">Kategori</a></li>
                        @endcan
                        @can('tags-artikel-list')
                            <li><a href="{{ url('tags_artikel') }}" class="slide-item {{Request::is('tags_artikel') ? 'active' : ''}}">Tags</a></li>
                        @endcan
                    </ul>
                </li>

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