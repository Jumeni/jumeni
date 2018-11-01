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
   .js('resources/js/waste_management/app.js', 'public/js/waste_management')
   .js('resources/js/delivery/app.js', 'public/js/delivery')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/waste_management/app.scss', 'public/css/waste_management')
   .sass('resources/sass/delivery/app.scss', 'public/css/delivery');


