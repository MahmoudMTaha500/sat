<!DOCTYPE html>
<html lang="ar" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    @include('website.includes.header')
    <body class="bg-white">
        <!-- Header -->
        @include('website.includes.menu')
        <!-- ./Header -->

        <div style="min-height: 52vh;" id="sat_app_vue">
            @yield('website.content')
        </div>

        <!-- Footer -->
        @include('website.includes.footer') 
        @yield('website.includes.page_scripts')
        @include('website.includes.alerts')
    </body>
</html>
