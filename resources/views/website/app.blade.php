<!DOCTYPE html>
<html lang="ar" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    @include('website.includes.header')
    <style>
        .select2-container--default .select2-selection--single{
            border: 1px solid #dee2e6;
            height: 35px;
            padding-top: 2px;
        }
        .select2-container--default .select2-selection--single:focus{
            outline: #F4C20D !important;
            box-shadow: 0 0 0 0.2rem rgba(244, 194, 13, 0.4) !important;
        }
        .select2-container--default .select2-search--dropdown .select2-search__field:focus{
            outline: 0
        }
    </style>
    <body class="bg-white">
        <!-- Header -->
        @include('website.includes.menu')
        <!-- ./Header -->

        <div style="min-height: 52vh;" id="sat_app_vue">
            @yield('website.content')
        </div>

        <!-- Footer -->
        @include('website.includes.footer') @yield('website.includes.page_scripts')
        @include('website.includes.alerts')
    </body>
</html>
