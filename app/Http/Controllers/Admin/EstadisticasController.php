<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use Carbon\Carbon;
use App\Registrado;
use App\Configuraciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AppBaseController;

class EstadisticasController extends AppBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = $this->config('*');

        $inicioVivo = $config['inicio_vivo'];
        $minuto5Vivo = Carbon::createFromFormat('Y-m-d H:i:s',$inicioVivo)->addMinutes(5)->format('Y-m-d H:i:s');
        $finVivo = $config['fin_vivo']; 
        
        if ($finVivo) {
            $noTermino = false;
            $desdeNulo = $finVivo; 
        } else {
            $noTermino = true;
            $desdeNulo = Carbon::now()->addYears(1)->addDays(-1)->format('Y-m-d H:i:s');
            $finVivo = Carbon::now()->addYears(1)->format('Y-m-d H:i:s');

        }


        $sqlCantDespMinuto5 = "SELECT COUNT(*) total
        FROM registrados r
        INNER JOIN (
        SELECT registrado_id,MIN(desde) desde,MAX(IFNULL(hasta,'{$desdeNulo}')) hasta,SUM(IF(hasta IS NULL,1,0)) hasta_null
        FROM registrados_acciones 
        GROUP BY registrado_id 
        ) aux ON r.id = aux.registrado_id
        WHERE desde <= '{$inicioVivo}' and hasta > '{$minuto5Vivo}' 
        ORDER BY desde";

        $sqlCantFinal = "SELECT COUNT(*) total, SUM(IF(e.id IS NULL,1,0)) sin_enc, SUM(IF(e.id IS NULL,0,1)) con_enc
        FROM registrados r
        INNER JOIN (
        SELECT registrado_id,MIN(desde) desde,MAX(IFNULL(hasta,'{$desdeNulo}')) hasta,SUM(IF(hasta IS NULL,1,0)) hasta_null
        FROM registrados_acciones 
        GROUP BY registrado_id 
        ) aux ON r.id = aux.registrado_id
        LEFT JOIN encuestas e ON r.id = e.registrado_id
        WHERE desde <= '{$inicioVivo}' and hasta >= '{$finVivo}'
        ORDER BY desde";



        $cantDespMinuto5 = DB::select($sqlCantDespMinuto5);
        $cantFinal = DB::select($sqlCantFinal);
        \Log::info($sqlCantDespMinuto5);
        \Log::info($sqlCantFinal);
        

        //\Log::info([$inicioVivo,$minuto5Vivo,$finVivo]);

        $data = [
            'config' => $config,
            'estadisticas' => [
                'total' => Registrado::whereNotNull('id_externo')->count(),
                'totalFin' => $cantFinal[0]->total,
                'totalFinSinEnc' => $cantFinal[0]->sin_enc, 
                'totalFinConEnc' => $cantFinal[0]->con_enc, 
                'totalMin5' => $cantDespMinuto5[0]->total
            ],
            'url_save' => route('admin.home.guardar')
        ];
        return view('admin.estadisticas',['data' => $data]);
    }

    protected function config($clave='*') {
        if ($clave === '*') {
            return Configuraciones::pluck('valor','clave');
        } else {
            return Configuraciones::whereClave($clave)->first()->valor;    
        }
    }

    
    public function unauthorized()
    {
        return view('admin.unauthorized');
    }    

    
}
