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
        Route::post('/dashboard/save', 'Admin\DashboardController@guardar')->name('admin.home.guardar');
    });
});

Route::group(['prefix' => '/'], function() {
    Route::get('/registro', 'Front\HomeController@indexVue')->name('registro');
    Route::post('/registrar', 'Front\HomeController@registrar')->name('registrar');

    //Route::group(['middleware' => 'registrado'], function() {
        Route::get('/vivo', 'Front\HomeController@vivo')->name('vivo');
        Route::post('/enviar-pregunta', 'Front\HomeController@enviarPregunta')->name('enviar-pregunta');
        Route::get('/encuesta', 'Front\HomeController@encuesta')->name('encuesta');        
        Route::get('/encuesta-disponible', 'Front\HomeController@encuestaDisponible')->name('encuesta-disponible');        
        Route::post('/enviar-encuesta', 'Front\HomeController@enviarEncuesta')->name('enviar-encuesta');
    //});
    Route::get('/', 'Front\HomeController@index')->name('home');
});