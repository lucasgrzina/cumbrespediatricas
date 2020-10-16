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
   
   mix.js('resources/assets/js/danoneday.js', 'public/js')
   .styles([
      'public/css/bootstrap.min.css',
      'public/css/styles_danoneday.css',
      'public/css/utils.css',
   ], 'public/css/danoneday.css');     

   mix.js('resources/assets/js/forosas.js', 'public/js')
   .styles([
      'public/css/bootstrap.min.css',
      'public/css/styles_forosas.css',
      'public/css/utils.css',
   ], 'public/css/forosas.css');       
   
   mix.js('resources/assets/js/abbottnight.js', 'public/js')
   .styles([
      'public/css/bootstrap.min.css',
      'public/css/styles_abbottnight.css',
      'public/css/utils.css',
   ], 'public/css/abbottnight.css');          

if (mix.inProduction()) {
   mix.version();
}   
