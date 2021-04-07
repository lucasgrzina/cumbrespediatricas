<?php

namespace App\Http\Controllers\Front;


use App\Preguntas;
use Carbon\Carbon;

use App\Registrado;
use App\Mail\RawMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Front\RegistrarRequest;
use App\Http\Controllers\Front\EventoBaseController;


class HomeCigenController extends EventoBaseController
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
        /*if (\Auth::guard('web')->check()) {
            return redirect()->route($this->key.'.registrado');
        } */       
        
        $data = [
            'props' => [
                'loggedIn' => \Auth::guard('web')->check(),
            ],
            'headerData' => true,
            'title' => '¡Bienvenidos!'
        ];
        return view('front.'.$this->evento['view'].'.home-vue', $data);
        
    }

    public function login()
    {
        if (\Auth::check()) {
            return redirect()->route($this->key.'.home');
        }
        $data = [
            'props' => [
                'keyRecaptcha' => config('constantes.recaptcha.key',''),
                'urlLogin' => route($this->key.'.loggear'),
                'urlRecuperar' => route($this->key.'.recuperar'),
                'urlHome' => route($this->key.'.home'),
            ],
            'title' => 'Login'            
        ];
        return view('front.'.$this->evento['view'].'.login', $data);
        
    }   

    public function registro()
    {
        if (\Auth::check()) {
            return redirect()->route($this->key.'.home');
        }
        $data = [
            'props' => [
                'keyRecaptcha' => config('constantes.recaptcha.key',''),
                'urlLogin' => route($this->key.'.login'),
                'urlRegistrar' => route($this->key.'.registrar'),
                'urlHome' => route($this->key.'.home'),
            ],
            'title' => 'Registro'
        ];
        return view('front.'.$this->evento['view'].'.registro', $data);
        
    }    

    public function registrar(RegistrarRequest $request) {
        try {
            $input = $request->all();
            $input['evento'] = $this->key;
            
            if (Registrado::whereEmail($request->email)->whereEvento($this->key)->count() > 0) {
                throw new \Exception('El email ingresado ya se encuentra registrado',422);
            }

            /*if (strtoupper($request->codigo) !== strtoupper('forosas7')) {
                throw new \Exception('El código ingresado es incorrecto',422);
            }*/
            
            DB::beginTransaction();
            $data = Registrado::create($input);
            try
            {
                
                
                    /*$pathToFile = asset('img/forosas/Confirmacion.jpg');
                    $contenidoEmail = "Hola {$request->nombre}<br>".
                    "Muchas gracias por registrarse al 7mo Foro de Salud Sustentable (SaS).<br>".
                    "Ya puede darle un vistazo a la información del evento ingresando al sitio web www.foro-sas.com.ar";
                    Mail::queue(new \App\Mail\RawMailable($request->email, 'Foro-Sas: Registro', $contenidoEmail));                    
                    */
                
            }
            catch(\Exception $ex)
            {
                \Log::error($ex->getMessage());
            }               
            \Auth::login($data);
            //\Auth::login($data);
            DB::commit();
            
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            DB::rollback();
            \Log::info($e->getMessage());
            $code = $e->getCode();
            if ($e->getCode() != 404 || $e->getCode() != 422 || $e->getCode() != 500) {
                $code = 500;
            }
            return $this->sendError($e->getMessage(),$code);
        }        
    }    

    public function loggear(Request $request) {
        try {
            $data = Registrado::whereEmail($request->email)->wherePassword($request->password)->whereEvento($this->key)->first();
            if (!$data) {
                throw new \Exception('El email ingresado no se encuentra registrado',404);
            }
            \Auth::login($data);
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    } 
    
    public function enviarPregunta(Request $request) {
        try {
            $data = $request->all();
            $data['evento'] = $this->key;
            try {
                $registrado = \Auth::user();
                $data['registrado_id'] = $registrado->id;

            } catch (\Exception $e) {}
            $data['destinatario'] = $data['speaker'];
            $data = Preguntas::create($data);
            
            
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    } 
    
    public function registrado()
    {
        if (!\Auth::guard('web')->check()) {
            return redirect()->route($this->key.'.home');
        }        
        //\Auth::logout();
        $data = [
            'headerData' => false,
            'title' => '¡Te has registrado exitosamente!'
        ];
        return view('front.'.$this->evento['view'].'.registrado', $data);
        
    } 
    
    public function recuperar(Request $request) {
        try {
            $data = Registrado::whereEmail($request->email)->whereEvento($this->key)->first();
            if (!$data) {
                throw new \Exception('El email ingresado no se encuentra registrado',404);
            }
            $contenidoEmail = "Hola {$data->nombre}<br>".
            "Tu contraseña es {$data->password}<br>";
            
            try {
                Mail::queue(new RawMailable($data->email, 'Cigen: Olvide mi contraseña', $contenidoEmail,['cigen2021@gmail.com','Cigen 2021'],'raw-cigen'));                                    
            } catch (\Exception $e) {
                \Log::info($e->getMessage());
            }
            

            //Hago el envio del email
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    }    
    
    public function vivo (Request $request) {
        $registrado = null;
        try {
            if (!\Auth::check()) {
                return redirect()->route($this->key.'.home');
            }
    
            $conf = $this->config('*');


            try {
                $registrado = $this->obtenerRegistrado();
                if ($registrado) {
                    $registrado->acciones()->create([
                        'accion' => 'evento',
                        'desde' => Carbon::now()
                    ]);
                }
    
            } catch(\Exception $e) {
                \Log::info($e->getMessage());
            }

        } catch(\Exception $e) {
            //return view('front.'.$this->evento['view'].'.no-habilitado');
            //return redirect()->to(env('URL_SITIO_PPAL','#'));
        }
        

        $data = [
            'title' => 'Transmisión en VIVO',
            'props' => [
                'evento' => $this->evento,
                'configEvento' => $conf,
                'registrado' => $registrado,
                'urlEnviar' => route($this->key.'.enviar-pregunta'),
                'urlEncuesta' => '',
                'urlEncuestaDisponible' => route($this->key.'.encuesta-disponible'),
                'urlEnviarEncuesta' => route($this->key.'.enviar-encuesta'),
                'urlEnviarSalidaUsuario' => route($this->key.'.enviar-salida-usuario'),
            ]
        ];
        return view('front.'.$this->evento['view'].'.vivo', $data);
    }    

    public function agendaViernes (Request $request) {
        if (!\Auth::check()) {
            return redirect()->route($this->key.'.home');
        }
        

        $data = [
            'title' => 'Agenda de evento',
            'fechaEventoData' => 'viernes',
            'props' => [

            ]
        ];
        return view('front.'.$this->evento['view'].'.agenda-viernes', $data);
    }   
    
    public function agendaSabado (Request $request) {
        if (!\Auth::check()) {
            return redirect()->route($this->key.'.home');
        }
        

        $data = [
            'title' => 'Agenda de evento',
            'fechaEventoData' => 'sabado',
            'props' => [

            ]
        ];
        return view('front.'.$this->evento['view'].'.agenda-sabado', $data);
    }        

    public function speakersNacionales (Request $request) {
        if (!\Auth::check()) {
            return redirect()->route($this->key.'.home');
        }
        

        $data = [
            'title' => 'Speakers Nacionales',
            'props' => [

            ]
        ];
        return view('front.'.$this->evento['view'].'.speakers-nacionales', $data);
    } 

    public function speakersInternacionales (Request $request) {
        if (!\Auth::check()) {
            return redirect()->route($this->key.'.home');
        }
        $data = [
            'title' => 'Speakers Internacionales',
            'props' => [

            ]
        ];
        return view('front.'.$this->evento['view'].'.speakers-internacionales', $data);
    } 

    public function eventosPrevios (Request $request) {
        if (!\Auth::check()) {
            return redirect()->route($this->key.'.home');
        }
        $data = [
            'title' => 'Eventos Previos',
            'props' => [

            ]
        ];
        return view('front.'.$this->evento['view'].'.eventos-previos', $data);
    } 

    public function quienesSomos (Request $request) {
        if (!\Auth::check()) {
            return redirect()->route($this->key.'.home');
        }
        $data = [
            'title' => 'Quienes Somos?',
            'props' => [

            ]
        ];
        return view('front.'.$this->evento['view'].'.quienes-somos', $data);
    } 

    public function sponsors (Request $request) {
        if (!\Auth::check()) {
            return redirect()->route($this->key.'.home');
        }
        $data = [
            'title' => 'Sponsors',
            'props' => [

            ]
        ];
        return view('front.'.$this->evento['view'].'.sponsors', $data);
    } 





    protected function obtenerRegistrado() {
        $registrado = null;
        try {
            //$registradoGuid = FrontHelper::getCookieRegistrado($this->evento['cookie']);
            if (\Auth::guard('web')->check()) {
                $registrado = \Auth::guard('web')->user();     
            }
            
        } catch (\Exception $e) {}
        return $registrado;
    }
}
