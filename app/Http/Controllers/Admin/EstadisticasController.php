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
        $minuto5Vivo = Carbon::createFromFormat('Y-m-d H:i:s',$inicioVivo)->addMinutes(10)->format('Y-m-d H:i:s');
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
        //\Log::info($sqlCantDespMinuto5);
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

    public function analizar() {

        $config = $this->config('*');
        $finVivo = Carbon::createFromFormat('Y-m-d H:i:s',$config['fin_vivo']);


        $conEncuestasSinFechaHasta = DB::select("SELECT aux.registrado_id,desde, max_desde,hasta,hasta_null,COUNT(e.registrado_id) cant_encuestas,DATE_ADD(MAX(e.created_at),INTERVAL 3 HOUR) ult_encuesta
        FROM (
        SELECT a.registrado_id,MIN(desde) desde,MAX(desde) max_desde,MAX(hasta) hasta,SUM(IF(hasta IS NULL,1,0)) hasta_null
                FROM registrados_acciones a
                WHERE desde > '2020-08-08 09:00:00' 
                GROUP BY a.registrado_id 
                /*having MAX(hasta) is null and SUM(IF(hasta IS NULL,1,0)) > 0*/
                ORDER BY SUM(IF(hasta IS NULL,1,0)) DESC,MIN(desde)
        ) aux 
        LEFT JOIN encuestas e ON aux.registrado_id = e.registrado_id
        WHERE hasta IS NULL
        GROUP BY aux.registrado_id 
        
        HAVING DATE_ADD(MAX(e.created_at),INTERVAL 3 HOUR) IS NOT NULL
        ORDER BY max_desde DESC");

            $data = [];

        foreach ($conEncuestasSinFechaHasta as $k => $item) {
            $maxDesde = Carbon::createFromFormat('Y-m-d H:i:s',$item->max_desde);

            if ($maxDesde->gt($item->ult_encuesta)) {
                //Fecha max_desde es mayor a la de la ult encuesta del usuario
                $hasta = $maxDesde->format('Y-m-d H:i:s');
            } else {
                if ($finVivo->gt($item->ult_encuesta)) {
                    //Si contesto la encuesta antes que termine el evento, sumo unos minutos
                    $minutos = rand(4,25);
                } else {
                    // Guardo la fecha de ultima encuesta
                    $minutos = 1;
                }

                $hasta = Carbon::createFromFormat('Y-m-d H:i:s',$item->ult_encuesta)->addMinutes($minutos)->format('Y-m-d H:i:s');


            }
            
            
            // Actualizo la fecha hasta con la fecha de ult encuesta + minutos
                
                
                
            $primerHastaNull = Registrado::find($item->registrado_id)->acciones()->whereNull('hasta')->orderBy('id')->first();
            if ($primerHastaNull) {
                $primerHastaNull->hasta = $hasta;
                $primerHastaNull->save();
                $data[] = ['registrado_id' => $item->registrado_id,'desde' => $item->desde, 'hasta' => $hasta, 'ult_encuesta' => $item->ult_encuesta, 'fin' => $finVivo->format('Y-m-d H:i:s')];
            } 
        }


        /*$data = Registrado::whereHas('encuestas', function ($q) {
            $q->latest()->limit(1);
        })->count();*/

        return response()->json($data);


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
