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

 

 mix.js('resources/js/app.js', 'public/js')
 .sass('resources/sass/app.scss', 'public/css');


// website files

var jsFiles = [
    'resources/js/website-js.js',
    'public/admin/app-assets/vendors/js/vendors.min.js',
    'public/website/js/jquery-3.5.1.slim.min.js',
    'public/website/js/popper.min.js',
    'public/website/js/bootstrap.min.js',
    'public/website/js/plugins/owl.carousel.min.js',
    'public/website/js/plugins/starrr.js',
    'public/website/js/bootstrap-select.min.js',
    'public/website/js/plugins/uploadImg.js',
    'public/website/js/shared/select-picker.call.js',
    'public/website/js/jquery-1.12.4.js',
    'public/website/js/jquery-ui.js',
    'public/website/js/custom.js',
];

var jsHome = [
    'resources/js/website-js.js',
    'public/website/js/jquery-3.5.1.slim.min.js',
    'public/website/js/popper.min.js',
    'public/website/js/bootstrap.min.js',
    'public/website/js/plugins/owl.carousel.min.js',
    'public/website/js/plugins/starrr.js',
    'public/website/js/custom.js',
];


var cssCritical = [
    'public/website/css/bootstrap.min.css',
    'public/website/css/owl.carousel.min.css',
    'public/website/css/theme.css',
    'public/website/css/pages/index.css',
];
var cssNonCritical = [
    'public/website/css/fontawesome.css',
    'public/website/css/pages/institute.css',
    'public/website/css/jquery-ui.css',
    'public/website/css/bootstrap-select.min.css',
    'public/website/css/starrr.css',
];

mix.js(jsFiles, 'public/website/js/global.js');
mix.js(jsHome, 'public/website/js/home-scripts.js');
mix.styles(cssNonCritical, 'public/website/css/global.css');
mix.styles(cssCritical, 'public/website/css/main.css');
