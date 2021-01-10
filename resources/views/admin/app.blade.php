<!DOCTYPE html>
    <html class="loading" lang="en" data-textdirection="rtl">
        @include('admin.includes.header')
    <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
      <div id="app">  <!-- this dev  for vue app   -->
        @include('admin.includes.menu')
        @include('admin.includes.sidebar')
        @yield('admin.content')
     
        @include('admin.includes.footer')  
        @yield('admin.custom-js-scripts')
    </body>
</html>