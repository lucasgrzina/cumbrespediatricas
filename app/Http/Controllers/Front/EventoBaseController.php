<?php

namespace App\Http\Front\Controllers;


use App\Registrado;
use App\Configuraciones;

use App\Helpers\FrontHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Front\RegistrarRequest;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class EventoBaseController extends AppBaseController
{
    protected $evento = null;
    protected $key = null;
    
    public function __construct()
    {
        
        $this->key = explode('.',\Route::currentRouteName())[0];
        $this->evento = config('constantes.eventos.'.$this->key);
    }

    public function index()
    {
    }

    public function indexVue()
    {
    } 

    public function vivo (Request $request) {
    }
    
    
    public function encuestaDisponible () {
        $config = $this->config('*');
        $encuestaDispo = $config['etapa'] === 'R' && (bool)$config['encuesta'];
        if ($encuestaDispo) {
            return $this->sendResponse([],'La operación finañizó con éxito');                
        } else {
            return $this->sendError('La encuesta no se encuentra disponible por el momento.',505);
        }        
    } 

    public function registrar(RegistrarRequest $request) {
    }

    public function enviarPregunta(Request $request) {
    }
    public function enviarEncuesta(Request $request) {
    }
    
    public function enviarSalidaUsuario(Request $request) {
    }

    protected function config($clave='*') {
        if ($clave === '*') {
            return Configuraciones::whereEvento($this->key)->pluck('valor','clave');
        } else {
            return Configuraciones::whereClave($clave)->whereEvento($this->key)->first()->valor;    
        }
    }

    protected function obtenerRegistradoExterno(Request $request) {
        
    }

    public function eventoDisponible() {
        $config = $this->config('*');
        $vivoDispo = $config['etapa'] === 'R' && !(bool)$config['encuesta'];
        if ($vivoDispo) {
            return $this->sendResponse([],'La operación finañizó con éxito');                
        } else {
            return $this->sendError('La evento no se encuentra disponible por el momento.',505);
        }        
    }

    protected function obtenerRegistrado() {
        $registrado = null;
        try {

            $registradoGuid = FrontHelper::getCookieRegistrado($this->evento['cookie']);
            
            if ($registradoGuid) {
                $registrado = Registrado::where(\DB::raw('md5(id)'),$registradoGuid)->first();
            }
            
        } catch (\Exception $e) {}
        return $registrado;
    }

}
