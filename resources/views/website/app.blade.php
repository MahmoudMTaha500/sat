<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    @include('website.includes.header')
        @include('website.includes.menu')
        <div id="sat_app_vue">
            @yield('website.content')
        </div>
        @include('website.includes.footer')
        @yield('website.includes.page_scripts')
    
</html>


