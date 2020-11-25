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
            $imagen = asset('img/dermatalks/mailing_1.jpg');
            Mail::queue(new \App\Mail\Novartis('lucasgrzina@gmail.com', 'Foro-Sas: Registro', $imagen));                                    
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