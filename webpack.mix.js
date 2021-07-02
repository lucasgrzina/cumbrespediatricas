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

/*mix.js('resources/assets/js/cumbre.js', 'public/js')
   .styles([
      'public/css/bootstrap.min.css',
      'public/css/styles.css',
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
   ], 'public/css/abbottnight.css')
   .styles([
      'public/css/bootstrap.min.css',
      'public/css/styles_abbottnight_inicio.css',
      'public/css/utils.css',
      'node_modules/pretty-checkbox/dist/pretty-checkbox.min.css',
   ], 'public/css/abbottnight_inicio.css');          

   mix.js('resources/assets/js/dermatalks.js', 'public/js')
   .styles([
      'public/css/bootstrap.min.css',
      'public/css/styles_dermatalks.css',
      'public/css/utils.css',
   ], 'public/css/dermatalks.css');

   mix.js('resources/assets/js/fundacionkaleidos.js', 'public/js')
   .styles([
      'public/css/bootstrap.min.css',
      'public/css/styles_fundacionkaleidos.css',
      'public/css/utils.css',
   ], 'public/css/fundacionkaleidos.css');     
*/
   mix.js('resources/assets/js/cigen.js', 'public/js')
   .styles([
      'public/css/bootstrap.4.5.3.min.css',
      'public/css/styles_cigen.css'
      
   ], 'public/css/cigen.css');    

   mix.js([
      'public/assets/trainsmart/libraries/jquery-1.12.4.js',
      'public/assets/trainsmart/libraries/bootstrap/js/bootstrap.bundle.min.js',
      'resources/assets/js/trainsmart.js'
   ], 'public/assets/trainsmart/js/app.min.js')
   .styles([
      'public/assets/trainsmart/libraries/bootstrap/css/bootstrap.min.css',
      'public/assets/trainsmart/css/styles.css',
      'public/assets/trainsmart/css/adic.css'      
   ], 'public/assets/trainsmart/css/styles.min.css');   
   
   mix.js([
      'public/assets/abbottrenal/bootstrap/js/bootstrap.bundle.min.js',
      'resources/assets/js/abbottrenal.js'
   ], 'public/assets/abbottrenal/js/app.min.js')
   .styles([
      'public/assets/abbottrenal/bootstrap/css/bootstrap.min.css',
      'public/assets/abbottrenal/css/styles.css'   
   ], 'public/assets/abbottrenal/css/styles.min.css');   
   
   mix.js([
      'public/assets/mentesinlimites/bootstrap/js/bootstrap.bundle.min.js',
      'resources/assets/js/mentesinlimites.js'
   ], 'public/assets/mentesinlimites/js/app.min.js')
   .styles([
      'public/assets/mentesinlimites/bootstrap/css/bootstrap.min.css',
      'public/assets/mentesinlimites/css/styles.css'   
   ], 'public/assets/mentesinlimites/css/styles.min.css');      

if (mix.inProduction()) {
   mix.version();
}   
