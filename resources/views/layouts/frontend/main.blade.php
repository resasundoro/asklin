<!doctype html>

<html>

    @include('layouts.frontend.head')

    <body data-plugin-page-transition>

        <div class="body">

            @include('layouts.frontend.header')

            @yield('content')

        </div>

        @include('layouts.frontend.footer')

        @include('layouts.frontend.js')

    </body>

</html>