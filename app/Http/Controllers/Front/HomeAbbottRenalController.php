<?php

namespace App\Http\Controllers\Front;


use App\Preguntas;
use Carbon\Carbon;

use App\Registrado;
use App\Mail\RawMailable;
use App\Helpers\FrontHelper;
use Illuminate\Http\Request;
use App\Helpers\StorageHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Front\RegistrarRequest;
use App\Http\Controllers\Front\EventoBaseController;


class HomeAbbottRenalController extends EventoBaseController
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
        $registrado = $this->obtenerRegistrado();
        if ($registrado) {
            return redirect()->route($this->key.'.vivo');
        } else {            
            return redirect()->route($this->key.'.registro');
        }
        /*$data = [
            'props' => [
                'keyRecaptcha' => config('constantes.recaptcha.key',''),
                //'urlRegistrar' => route($this->key.'.registrar'),
                //'urlRedirect' => route($this->key.'.home'),
                //'urlAvisoPrivacidad' => route($this->key.'.avisoPrivacidad'),
            ],
            'title' => 'Próximamente'
        ];        
        return view('front.'.$this->evento['view'].'.home', $data);*/
    }

    public function registro()
    {
        $registrado = $this->obtenerRegistrado();
        if ($registrado) {
            return redirect()->route($this->key.'.vivo');
        }
        
        $data = [
            'props' => [
                'keyRecaptcha' => config('constantes.recaptcha.key',''),
                'urlRegistrar' => route($this->key.'.registrar'),
                'urlRedirect' => route($this->key.'.home'),
                'urlAvisoPrivacidad' => '#',
            ],
            'title' => 'Registro'
        ];        
        return view('front.'.$this->evento['view'].'.home', $data);
    }    

    public function registrar(RegistrarRequest $request) {
        try {
            $input = $request->all();
            $input['evento'] = $this->key;

            DB::beginTransaction();
            $data = Registrado::create($input);
            FrontHelper::setCookieRegistrado($data->id,$this->evento['cookie']);
            DB::commit();
            
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            DB::rollback();
            \Log::info($e->getMessage());
            $code = $e->getCode();
            if ($e->getCode() != 404 || $e->getCode() != 422 || $e->getCode() != 400) {
                $code = 500;
            }
            return $this->sendError($e->getMessage(),$code);
        }        
    }    

    public function enviarPregunta(Request $request) {
        try {
            $data = $request->all();
            $data['evento'] = $this->key;
            try {
                $registrado = $this->obtenerRegistrado();
                $data['registrado_id'] = $registrado->id;

            } catch (\Exception $e) {}
            //$data['destinatario'] = $data['speaker'];
            $data = Preguntas::create($data);
            
            
            return $this->sendResponse($data,'La operación finañizó con éxito');                
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),$e->getCode());
        }
    } 


    public function vivo (Request $request) {
        $registrado = null;
        $conf = $this->config('*');
        
        try {
            
            $registrado = $this->obtenerRegistrado();

            if (!$registrado) {
                return redirect()->route($this->key.'.registro');
            }


            try {
                //$registrado = $this->obtenerRegistrado();
                
                if ($registrado && $conf['etapa'] === 'R') {
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
        
        $this->evento['urlCertificado'] = route($this->key.'.descargar-certificado');
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

    public function avisoPrivacidad() {
        return view('front.'.$this->evento['view'].'.aviso-privacidad');
    }


    public function descargarCertificado() {
        $registrado = $this->obtenerRegistrado();

        
        $imgCertificado = $registrado->id . '_msl_certificado.jpg';


        //if (!StorageHelper::existe($imgCertificado,'uploads')) {
            $text = $registrado->nombre;
            $img = \Image::make(public_path('assets/mentesinlimites/img/certificado.jpg'));
        
            $width = $img->width();
            $height = $img->height();
            $center_x = $width / 2;
            $center_y = 450;
            $max_len = 50;
            $font_size = 100;
            $font_height = 45;
        
            $lines = explode("\n", wordwrap($text, $max_len));
            $y = $center_y - ((count($lines) - 1) * $font_height);
            //$img = \Image::canvas($width, $height, '#777');
        
            foreach ($lines as $line) {
                $img->text($line, $center_x, $y, function ($font) use ($font_size) {
                    $font->file(public_path('assets/mentesinlimites/fonts/Gotham-Thin.ttf'));
                    $font->size($font_size);
                    $font->color('#824d33');
                    $font->align('center');
                    $font->valign('top');
                });
        
                $y += $font_height * 2;
            }
        
            
            $img->save(public_path('uploads/mentesinlimites/' . $imgCertificado));
    
        //}
        $customPaper = array(0,0,$height / 2,$width / 2);
        $pdf = \PDF::loadView('exports.certificado', ['imagen' => StorageHelper::path('mentesinlimites/'.$imgCertificado,'uploads')])->setPaper($customPaper, 'landscape'); 
        return $pdf->download('Certificado.pdf');
        
    }    

}
