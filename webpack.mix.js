const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

 var jsFiles = [
    'resources/js/app.js',
    'public/admin/app-assets/vendors/js/vendors.min.js',
    'public/website/js/jquery-3.5.1.slim.min.js',
    'public/website/js/popper.min.js',
    'public/website/js/bootstrap.min.js',
    'public/website/js/plugins/owl.carousel.min.js',
    'public/website/js/plugins/starrr.js',
    'public/website/js/bootstrap-select.min.js',
    'public/website/js/plugins/uploadImg.js',
    'public/website/js/shared/starr.call.js',
    'public/website/js/shared/owl.call.js',
    'public/website/js/shared/select-picker.call.js',
    'public/website/js/shared/sidemenu.js',
    'public/website/js/jquery-1.12.4.js',
    'public/website/js/jquery-ui.js',
    'public/website/js/shared/support.js',
    'public/website/js/custom.js',
];

var cssFiles = [
    'public/website/css/fontawesome.css',
    'public/website/css/bootstrap.min.css',
    'public/website/css/owl.carousel.min.css',
    'public/website/css/bootstrap-select.min.css',
    'public/website/css/starrr.css',
    'public/website/css/theme.css',
    'public/website/css/pages/institute.css',
    'public/website/css/jquery-ui.css',
    'public/website/css/pages/index.css',
];

mix.js(jsFiles, 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles(cssFiles, 'public/website/css/global.css');
