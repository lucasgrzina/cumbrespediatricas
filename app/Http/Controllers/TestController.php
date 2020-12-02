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
                'pablo.arlia@gmail.com',
                'mauropolicella@gmail.com',
                'da@gmail.com',
                'fiorella.talamonti@novartis.com',
                'Chauletmagali@gmail.com',
                'ballespinrosana@gmail.com',
                'meuferla@hotmail.com',
                'sabihairabedian@gmail.com',
                'dra.gcuevas@yahoo.com.ar',
                'dra.geraldina@gmail.com',
                'delasmercedesrobert@gmail.com',
                'adrianadoc2001@hotmail.com',
                'alizarba@hotmail.com',
                'maritasanroman@hotmail.com',
                'fmpponce@gmail.com',
                'mariamacoc@hotmail.com',
                'doctordanielo@hotmail.com',
                'efhoms@gmail.com',
                'laufeiguin@yahoo.com.ar',
                'Shariseiref@gmail.com',
                'sumargasin@gmail.com',
                'alejandrogiavarini@hotmail.com',
                'Olgaluciaforero_05@yahoo.con.ar',
                'maleten@hotmail.com',
                'maia_dittrich@hotmail.com',
                'Majocorsi@hotmail.com',
                'yolyg153@hotmail.com',
                'Laura.bresler@novartis.com',
                'silvinachiramberro@hotmail.com',
                'mariosqueff@gmail.com',
                'gromanoboix@hotmail.com',
                'anahibringas@hotmail.com',
                'mellapur@hotmail.com',
                'm_ines_martinez@hotmail.com',
                'agussardoy@hotmail.com',
                'dra.geraldina@fibertel.com.ar',
                'gonalbin@hotmail.com',
                'valeriavogliotti@hotmail.com',
                'raftirel@hotmail.com',
                'Fabianaapilli@gmail.com',
                'irenesorokin@hotmail.com',
                'Anahibringad@hotmail.com',
                'Leandroperrotat@hotmail.com',
                'alejandro_martin.diaz@novartis.com',
                'noececilia@yahoo.com.ar',
                'maximiliano_picco@hotmail.com',
                'Vaninacocaro@hotmail.com',
                'Msole_espinosa@hotmail.com',
                'mariarosa_perez@hotmail.com',
                'Mirmorichelli@yahoo.com.ar',
                'gastoncharas@gmail.com',
                'franciscaaprile@gmail.com',
                'luismazzu@gmail.com',
                'maitegb72@hotmail.com',
                'adriana_gomez72@hotmail.com',
                'rodrigo.torres_munoz@novartis.com',
                'griselcurras@hotmail.com',
                'maria.echeverriap@hospitalitaliano.org.ar',
                'draceciliacivale@gmail.com',
                'ezequiel.paura@novartis.com',
                'mamudupuy@hotmail.com',
                'anama.diprinzio@hospitalitaliano.org.ar',
                'denys.penaloza@hospitalitaliano.org.ar',
                'drafdaniele@gmail.com',
                'juliabarouille@gmail.com',
                'mgcastiglioni@hotmail.com',
                'robertodobrinin@hotmail.com',
                'Fuentesroch.m@gmail.com',
                'juliatalanczuk@gmail.com',
                'dra.paulabordello@gmail.com',
                'florzubieta@hotmail.com',
                'flor_quilo@hotmail.com',
                'vijogo44@gmail.com',
                'fbussy@gmail.com',
                'dragabrielabrana@gmail.com',
                'rominajankovic@hotmail.com',
                'adryferrini@hotmail.com',
                'mariela.andrea70@gmail.com',
                'andresgermanroma@yahoo.com.ar',
                'ocampoelizabeth069@gmail.com',
                'Portaluppimm@gmail.com',
                'dellagiovannap@hotmail.com',
                'info@centrodepiel.com',
                'veronicaestrella1@yahoo.com.ar',
                'elhiza@hotmail.com',
                'mguardati@hotmail.com',
                'paulammorel@hotmail.com',
                'rogg@hotmail.com.ar',
                'msoledadgallardo@hotmail.com',
                'andreasalc29@yahoo.com.ar',
                'valeriavogliotti@hotnail.com',
                'Drasabrinaph@gmail.com',
                'ximenadelasota@gmail.com',
                'carmenceci43@gmail.com',
                'vzalazar2014@hotmail.com',
                'dravilchezmariaemilia@gmail.com',
                'hernan.medina@novartis.com',
                'dermatologiadralopez@gmail.com',
                'anavannetti@gmail.com',
                'Guillerminabergonzi19@gmail.com',
                'Dravillacarolina@gmail.com',
                'hlsalta@yahoo.com.ar',
                'monicadallacosta@arnet.com.ar',
                'aldana_scaglione@hotmail.com',
                'marianogmarini@gmail.com',
                'bonafeanita@hotmail.com',
                'joseluislemme@yahoo.com.ar',
                'sil-aguilera@hotmail.com',
                'nannisjordan@hotmail.com',
                'marce_escobar@hotmail.com',
                'roberto.beaudroit@novartis.com',
                'patifp@yahoo.es',
                'jennaslk@yahoo.com',
                'nnkogan@yahoo.com.ar',
                'carolipc@hotmail.com',
                'marcela.lustia@gmail.com',
                'monicaavallejo26@gmail.com',
                'monicavquaini@gmail.com',
                'dramera_valeria@hotmail.com',
                'emaramendia@gmail.com',
                'drpiccirilli@gmail.com',
                'Danielasabb@hotmail.com',
                'pablorussopiel@gmail.com',
                'antobefani@hotmail.com',
                'mergomezcarril@hotmail.com'
            ];
            

            /*$registrados = [
                'lucasgrzina@gmail.com',
                'guido@quimicaeventos.com',
                'guidoblarasin@gmail.com'
            ];*/

            $imagen = 'https://quimicavirtualeventss.com/img/dermatalks/mailing_3.jpg';
         
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