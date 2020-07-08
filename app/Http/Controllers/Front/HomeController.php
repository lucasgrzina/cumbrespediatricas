<?php

namespace App\Http\Controllers\Front;


use App\Encuestas;
use App\Preguntas;
use App\Registrado;
use App\Configuraciones;
use App\Helpers\FrontHelper;
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
        $conf = $this->config('*');
        if ($conf['etapa'] !== 'R') {
            $data = [
                'config' => $conf
            ];
            return view('front.home',['data' => $data]);
        }
        return $this->indexVue();
        
    }

    public function indexVue()
    {
        //return redirect()->route('home');
        if (FrontHelper::getCookieRegistrado()) {
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
        $conf = $this->config('*');
        if ($conf['etapa'] !== 'R') {
            return redirect()->route('home');
        }
        $data = [
            'props' => [
                'urlEnviar' => route('enviar-pregunta'),
                'urlEncuesta' => '',
                'urlEncuestaDisponible' => route('encuesta-disponible'),
                'urlEnviarEncuesta' => route('enviar-encuesta')
            ]
        ];
        return view('front.vivo', $data);
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
        try {
            $data = Registrado::create($request->all());
            FrontHelper::setCookieRegistrado($data->id);
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }

    public function enviarPregunta(Request $request) {
        try {
            $registradoGuid = FrontHelper::getCookieRegistrado();
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
            $registradoGuid = FrontHelper::getCookieRegistrado();
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
    
    protected function config($clave='*') {
        if ($clave === '*') {
            return Configuraciones::pluck('valor','clave');
        } else {
            return Configuraciones::whereClave($clave)->first()->valor;    
        }
    }
}
