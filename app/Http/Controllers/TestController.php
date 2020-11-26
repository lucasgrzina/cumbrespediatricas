<?php

namespace App\Http\Controllers;


use App\Services\ApiRolService;

use App\Services\ApiSmsService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TestController extends AppBaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function sms(ApiSmsService $smsService) {
        try
        {
            return $smsService->enviarCodigo('11','34290838');
            
        }
        catch(\Exception $ex)
        {
            \Log::info($ex->getMessage());
        }
    }
    public function sendEmail() {
        try
        {
            $registrados = [
                'lucasgrzina@gmail.com',
                'lgrzina@identidad-digital.com.ar',
                'guido@quimicaeventos.com'
            ];


            $imagen = 'https://quimicavirtualeventss.com/img/dermatalks/mailing_1.jpg';
         
            $salida = [
                'errores' => [],
                'ok' => 0
            ];
            try
            {
                foreach ($registrados as $email) {
                    Mail::queue(new \App\Mail\Novartis($email, 'Dermatalks 26/11', $imagen));                                    
                    $salida['ok'] = $salida['ok'] + 1;
                }
            }
            catch(\Exception $ex)
            {
                $salida['errores'][] = $ex->getMessage();
                //\Log::error($ex->getMessage());
            }               
            return response()->json($salida);         
         
         
            /*Mail::raw('This is the content of mail body', function($message)
            {
                $message->from('test@test.com', 'Test Email');

                $message->to('lucasgrzina@gmail.com');

            });*/
            
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }        
    }   
}