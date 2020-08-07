<?php

namespace App\Http\Controllers\Front;


use App\Encuestas;
use App\Preguntas;
use Carbon\Carbon;
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
            //return redirect()->route('vivo');
        }

        $data = [
            'props' => [
                'urlRegistrar' => route('registrar')
            ]
        ];
        return view('front.home-vue', $data);
    } 

    public function vivo (Request $request) {
        \Log::info('entra en vivo');
        $registrado = null;
        try {
            
            if (!$request->id || !$request->token) {
                throw new \Exception("No estas habilitado para ingresar a esta sección", 1);
            }
            
            $conf = $this->config('*');
            if ($conf['etapa'] !== 'R') {
                return redirect()->route('home');
            }

        
            $registrado = $this->obtenerRegistradoExterno($request);
            FrontHelper::setCookieRegistrado($registrado->id);

            try {

                /*$registrado->acciones()->whereNull('hasta')->update([
                    'hasta' => Carbon::now()->format('Y-m-d H:i:s')
                ]);*/
                   
                $registrado->acciones()->create([
                    'accion' => 'evento',
                    'desde' => Carbon::now()
                ]);
    
            } catch(\Exception $e) {
                \Log::info($e->getMessage());
            }

        } catch(\Exception $e) {
            throw new \Exception("No estas habilitado para ingresar a esta sección", 1);
            
        }
        

        $data = [
            'props' => [
                'urlEnviar' => route('enviar-pregunta'),
                'urlEncuesta' => '',
                'urlEncuestaDisponible' => route('encuesta-disponible'),
                'urlEnviarEncuesta' => route('enviar-encuesta'),
                'urlSitioPpal' => env('URL_SITIO_PPAL','#'),
                'urlEnviarSalidaUsuario' => route('enviar-salida-usuario',['_ID_']),
                'registrado' => $registrado
            ]
        ];
        return view('front.vivo', $data);
    }
    
    
    public function encuestaDisponible () {
        \Log::info('encuestrasasa');
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
    
    public function enviarSalidaUsuario($id,Request $request) {
        try {

            $registradoGuid = FrontHelper::getCookieRegistrado();
            
            if ($registradoGuid) {
                try {
                    $registrado = Registrado::where(\DB::raw('md5(id)'),$registradoGuid)->first();
                    
                    $registrado->acciones()->whereNull('hasta')->orderBy('id','asc')->first()->update([
                        'hasta' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);
    
                } catch (\Exception $e) {}
                
            }
            
            return $this->sendResponse([],'La operación finañizó con éxito');                
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

    protected function obtenerRegistradoExterno(Request $request) {
        $json = file_get_contents(env('URL_WS_REGISTRADO').'?id='.$request->id.'&token='.$request->token);
        $obj = json_decode($json);

        $dbRegistrado = Registrado::whereIdExterno($obj->id)->first();
        if (!$dbRegistrado) {
            $dbRegistrado = Registrado::create([
                'id_externo' => $obj->id,
                'nombre' => $obj->nombre,
                'apellido' => $obj->apellido,
                'email' => $obj->correo,
                'especialidad' => $obj->especialidad,
                'pais' => $obj->pais,
                'certificado' => $obj->certificado,
                'token' => $request->token
            ]);
        }

        return $dbRegistrado;
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
}
