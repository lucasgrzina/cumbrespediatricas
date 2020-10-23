<?php

namespace App\Http\Controllers\Front;


use App\Preguntas;
use Carbon\Carbon;

use App\Registrado;
use App\Helpers\FrontHelper;
use Illuminate\Http\Request;
use App\Helpers\StorageHelper;
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
        $config = $this->config('*');
        $inicioVivo = $config['inicio_vivo'] ? Carbon::parse($config['inicio_vivo']) : false;
        $segundosRestantes = $inicioVivo && $inicioVivo->gt($ahora) ? Carbon::parse($inicioVivo)->diffInSeconds($ahora) : 0;
        
        if ($registrado) {
            $data = [
                'props' => [
                    'etapa' => $config['etapa'],
                    'ahora' => $ahora->format('Y-m-d H:i:s'),
                    'segundosRestantes' => $segundosRestantes,
                    'urlEnviarTrivia' => route($this->key.'.enviar-trivia'),
                    'urlEventoDisponible' => route($this->key.'.evento-disponible'),
                    'urlVivo' => route($this->key.'.vivo'),
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

    public function eventoDisponible() {
        $config = $this->config('*');
        $inicioVivo = $config['inicio_vivo'] ? Carbon::parse($config['inicio_vivo']) : false;
        $finVivo = $config['fin_vivo'] ? Carbon::parse($config['fin_vivo']) : false;
        if ($config['etapa'] === 'R' && $inicioVivo && Carbon::now()->gt($inicioVivo) && (!$finVivo || Carbon::now()->lt($finVivo))) {
            return $this->sendResponse([],'El evento se encuentra disponible');                
        } else {
            return $this->sendError('El evento no se encuentra disponible',505);
        }
        
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
                'urlDescargarCertificado' => route($this->key.'.descargar-certificado'),
            ]
        ];
        
        return view('front.'.$this->evento['view'].'.vivo', $data);
    }

    public function descargarCertificado() {
        $registrado = $this->obtenerRegistrado();

        
        $imgCertificado = $registrado->id . '_certificado1.jpg';


        //if (!StorageHelper::existe($imgCertificado,'uploads')) {
            $text = $registrado->nombre . ' ' . $registrado->apellido;
            $img = \Image::make(public_path('img/abbottnight/certificado/certificado1.jpg'));
        
            $width = $img->width();
            $height = $img->height();
            $center_x = $width / 2;
            $center_y = 220;
            $max_len = 50;
            $font_size = 50;
            $font_height = 45;
        
            $lines = explode("\n", wordwrap($text, $max_len));
            $y = $center_y - ((count($lines) - 1) * $font_height);
            //$img = \Image::canvas($width, $height, '#777');
        
            foreach ($lines as $line) {
                $img->text($line, $center_x, $y, function ($font) use ($font_size) {
                    $font->file(public_path('fonts/Gotham-Bold.ttf'));
                    $font->size($font_size);
                    $font->color('#000000');
                    $font->align('center');
                    $font->valign('top');
                });
        
                $y += $font_height * 2;
            }
        
            
            $img->save(public_path('uploads/' . $imgCertificado));
    
        //}

        $pdf = \PDF::loadView('exports.certificado', ['imagen' => StorageHelper::path($imgCertificado,'uploads')])->setPaper('A4', 'landscape'); 
        return $pdf->download($registrado->id.'.pdf');
        
    }
}
