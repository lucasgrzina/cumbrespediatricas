<?php

namespace App\Http\Controllers;

use App\Registrado;
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

        $registrados = Registrado::whereEvento('forosas')->where('created_at','<','2020-10-14')->take(1)->pluck('nombre','email'); 
        $salida = [];
        try
        {
            foreach ($registrados as $email => $nombre) {
                $contenidoEmail = "Hola {$nombre}<br>".
                "Muchas gracias por registrarse al 7mo Foro de Salud Sustentable (SaS).<br>".
                "Ya puede darle un vistazo a la información del evento ingresando al sitio web www.foro-sas.com.ar";
                $salida[] = $contenidoEmail;
                //Mail::queue(new \App\Mail\RawMailable($email, 'Foro-Sas: Registro', $contenidoEmail));                                    
            }
            
            
        }
        catch(\Exception $ex)
        {
            \Log::error($ex->getMessage());
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