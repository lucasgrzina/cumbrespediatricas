<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Registrado;

use App\Helpers\FrontHelper;
use Illuminate\Http\Request;

use App\Exceptions\NoHabilitadoException;
use App\Http\Requests\Front\RegistrarRequest;
use App\Http\Controllers\Front\EventoBaseController;


class HomeCumbreNasaController extends EventoBaseController
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
        return $this->vivo(request());              
    }

    public function indexVue()
    {
        return view('front.'.$this->evento['view'].'.no-habilitado');
    } 

    public function vivo (Request $request) {
        $registrado = null;
        try {

            $conf = $this->config('*');
            
            if ($conf['etapa'] !== 'R') {
                //return redirect()->route($this->key.'.home');
                return view('front.'.$this->evento['view'].'.no-habilitado');
            }

            try {
                if (!$request->id || !$request->token) {
                    throw new NoHabilitadoException("Vino sin request", 1);                    
                }            

                $registrado = $this->obtenerRegistradoExterno($request);

                if ($registrado) {
                    $registrado->acciones()->create([
                        'accion' => 'evento',
                        'desde' => Carbon::now()
                    ]);
                } else {
                    FrontHelper::removeCookieRegistrado($this->evento['cookie']);
                    return redirect()->route($this->key.'.home');
                }
    
            } 
            catch(NoHabilitadoException $e) {
                FrontHelper::removeCookieRegistrado($this->evento['cookie']);
                return view('front.'.$this->evento['view'].'.no-habilitado');
            }
            catch(\Exception $e) {
                \Log::info($e->getMessage());
            }

        } catch(\Exception $e) {
            return view('front.'.$this->evento['view'].'.no-habilitado');
            //return redirect()->to(env('URL_SITIO_PPAL','#'));
        }
        

        $data = [
            'props' => [
                'evento' => $this->evento,
                'registrado' => $registrado,
                'urlEnviar' => route($this->key.'.enviar-pregunta'),
                'urlEncuesta' => '',
                'urlEncuestaDisponible' => route($this->key.'.encuesta-disponible'),
                'urlEnviarEncuesta' => route($this->key.'.enviar-encuesta'),
                'urlEnviarSalidaUsuario' => route($this->key.'.enviar-salida-usuario'),
                'urlSitioPpal' => $this->evento['urlSitioPrincipal'],
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

    protected function obtenerRegistradoExterno(Request $request) {
        
        if ($request->has('test') && $request->get('test', false)) {
            $keyCacheRegistrado = 'registrado_ext_test_'.$this->key.'_'.$request->token;
        } else {
            $keyCacheRegistrado = 'registrado_ext_'.$this->key.'_'.$request->token;
        }

        $dbRegistrado = \Cache::remember($keyCacheRegistrado, Carbon::now()->addMinutes($this->segundosCache / 60), function () use($request){
            //Puede estar el mismo registrado externo pero para distinto evento
            if ($request->has('test') && $request->get('test',false)) {
                return Registrado::whereIdExterno(1)->first();
            } else {
                return Registrado::whereIdExterno($request->id)->whereEvento($this->key)->first();
            }
            
        }); 

        if (!$dbRegistrado) {
            
            try {
                $json = file_get_contents($this->evento['urlWebServiceRegistrado'].'?id='.$request->id.'&token='.$request->token);
                $obj = json_decode($json);
                if (!$obj) {
                    throw new NoHabilitadoException('No retorna ws', 1);    
                }
            } catch (\Exception $e) {
                throw new NoHabilitadoException($e->getMessage(), 1);                
            }
    
            $dbRegistrado = Registrado::create([
                'id_externo' => $obj->id,
                'nombre' => $obj->nombre,
                'apellido' => $obj->apellido,
                'email' => isset($obj->correo) ? $obj->correo : $obj->email,
                'especialidad' => $obj->especialidad,
                'pais' => $obj->pais,
                'certificado' => isset($obj->certificado) ? $obj->certificado : 'aaa',
                'token' => $request->token,
                'evento' => $this->key
            ]);
            
            \Cache::put($keyCacheRegistrado, $dbRegistrado, Carbon::now()->addMinutes($this->segundosCache / 60));
        }

        FrontHelper::setCookieRegistrado($dbRegistrado->id,$this->evento['cookie']);

        return $dbRegistrado;
    }

    
}
