<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::prefix('id')->group(function () {
    Route::get('/clear/{type}', 'IDController@clear');
    Route::get('/send-email', 'IDController@sendEmail');
});

Route::prefix('test')->group(function () {
    //Route::get('/sms', 'TestController@sms');
});

Route::prefix('combos')->group(function () {
    Route::get('/proveedores/{rubro_id?}', 'CombosController@proveedores')->name('combo.proveedores');
});

Route::prefix('exportar')->group(function () {
    Route::get('/', 'Admin\ExportController@export')->name('export.general');
});

/*Uploads*/
Route::prefix('uploads')->group(function () {
    Route::post('/file', 'UploadsController@storeFile')->name('uploads.store-file');
    Route::post('/image', 'UploadsController@storeImage')->name('uploads.store-image');
});

/*Admin*/
Route::prefix('/admin')->group(function () {
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\Auth\LoginController@login')->name('admin.login.submit');

    Route::get('/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('admin.reset.post');
    Route::get('/password/email', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.email');
    Route::post('/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.email.post');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

        Route::post('usuarios/change-enabled', 'Admin\UserController@changeEnabled')->name('usuarios.change-enabled');
        Route::post('usuarios/filter', 'Admin\UserController@filter')->name('usuarios.filter');
        Route::get('usuarios/exportar/{type}', 'Admin\UserController@export')->name('usuarios.export');
        Route::put('usuarios/{id}/guardar-permisos', 'Admin\UserController@guardarPermisos')->name('usuarios.guardar-permisos');
        Route::get('usuarios/{id}/editar-permisos', 'Admin\UserController@editarPermisos')->name('usuarios.editar-permisos');

        Route::resource('usuarios', 'Admin\UserController');

        Route::post('roles/filter', 'Admin\RoleController@filter')->name('roles.filter');
        Route::resource('roles', 'Admin\RoleController');

        Route::post('registrados/filter', 'Admin\RegistradosController@filter')->name('registrados.filter');
        Route::get('registrados/exportar/{type}', 'Admin\RegistradosController@export')->name('registrados.export');        
        Route::resource('registrados', 'Admin\RegistradosController');

        Route::post('preguntas/filter', 'Admin\PreguntasController@filter')->name('preguntas.filter');
        Route::get('preguntas/exportar/{type}', 'Admin\PreguntasController@export')->name('preguntas.export');        
        Route::resource('preguntas', 'Admin\PreguntasController');

        Route::post('encuestas/filter', 'Admin\EncuestasController@filter')->name('encuestas.filter');
        Route::get('encuestas/exportar/{type}', 'Admin\EncuestasController@export')->name('encuestas.export');        
        Route::resource('encuestas', 'Admin\EncuestasController');

        Route::get('clear-cache', function () {
            $exitCode = Artisan::call('cache:clear');
            echo 'done';// return what you want
        })->name('clear-cache');

        Route::get('/error/{code}', 'Admin\ErrorController@index')->name('admin.error');

        
        Route::get('/exportar', 'Admin\DashboardController@exportar')->name('admin.exportar');
        Route::get('/previsualizar', 'Admin\DashboardController@previsualizar')->name('admin.previsualizar');
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.home');
        Route::get('/estadisticas', 'Admin\EstadisticasController@index')->name('admin.estadisticas');
        Route::get('/estadisticas/analizar', 'Admin\EstadisticasController@analizar')->name('admin.estadisticas.analizar');
        Route::post('/dashboard/save', 'Admin\DashboardController@guardar')->name('admin.home.guardar');
    });
});

Route::group(['prefix' => '/danoneday'], function() {
    //Route::get('/registro', 'Front\HomeController@indexVue')->name('registro');
    Route::post('/registrar', 'Front\HomeController@registrar')->name('registrar');

    Route::get('/vivo', 'Front\HomeController@vivo')->name('vivo');
    Route::group(['middleware' => 'registrado'], function() {
        
        Route::post('/enviar-pregunta', 'Front\HomeController@enviarPregunta')->name('enviar-pregunta');
        //Route::get('/encuesta', 'Front\HomeController@encuesta')->name('encuesta');        
        Route::get('/encuesta-disponible', 'Front\HomeController@encuestaDisponible')->name('encuesta-disponible');        
        Route::post('/enviar-encuesta', 'Front\HomeController@enviarEncuesta')->name('enviar-encuesta');
        Route::post('/enviar-salida-usuario/{id}', 'Front\HomeController@enviarSalidaUsuario')->name('enviar-salida-usuario');
    });
    
    Route::prefix('ws')->group(function () {
        Route::get('/evento-disponible', 'Front\HomeController@eventoDisponible');
    });    
    Route::get('/', 'Front\HomeController@index')->name('home');

});

/*Route::group(['prefix' => '/test/cumbrepediatrica'], function() {
    Route::post('/registrar', 'Front\HomeTestController@registrar')->name('test.registrar');

    Route::group(['middleware' => 'registrado:test.home'], function() {
        Route::get('/vivo', 'Front\HomeTestController@vivo')->name('test.vivo');
        Route::post('/enviar-pregunta', 'Front\HomeTestController@enviarPregunta')->name('test.enviar-pregunta');
        //Route::get('/encuesta', 'Front\HomeController@encuesta')->name('encuesta');        
        Route::get('/encuesta-disponible', 'Front\HomeTestController@encuestaDisponible')->name('test.encuesta-disponible');        
        Route::post('/enviar-encuesta', 'Front\HomeTestController@enviarEncuesta')->name('test.enviar-encuesta');
    });
    Route::get('/', 'Front\HomeTestController@index')->name('test.home');
}); */

Route::group(['prefix' => 'similacmama'], function() {
    Route::post('/registrar', 'Front\HomeSimilaCMamaController@registrar')->name('similacmama.registrar');

    Route::group(['middleware' => 'registrado'], function() {
        Route::get('/vivo', 'Front\HomeSimilaCMamaController@vivo')->name('similacmama.vivo');
        Route::post('/enviar-pregunta', 'Front\HomeSimilaCMamaController@enviarPregunta')->name('similacmama.enviar-pregunta');
        //Route::get('/encuesta', 'Front\HomeController@encuesta')->name('encuesta');        
        Route::get('/encuesta-disponible', 'Front\HomeSimilaCMamaController@encuestaDisponible')->name('similacmama.encuesta-disponible');        
        Route::post('/enviar-encuesta', 'Front\HomeSimilaCMamaController@enviarEncuesta')->name('similacmama.enviar-encuesta');
    });
    Route::get('/', 'Front\HomeSimilaCMamaController@index')->name('similacmama.home');
}); 

Route::get('/log/obtener', function () {
    if (env('APP_ENV', 'local') === 'local') {
        $pathToFile = storage_path() . '\logs\laravel.log';
    } else {
        $pathToFile = storage_path() . '/logs/laravel.log';
    }

    return response()->download($pathToFile, 'laravel.log');
});
Route::get('/log/borrar', function () {
    if (env('APP_ENV', 'local') === 'local') {
        $pathToFile = storage_path() . '\logs\laravel.log';
    } else {
        $pathToFile = storage_path() . '/logs/laravel.log';
    }

    unlink($pathToFile);
    return 'Listo.';
});