<?php
//app/Helpers/Envato/User.php
namespace App\Helpers;
 
class EventosHelper {

    public static function combo() 
    {
        $options = [];
        $eventos = config('constantes.eventos',[]);
        foreach ($eventos as $key => $data) {
            if (AdminHelper::mostrarMenu($key)) {
                $options[] = [
                    'id' => $key,
                    'name' => $data['nombre'],
                    'activo' => $data['activo']
                ];
            }
        }

        return collect($options)->sortByDesc('activo')->values()->all();
    }
    
}