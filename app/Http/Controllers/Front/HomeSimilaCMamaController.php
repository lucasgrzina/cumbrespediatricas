<?php

namespace App\Http\Controllers\Front;


use App\Encuestas;
use App\Preguntas;
use Carbon\Carbon;
use App\Registrado;

use App\Helpers\FrontHelper;
use Illuminate\Http\Request;

use App\Http\Requests\Front\RegistrarRequest;
use App\Http\Controllers\Front\EventoBaseController;


class HomeSimilaCMamaController extends EventoBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $conf = $this->config('*');
        
        if ($conf['etapa'] !== 'R') {
            $data = [
                'config' => $conf
            ];
            return view('front.'.$this->evento['view'].'.home',['data' => $data]);
        }
        return $this->indexVue();
        
    }

    public function indexVue()
    {
        //return redirect()->route('home');
        if (FrontHelper::getCookieRegistrado($this->evento['cookie'])) {
            return redirect()->route($this->key.'.vivo');
        }

        $data = [
            'props' => [
                'recaptcha' => config('constantes.recaptcha',[]),
                'urlRegistrar' => route($this->key.'.registrar')
            ]
        ];
        return view('front.'.$this->evento['view'].'.home-vue', $data);
    } 

    public function vivo (Request $request) {
        $registrado = null;
        try {
            
            $conf = $this->config('*');

            if ($conf['etapa'] !== 'R') {
                return redirect()->route($this->key.'.home');
            }

            try {
                $registrado = $this->obtenerRegistrado();
                if ($registrado) {
                    $registrado->acciones()->create([
                        'accion' => 'evento',
                        'desde' => Carbon::now()
                    ]);
                } else {
                    FrontHelper::removeCookieRegistrado($this->evento['cookie']);
                    return redirect()->route($this->key.'.home');
                }
    
            } catch(\Exception $e) {
                \Log::info($e->getMessage());
            }

        } catch(\Exception $e) {
            return view('front.'.$this->evento['view'].'.no-habilitado');
            //return redirect()->to(env('URL_SITIO_PPAL','#'));
        }
        

        $data = [
            'props' => [
                'evento' => $this->evento,
                'registrado' => $this->obtenerRegistrado(),
                'urlEnviar' => route($this->key.'.enviar-pregunta'),
                'urlEncuesta' => '',
                'urlEncuestaDisponible' => route($this->key.'.encuesta-disponible'),
                'urlEnviarEncuesta' => route($this->key.'.enviar-encuesta'),
                'urlEnviarSalidaUsuario' => route($this->key.'.enviar-salida-usuario'),
            ]
        ];
        return view('front.'.$this->evento['view'].'.vivo', $data);
    }
    
    public function registrar(RegistrarRequest $request) {
        try {
            $input = $request->all();
            $input['evento'] = $this->key;
            $data = Registrado::create($input);
            FrontHelper::setCookieRegistrado($data->id,$this->evento['cookie']);
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }  
}
