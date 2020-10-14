<?php

namespace App\Http\Controllers;

use App\Helpers\CacheHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        try
        {
            $pathToFile = asset('img/forosas/Confirmacion.jpg');
            $contenidoEmail = "Hola Lucas<br>".
            "Muchas gracias por registrarse al 7mo Foro de Salud Sustentable (SaS).<br>".
            "Ya puede darle un vistazo a la información del evento ingresando al sitio web www.foro-sas.com.ar";
            Mail::queue(new \App\Mail\RawMailable('lucasgrzina@gmail.com', 'Foro-Sas: Registro', $contenidoEmail));                    

            
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }        
    }
    
}