<?php

namespace App\Http\Controllers\Front;


use App\Encuestas;
use App\Preguntas;
use Carbon\Carbon;
use App\Registrado;

use App\Helpers\FrontHelper;
use Illuminate\Http\Request;

use App\Http\Requests\Front\RegistrarRequest;
use App\Http\Front\Controllers\EventoBaseController;

class HomeForoSasController extends EventoBaseController
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
        $ahora = Carbon::now();
        $data = [
            'props' => [
                'ahora' => $ahora->format('Y-m-d H:i:s'),
                'segundosRestantes' => Carbon::parse('2020-10-27 18:00:00')->diffInSeconds($ahora)
            ]
        ];
        return view('front.'.$this->evento['view'].'.home-vue', $data);
        
    }
}
