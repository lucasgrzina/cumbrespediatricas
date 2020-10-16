<?php

namespace App\Http\Controllers\Front;


use App\Preguntas;
use Carbon\Carbon;

use App\Registrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Front\RegistrarRequest;
use App\Http\Front\Controllers\EventoBaseController;

class HomeAbbottNightController extends EventoBaseController
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
        /*if (!\Auth::guard('web')->check()) {
            return redirect()->route($this->key.'.registro');
        } */       
        $ahora = Carbon::now();
        $data = [
            'props' => [
                'ahora' => $ahora->format('Y-m-d H:i:s'),
                'segundosRestantes' => Carbon::parse('2020-10-27 18:00:00')->diffInSeconds($ahora),
                'urlEnviarPregunta' => route($this->key.'.enviar-pregunta'),
            ]
        ];
        return view('front.'.$this->evento['view'].'.home-vue', $data);
        
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
            ]
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

    public function login(Request $request) {
        try {
            $data = Registrado::whereEmail($request->email)->whereEvento($this->key)->first();
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

}
