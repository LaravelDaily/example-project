let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
    // example css files
   .styles('public/css/exampleCssFiles/adminFix.css', 'public/css/adminFix.css')
   .styles('public/css/exampleCssFiles/awesomplete.css', 'public/css/awesomplete.css');

// in views use {{ mix('path/to/file') }} instead of {{ asset('path/to/file') }}
if (mix.inProduction()) {
  mix.version();
}
