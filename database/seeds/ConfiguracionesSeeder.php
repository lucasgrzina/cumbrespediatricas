<?php

use App\Configuraciones;
use Illuminate\Database\Seeder;

class ConfiguracionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'etapa' => 'I',
            'encuesta' => false,
            'inicio_vivo' => null,
            'fin_vivo' => null
        ];

        $eventos = config('constantes.eventos',[]);

        foreach ($eventos as $evento => $dataEvento) {
            foreach($data as $clave => $valor) {
                if(!Configuraciones::whereClave($clave)->whereEvento($evento)->first()) {
                    Configuraciones::create([
                        'clave' => $clave,
                        'valor' => $valor,
                        'evento' => $evento
                    ]);
                }                    
            }
        }
    }
}
