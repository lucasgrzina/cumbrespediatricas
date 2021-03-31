<?php

namespace App\Http\Controllers;

use App\Registrado;
use App\Mail\RawMailable;
use App\Helpers\CacheHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class IDController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function clear($type) {
        try
        {
            \Artisan::call($type.':clear');
            return "OK";
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    public function sendEmail() {

        $registrados = Registrado::whereEvento('cigen')->get(); 
        $salida = [
            'errores' => [],
            'ok' => 0
        ];
        try
        {
            foreach ($registrados as $registrado) {
                $contenidoEmail = "Hola {$registrado->nombre}<br>".
                "Tu contraseña es {$registrado->password}<br>";
                Mail::queue(new RawMailable($registrado->email, 'Cigen: Olvide mi contraseña', $contenidoEmail,['cigen2021@gmail.com','Cigen 2021']));                                    
                $salida['ok'] = $salida['ok'] + 1;
                
            }
            
            
        }
        catch(\Exception $ex)
        {
            $salida['errores'][] = $ex->getMessage();
            //\Log::error($ex->getMessage());
        }               
        return response()->json($salida);
        
        /*$pathToFile = asset('img/forosas/Confirmacion.jpg');
            $contenidoEmail = "Hola Lucas<br>".
            "Muchas gracias por registrarse al 7mo Foro de Salud Sustentable (SaS).<br>".
            "Ya puede darle un vistazo a la información del evento ingresando al sitio web www.foro-sas.com.ar";
            Mail::queue(new \App\Mail\RawMailable('lucasgrzina@gmail.com', 'Foro-Sas: Registro', $contenidoEmail));                    
        */

        
            
           
    }
    
}