<?php

namespace App\Http\Controllers\Front;


use App\Chat;
use App\Trivias;
use App\Encuestas;
use App\Preguntas;
use Carbon\Carbon;
use App\Registrado;
use App\Configuraciones;
use App\Helpers\FrontHelper;
use Illuminate\Http\Request;
use App\Events\MensajeChatEvent;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Front\RegistrarRequest;


class EventoBaseController extends AppBaseController
{
    protected $evento = null;
    protected $key = null;
    protected $segundosCache = 60 * 5;
    
    public function __construct()
    {
        $this->key = explode('.',\Route::currentRouteName())[0];
        $this->evento = config('constantes.eventos.'.$this->key);
        $this->evento['key'] = $this->key;
        //\Log::info([$this->key, $this->evento]);
        
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
        try {
            $data = $request->all();
            $data['evento'] = $this->key;
            try {
                $registrado = $this->obtenerRegistrado();
                $data['registrado_id'] = $registrado->id;

            } catch (\Exception $e) {}

            $data = Preguntas::create($data);
            
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }
    public function enviarEncuesta(Request $request) {
        try {
            $data = $request->all();
            $data['evento'] = $this->key;
            
            try {
                $registrado = $this->obtenerRegistrado();
                $data['registrado_id'] = $registrado->id;

            } catch (\Exception $e) {}
            $data = Encuestas::create($data);
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }
    
    public function enviarSalidaUsuario(Request $request) {
        
        try {
            $registrado = $this->obtenerRegistrado();
            
            if ($registrado) {
                $accion = $registrado->acciones()->whereNull('hasta')->orderBy('id','asc')->first();
                $accion->hasta = Carbon::now()->format('Y-m-d H:i:s');
                $accion->save();
            } else {
                \Log::info($e->getMessage());
            }                
            return $this->sendResponse([],'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }  

    protected function config($clave='*') {
        if ($clave === '*') {
            return  \Cache::remember('configuraciones_'.$this->key, Carbon::now()->addMinutes($this->segundosCache / 60), function (){
                return Configuraciones::whereEvento($this->key)->pluck('valor','clave');
            });
        } else {
            return Configuraciones::whereClave($clave)->whereEvento($this->key)->first()->valor;    
        }
    }

    protected function obtenerRegistradoExterno(Request $request) {
        
    }

    public function eventoDisponible() {
        $config = $this->config('*');
        
        $finVivo = $config['fin_vivo'] ? Carbon::parse($config['fin_vivo']) : false;
        if ($config['etapa'] === 'R' && (!$finVivo || Carbon::now()->lt($finVivo))) {
            return $this->sendResponse([],'El evento se encuentra disponible');                
        } else {
            return $this->sendError('El evento no se encuentra disponible',505);
        }
        
    }

    protected function obtenerRegistrado() {
        $registrado = null;
        try {
            $registradoGuid = FrontHelper::getCookieRegistrado($this->evento['cookie']);
            if ($registradoGuid) {
                $registrado = \Cache::remember('registrado_'.$registradoGuid, Carbon::now()->addMinutes($this->segundosCache / 60), function () use($registradoGuid){
                    return Registrado::where(\DB::raw('md5(id)'),$registradoGuid)->first();
                });                
            }
            
        } catch (\Exception $e) {}
        return $registrado;
    }

    public function enviarTrivia(Request $request) {
        try {
            //$data = $request->all();
            $data = ['pregunta' => 'S/P'];
            $data['evento'] = $this->key;
            
            try {
                $registrado = $this->obtenerRegistrado();
                $data['registrado_id'] = $registrado->id;

            } catch (\Exception $e) {}
            $data['respuesta'] = $request->all();
            \Log::info($data);
            $data = Trivias::create($data);
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }

    public function descargarCertificado() { }
    
    public function enviarMensajeChat(Request $request) {
        try {
            $data = $request->all();
            $data['evento'] = $this->key;
            try {
                $registrado = $this->obtenerRegistrado();
                $data['registrado_id'] = $registrado->id;

            } catch (\Exception $e) {}
            $data = Chat::create($data);
            \Log::info($data);

            try {
                broadcast(new MensajeChatEvent($registrado, $data))->toOthers();
            } catch (\Exception $e) {
                \Log::info($e);
            }
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }    

}
