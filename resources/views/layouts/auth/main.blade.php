<!doctype html>

<html lang="en" dir="ltr">

    @include('layouts.auth.head')

    <body class="app sidebar-mini ltr">

        <!-- BACKGROUND-IMAGE -->
        <div class="login-img">

            <!-- GLOABAL LOADER -->
            <div id="global-loader">
                <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
            </div>
            <!-- /GLOABAL LOADER -->

            <!-- PAGE -->
            <div class="page">
                <div class="">

                    <!-- CONTAINER OPEN -->
                    <div class="col col-login mx-auto mt-7">
                        <div class="text-center">
                            <img src="storage/{{ setting('desktop_logo') }}" class="header-brand-img" alt="">
                        </div>
                    </div>

                    @yield('content')
                    <!-- CONTAINER CLOSED -->

                </div>
            </div>
            <!-- End PAGE -->

        </div>

    </body>
    <!-- BACKGROUND-IMAGE CLOSED -->

    @include('layouts.auth.js')

</html>