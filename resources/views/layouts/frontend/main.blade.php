<!doctype html>

<html>

    @include('layouts.frontend.head')

    <body data-plugin-page-transition>

        <div class="body">

            @include('layouts.frontend.header')

            @include('layouts.frontend.slider')

            @yield('content')

        </div>

        @include('layouts.frontend.footer')

        @include('layouts.frontend.js')

    </body>

</html>