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

mix.js('resources/assets/js/cumbre.js', 'public/js')
   .styles([
      'public/css/bootstrap.min.css',
      'public/css/styles.css',
      'public/css/utils.css',
   ], 'public/css/cumbre.css');

   mix.js('resources/assets/js/similacmama.js', 'public/js')
   .styles([
      'public/css/bootstrap.min.css',
      'public/css/styles_similacmama.css',
      'public/css/utils.css',
   ], 'public/css/similacmama.css');   

if (mix.inProduction()) {
   mix.version();
}   
