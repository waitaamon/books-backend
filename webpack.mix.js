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
    .scripts([
        'public/vendors/web/main.js'
    ], 'public/js/main.js')
    .scripts([
        'public/vendors/admin/js/slick.min.js',
        'public/vendors/admin/js/select2.min.js',
        'public/vendors/admin/js/wow.min.js',
        'public/vendors/admin/js/perfect-scrollbar.min.js',
        'public/vendors/admin/js/main.js'
    ], 'public/js/admin.js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles(['public/vendors/web/style.css'], 'public/css/main.css')
    .styles([
        'public/vendors/admin/css/animate.css',
        'public/vendors/admin/css/hamburgers.min.css',
        'public/vendors/admin/css/slick.css',
        'public/vendors/admin/css/select2.min.css',
        'public/vendors/admin/css/perfect-scrollbar.css',
        'public/vendors/admin/css/theme.css'
    ], 'public/css/admin.css');
