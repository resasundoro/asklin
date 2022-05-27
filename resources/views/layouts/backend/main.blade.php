<!doctype html>

<html lang="en" dir="ltr">

    @include('layouts.backend.head')

    <body class="app sidebar-mini ltr">

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

                @include('layouts.backend.header')

                @include('layouts.backend.l-sidebar')

                <div id="success">
                    {{ session()->get('success') }}
                </div>

                <div id="error">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>

                <!--app-content open-->
                <div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">@yield('breadcrumb')</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb')</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->

                            @yield('content')

                        </div>

                    </div>
                </div>

                @include('layouts.backend.r-sidebar')

            </div>

        </div>

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        @include('layouts.backend.js')

    </body>

</html>