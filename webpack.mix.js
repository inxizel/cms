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

mix.js('resources/js/app.js', 'public/build/js')
   .sass('resources/sass/app.scss', 'public/build/css');

mix.styles('resources/assets/css/global.css', 'public/build/css/global.css');
mix.styles('resources/assets/css/custom.css', 'public/build/css/custom.css');

mix.js('resources/assets/js/global.js', 'public/build/js/global.js');
mix.js('resources/assets/js/ResizeSensor.js', 'public/build/js/ResizeSensor.js');
mix.js('resources/assets/js/dashboard.js', 'public/build/js/dashboard.js');
