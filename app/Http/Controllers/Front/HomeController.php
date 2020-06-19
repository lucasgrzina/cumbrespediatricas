<?php

namespace App\Http\Controllers\Front;


use App\Encuestas;
use App\Preguntas;
use App\Registrado;
use App\Configuraciones;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Front\RegistrarRequest;

class HomeController extends AppBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    public function index()
    {
        return view('front.home');
    }

    public function indexVue()
    {
        if (\Cookie::get('registrado',null) !== null) {
            return redirect()->route('vivo');
        }

        $data = [
            'props' => [
                'urlRegistrar' => route('registrar')
            ]
        ];
        return view('front.home-vue', $data);
    } 

    public function vivo () {
        $encuestaDispo = (int)$this->config('encuesta');
        if ($encuestaDispo) {
            return redirect()->route('encuesta');
        }
        $data = [
            'props' => [
                'urlEnviar' => route('enviar-pregunta'),
                'urlEncuesta' => route('encuesta'),
                'urlEncuestaDisponible' => route('encuesta-disponible'),
            ]
        ];
        return view('front.vivo', $data);
    }
    
    public function encuesta () {
        $encuestaDispo = (int)$this->config('encuesta');
        if (!$encuestaDispo) {
            return redirect()->route('vivo');
        }        
        $data = [
            'props' => [
                'urlEnviar' => route('enviar-encuesta')
            ]
        ];
        return view('front.encuesta', $data);
    } 
    
    public function encuestaDisponible () {
        $encuestaDispo = (int)$this->config('encuesta');
        if ($encuestaDispo) {
            return $this->sendResponse([],'La operación finañizó con éxito');                
        } else {
            return $this->sendError('La encuesta no se encuentra disponible por el momento.',505);
        }
    } 

    public function registrar(RegistrarRequest $request) {
        try {
            $data = Registrado::create($request->all());
            \Cookie::queue(\Cookie::make('registrado', md5($data->id), 518400));
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }

    public function enviarPregunta(Request $request) {
        try {
            $registradoGuid = \Cookie::get('registrado',null);
            $data = $request->all();
            if ($registradoGuid) {
                try {
                    $registrado = Registrado::where(\DB::raw('md5(id)'),$registradoGuid)->first();
                
                    $data['registrado_id'] = $registrado->id;
    
                } catch (\Exception $e) {}
                
            }
            $data = Preguntas::create($data);
            
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }
    public function enviarEncuesta(Request $request) {
        try {
            $registradoGuid = \Cookie::get('registrado',null);
            $data = $request->all();
            if ($registradoGuid) {
                try {
                    $registrado = Registrado::where(\DB::raw('md5(id)'),$registradoGuid)->first();
                
                    $data['registrado_id'] = $registrado->id;
    
                } catch (\Exception $e) {}
            }

            $data = Encuestas::create($data);
            //\Log::info($data);
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }
    
    protected function config($clave) {
        return Configuraciones::whereClave($clave)->first()->valor;
    }
}
