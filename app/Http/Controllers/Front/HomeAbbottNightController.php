<?php

namespace App\Http\Controllers\Front;


use App\Preguntas;
use Carbon\Carbon;

use App\Registrado;
use App\Helpers\FrontHelper;
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
        $registrado = $this->obtenerRegistrado();
        if ($registrado) {
            $data = [
                'props' => [
                    'ahora' => $ahora->format('Y-m-d H:i:s'),
                    'segundosRestantes' => Carbon::parse('2020-10-27 18:00:00')->diffInSeconds($ahora),
                    'urlEnviarTrivia' => route($this->key.'.enviar-trivia'),
                    'evento' => $this->evento,
                    'registrado' => $registrado,
                    
                ]
            ];
    
        } else {
            $data = [
                'props' => [
                    'recaptcha' => config('constantes.recaptcha',[]),
                    'urlRegistrar' => route($this->key.'.registrar'),
                    'evento' => $this->evento,
                ]
            ];
    
        }
        $vista = $registrado ? '.home-vue' : '.registro';
        return view('front.'.$this->evento['view'].$vista, $data);
        
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
