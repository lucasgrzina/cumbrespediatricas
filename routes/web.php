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
    Route::get('/sms', 'TestController@sms');
    Route::get('/send-email', 'TestController@sendEmail');
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

        Route::get('configuraciones/agregar-item/{evento}/{clave}/{valor}', 'Admin\ConfiguracionesController@agregarItem')->name('configuraciones.export');        
        Route::post('configuraciones/filter', 'Admin\ConfiguracionesController@filter')->name('configuraciones.filter');
        Route::get('configuraciones/exportar/{type}', 'Admin\ConfiguracionesController@export')->name('configuraciones.export');        
        Route::resource('configuraciones', 'Admin\ConfiguracionesController');

        Route::get('trivias/edit/{id}/{lang}', 'Admin\TriviasController@editLang')->name('trivias.edit-lang');            
        Route::post('trivias/change-enabled', 'Admin\TriviasController@changeEnabled')->name('trivias.change-enabled');
        Route::post('trivias/filter', 'Admin\TriviasController@filter')->name('trivias.filter');
        Route::resource('trivias', 'Admin\TriviasController');

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

/*$key = 'danoneday';
$appRoutes = function() use ($key){
    $data = config('constantes.eventos.danoneday',[]); 
    Route::post('/registrar', $data['controller'].'@registrar')->name('registrar');

    Route::group(['middleware' => 'registrado:'.$key], function() use($data){
        Route::get('/vivo', $data['controller'].'@vivo')->name('vivo');
        Route::post('/enviar-pregunta', $data['controller'].'@enviarPregunta')->name('enviar-pregunta');
        Route::get('/encuesta-disponible', $data['controller'].'@encuestaDisponible')->name('encuesta-disponible');        
        Route::post('/enviar-encuesta', $data['controller'].'@enviarEncuesta')->name('enviar-encuesta');
        Route::get('/evento-disponible', $data['controller'].'@eventoDisponible')->name('evento-disponible');        
        Route::any('/enviar-salida-usuario', $data['controller'].'@enviarSalidaUsuario')->name('enviar-salida-usuario');
    });
    Route::get('/', $data['controller'].'@index')->name('home');
};
Route::namespace('Front')->name($key.'.')->domain('danoneday.com.ar')->group($appRoutes);
Route::namespace('Front')->name($key.'.')->domain('www.danoneday.com.ar')->group($appRoutes);


$keyForoSas = 'forosas';
$appRoutesForoSas = function() use ($keyForoSas){
    $data = config('constantes.eventos.forosas',[]); 
    Route::get('/', $data['controller'].'@index')->name('home');
    Route::get('/registro', $data['controller'].'@registro')->name('registro');
    Route::post('/registrar', $data['controller'].'@registrar')->name('registrar');
    Route::post('/login', $data['controller'].'@login')->name('login');
    Route::post('/enviar-pregunta', $data['controller'].'@enviarPregunta')->name('enviar-pregunta');
};
if (env('APP_ENV','production') === 'local') {
    Route::namespace('Front')->name($keyForoSas.'.')->domain('dev.foro-sas.com.ar')->group($appRoutesForoSas);
} else {
    Route::namespace('Front')->name($keyForoSas.'.')->domain('www.foro-sas.com.ar')->group($appRoutesForoSas);
}
*/
$keyCigen = 'cigen';
$appRoutesCigen = function() use ($keyCigen){
    $data = config('constantes.eventos.cigen',[]); 
    Route::get('/', $data['controller'].'@index')->name('home');
    Route::get('/vivo', $data['controller'].'@vivo')->name('vivo');
    Route::get('/agenda-viernes', $data['controller'].'@agendaViernes')->name('agendaViernes');
    Route::get('/agenda-sabado', $data['controller'].'@agendaSabado')->name('agendaSabado');
    Route::get('/speakers-nacionales', $data['controller'].'@speakersNacionales')->name('speakersNacionales');
    Route::get('/speakers-internacionales', $data['controller'].'@speakersInternacionales')->name('speakersInternacionales');
    Route::get('/eventos-previos', $data['controller'].'@eventosPrevios')->name('eventosPrevios');
    Route::get('/quienes-somos', $data['controller'].'@quienesSomos')->name('quienesSomos');
    Route::get('/sponsors', $data['controller'].'@sponsors')->name('sponsors');
    Route::get('/registro', $data['controller'].'@registro')->name('registro');
    Route::post('/registrar', $data['controller'].'@registrar')->name('registrar');
    Route::get('/login', $data['controller'].'@login')->name('login');
    Route::post('/login', $data['controller'].'@loggear')->name('loggear');
    Route::post('/enviar-pregunta', $data['controller'].'@enviarPregunta')->name('enviar-pregunta');
    Route::get('/encuesta-disponible', $data['controller'].'@encuestaDisponible')->name('encuesta-disponible');        
    Route::post('/enviar-encuesta', $data['controller'].'@enviarEncuesta')->name('enviar-encuesta');
    Route::get('/evento-disponible', $data['controller'].'@eventoDisponible')->name('evento-disponible');        
    Route::any('/enviar-salida-usuario', $data['controller'].'@enviarSalidaUsuario')->name('enviar-salida-usuario');
    Route::get('/descargar-certificado', $data['controller'].'@descargarCertificado')->name('descargar-certificado');        
    Route::post('/recuperar', $data['controller'].'@recuperar')->name('recuperar');
    Route::get('/registrado', $data['controller'].'@registrado')->name('registrado');
};
if (env('APP_ENV','production') === 'local') {
    Route::namespace('Front')->name($keyCigen.'.')->domain('dev.cigen.com.ar')->group($appRoutesCigen);
} else {
    Route::namespace('Front')->name($keyCigen.'.')->domain('www.cigen.com.ar')->group($appRoutesCigen);
}
/*
$keyNasa = 'nasa1905';
$appRoutesNasa = function() use ($keyNasa){
    $data = config('constantes.eventos.nasa1905',[]); 
    Route::get('/', $data['controller'].'@index')->name('home');
    Route::post('/enviar-pregunta', $data['controller'].'@enviarPregunta')->name('enviar-pregunta');
    Route::get('/encuesta-disponible', $data['controller'].'@encuestaDisponible')->name('encuesta-disponible');        
    Route::post('/enviar-encuesta', $data['controller'].'@enviarEncuesta')->name('enviar-encuesta');
    Route::get('/evento-disponible', $data['controller'].'@eventoDisponible')->name('evento-disponible');        
    Route::any('/enviar-salida-usuario', $data['controller'].'@enviarSalidaUsuario')->name('enviar-salida-usuario');
    Route::get('/registrado', $data['controller'].'@registrado')->name('registrado');
};
if (env('APP_ENV','production') === 'local') {
    Route::namespace('Front')->name($keyNasa.'.')->domain('dev.transmisioncumbrenasa.com')->group($appRoutesNasa);
} else {
    Route::namespace('Front')->name($keyNasa.'.')->domain('www.transmisioncumbrenasa.com')->group($appRoutesNasa);
}
/*
$keyTrainSmart = 'trainsmart';
$appRoutesTrainSmart = function() use ($keyTrainSmart){
    $data = config('constantes.eventos.trainsmart',[]); 
    Route::get('/', $data['controller'].'@index')->name('home');
    Route::get('/home-prueba', $data['controller'].'@homePrueba')->name('home-prueba');
    Route::get('/agenda', $data['controller'].'@agenda')->name('agenda');
    Route::get('/vivo', $data['controller'].'@vivo')->name('vivo');
    Route::get('/registro', $data['controller'].'@registro')->name('registro');
    Route::post('/registrar', $data['controller'].'@registrar')->name('registrar');
    Route::get('/gracias', $data['controller'].'@gracias')->name('gracias');
    Route::post('/enviar-pregunta', $data['controller'].'@enviarPregunta')->name('enviar-pregunta');
    Route::get('/encuesta-disponible', $data['controller'].'@encuestaDisponible')->name('encuesta-disponible');        
    Route::post('/enviar-encuesta', $data['controller'].'@enviarEncuesta')->name('enviar-encuesta');
    Route::get('/evento-disponible', $data['controller'].'@eventoDisponible')->name('evento-disponible');        
    Route::any('/enviar-salida-usuario', $data['controller'].'@enviarSalidaUsuario')->name('enviar-salida-usuario');
    Route::get('/descargar-certificado', $data['controller'].'@descargarCertificado')->name('descargar-certificado');        
    Route::post('/recuperar', $data['controller'].'@recuperar')->name('recuperar');
    Route::get('/registrado', $data['controller'].'@registrado')->name('registrado');
};
if (env('APP_ENV','production') === 'local') {
    Route::namespace('Front')->name($keyTrainSmart.'.')->domain('dev.trainsmart30.com')->group($appRoutesTrainSmart);
} else {
    Route::namespace('Front')->name($keyTrainSmart.'.')->domain('www.trainsmart30.com')->group($appRoutesTrainSmart);
}
*/
/*$keyAbbottNight = 'abbottnight';
$appRoutesAbbottNight = function() use ($keyAbbottNight){
    $data = config('constantes.eventos.abbottnight',[]); 
    Route::get('/', $data['controller'].'@index')->name('home');
    Route::get('/registro', $data['controller'].'@registro')->name('registro');
    Route::post('/registrar', $data['controller'].'@registrar')->name('registrar');
    Route::post('/login', $data['controller'].'@login')->name('login');
    Route::post('/enviar-pregunta', $data['controller'].'@enviarPregunta')->name('enviar-pregunta');
};
if (env('APP_ENV','production') === 'local') {
    Route::namespace('Front')->name($keyAbbottNight.'.')->domain('dev.abbottnight.com.ar')->group($appRoutesAbbottNight);
} else {
    //Route::namespace('Front')->name($keyAbbottNight.'.')->domain('www.foro-sas.com.ar')->group($appRoutesForoSas);
}*/

$keyNasa = 'porunamentesinlimites';
$appRoutesNasa = function() use ($keyNasa){
    $data = config('constantes.eventos.porunamentesinlimites',[]); 
    Route::get('/', $data['controller'].'@index')->name('home');
    Route::get('/registro', $data['controller'].'@registro')->name('registro');
    Route::post('/registrar', $data['controller'].'@registrar')->name('registrar');
    Route::get('/vivo', $data['controller'].'@vivo')->name('vivo');
    Route::post('/enviar-pregunta', $data['controller'].'@enviarPregunta')->name('enviar-pregunta');
    Route::get('/encuesta-disponible', $data['controller'].'@encuestaDisponible')->name('encuesta-disponible');        
    Route::post('/enviar-encuesta', $data['controller'].'@enviarEncuesta')->name('enviar-encuesta');
    Route::get('/evento-disponible', $data['controller'].'@eventoDisponible')->name('evento-disponible');        
    Route::any('/enviar-salida-usuario', $data['controller'].'@enviarSalidaUsuario')->name('enviar-salida-usuario');
    Route::get('/registrado', $data['controller'].'@registrado')->name('registrado');
    Route::get('/descargar-certificado', $data['controller'].'@descargarCertificado')->name('descargar-certificado');        
};
if (env('APP_ENV','production') === 'local') {
    Route::namespace('Front')->name($keyNasa.'.')->domain('dev.porunamentesinlimites.com')->group($appRoutesNasa);
} else {
    Route::namespace('Front')->name($keyNasa.'.')->domain('www.porunamentesinlimites.com')->group($appRoutesNasa);
}

$eventos = config('constantes.eventos',[]);
foreach ($eventos as $key => $data) {
    $key = strtolower($key);
    if ($data['activo'] && !config('constantes.eventos.'.$key.'.evitarRoute',false)) {
        Route::namespace('Front')->name($key.'.')->prefix($data['prefix'])->group(function() use($key,$data){
            Route::post('/registrar', $data['controller'].'@registrar')->name('registrar');
        
            Route::group(['middleware' => 'registrado:'.$key], function() use($data){
                Route::get('/vivo', $data['controller'].'@vivo')->name('vivo');
                Route::post('/enviar-pregunta', $data['controller'].'@enviarPregunta')->name('enviar-pregunta');
                Route::get('/encuesta-disponible', $data['controller'].'@encuestaDisponible')->name('encuesta-disponible');        
                Route::post('/enviar-encuesta', $data['controller'].'@enviarEncuesta')->name('enviar-encuesta');
                Route::get('/evento-disponible', $data['controller'].'@eventoDisponible')->name('evento-disponible');        
                Route::any('/enviar-salida-usuario', $data['controller'].'@enviarSalidaUsuario')->name('enviar-salida-usuario');
                Route::post('/enviar-trivia', $data['controller'].'@enviarTrivia')->name('enviar-trivia');
                Route::get('/descargar-certificado', $data['controller'].'@descargarCertificado')->name('descargar-certificado');        
                Route::post('/enviar-mensaje-chat', $data['controller'].'@enviarMensajeChat')->name('enviar-mensaje-chat');
            });
            Route::get('/registro', $data['controller'].'@registro')->name('registro');
            Route::get('/aviso-privacidad', $data['controller'].'@avisoPrivacidad')->name('avisoPrivacidad');
            Route::get('/', $data['controller'].'@index')->name('home');
        }); 
    
    }
}

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

