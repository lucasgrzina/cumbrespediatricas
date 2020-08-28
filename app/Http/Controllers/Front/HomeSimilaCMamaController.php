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

class HomeSimilaCMamaController extends AppBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $evento = 'similacmama';
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
            return view('front.'.$this->evento.'.home',['data' => $data]);
        }
        return $this->indexVue();
        
    }

    public function indexVue()
    {
        //return redirect()->route('home');
        if (FrontHelper::getCookieRegistrado($this->evento)) {
            return redirect()->route($this->evento.'.vivo');
        }

        $data = [
            'props' => [
                'urlRegistrar' => route($this->evento.'.registrar')
            ]
        ];
        return view('front.'.$this->evento.'.home-vue', $data);
    } 

    public function vivo (Request $request) {
        $registrado = null;
        try {
            
            $conf = $this->config('*');
            
            if ($conf['etapa'] !== 'R') {
                return redirect()->to($this->evento.'.home');
            }

            try {
                /*$registrado->acciones()->create([
                    'accion' => 'evento',
                    'desde' => Carbon::now()
                ]);*/
    
            } catch(\Exception $e) {
                \Log::info($e->getMessage());
            }

        } catch(\Exception $e) {
            return view('front.'.$this->evento.'.no-habilitado');
            //return redirect()->to(env('URL_SITIO_PPAL','#'));
        }
        

        $data = [
            'props' => [
                'urlEnviar' => route($this->evento.'.enviar-pregunta'),
                'urlEncuesta' => '',
                'urlEncuestaDisponible' => route($this->evento.'.encuesta-disponible'),
                'urlEnviarEncuesta' => route($this->evento.'.enviar-encuesta'),
                'urlEnviarSalidaUsuario' => route($this->evento.'.enviar-salida-usuario'),
            ]
        ];
        return view('front.'.$this->evento.'.vivo', $data);
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
            $input = $request->all();
            $input['evento'] = $this->evento;
            $data = Registrado::create($input);
            FrontHelper::setCookieRegistrado($data->id,$this->evento);
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }

    public function enviarPregunta(Request $request) {
        try {
            $registradoGuid = FrontHelper::getCookieRegistrado($this->evento);
            $data = $request->all();
            if ($registradoGuid) {
                try {
                    $registrado = Registrado::where(\DB::raw('md5(id)'),$registradoGuid)->first();
                
                    $data['registrado_id'] = $registrado->id;
                    $data['evento'] = $this->evento;
    
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
            $registradoGuid = FrontHelper::getCookieRegistrado($this->evento);
            $data = $request->all();
            if ($registradoGuid) {
                try {
                    $registrado = Registrado::where(\DB::raw('md5(id)'),$registradoGuid)->first();
                
                    $data['registrado_id'] = $registrado->id;
                    $data['evento'] = $this->evento;
    
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
            return Configuraciones::whereEvento($this->evento)->pluck('valor','clave');
        } else {
            return Configuraciones::whereClave($clave)->whereEvento($this->evento)->first()->valor;    
        }
    }

    public function eventoDisponible() {
        $config = $this->config('*');
        $vivoDispo = $config['etapa_similacmama'] === 'R' && !(bool)$config['encuesta'];
        if ($vivoDispo) {
            return $this->sendResponse([],'La operación finañizó con éxito');                
        } else {
            return $this->sendError('La evento no se encuentra disponible por el momento.',505);
        }        
    }
    
    public function enviarSalidaUsuario(Request $request) {
        try {

            $registradoGuid = FrontHelper::getCookieRegistrado($this->evento);
            
            if ($registradoGuid) {
                try {
                    $registrado = Registrado::where(\DB::raw('md5(id)'),$registradoGuid)->first();
                    $accion = $registrado->acciones()->whereNull('hasta')->orderBy('id','asc')->first();
                    $accion->hasta = Carbon::now()->format('Y-m-d H:i:s');
                    $accion->save();
                } catch (\Exception $e) {
                    \Log::info($e->getMessage());
                }
                
            }
            
            return $this->sendResponse([],'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }    
}
