<?php

namespace App\Http\Controllers\Front;


use Carbon\Carbon;
use App\Registrado;
use App\Helpers\FrontHelper;
use Illuminate\Http\Request;
use App\Http\Front\Controllers\EventoBaseController;

class HomeController extends EventoBaseController
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
        //return redirect()->to(env('URL_SITIO_PPAL','#'));
        //return redirect()->route('home');
        if (FrontHelper::getCookieRegistrado()) {
            //return redirect()->route('vivo');
        }

        $data = [
            'props' => [
                //'urlRegistrar' => route('registrar')
            ]
        ];
        return view('front.cumbre.home-vue', $data);
    } 

    public function vivo (Request $request) {
        $registrado = null;
        try {
            
            if (!$request->id || !$request->token) {
                //return view('front.no-habilitado');
                //return redirect()->to(env('URL_SITIO_PPAL','#'));
            }
            
            $conf = $this->config('*');
            if ($conf['etapa'] !== 'R') {
                return redirect()->to(env('URL_SITIO_PPAL','#'));
            }

            //$registrado = $this->obtenerRegistradoExterno($request);
            

            try {
                /*$registrado->acciones()->create([
                    'accion' => 'evento',
                    'desde' => Carbon::now()
                ]);*/
    
            } catch(\Exception $e) {
                \Log::info($e->getMessage());
            }

        } catch(\Exception $e) {
            return view('front.no-habilitado');
            //return redirect()->to(env('URL_SITIO_PPAL','#'));
        }
        

        $data = [
            'props' => [
                'urlEnviar' => route('enviar-pregunta'),
                'urlEncuesta' => '',
                'urlEncuestaDisponible' => route('encuesta-disponible'),
                'urlEnviarEncuesta' => route('enviar-encuesta'),
                'urlSitioPpal' => env('URL_SITIO_PPAL','#'),
                'urlEnviarSalidaUsuario' => route('enviar-salida-usuario'),
                'registrado' => $registrado
            ]
        ];
        return view('front.vivo', $data);
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
        FrontHelper::setCookieRegistrado($dbRegistrado->id);

        return $dbRegistrado;
    }

}
