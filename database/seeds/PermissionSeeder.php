<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
		/*\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('model_has_permissions')->truncate();
        \DB::table('role_has_permissions')->truncate();    	
		\DB::table('permissions')->truncate();
		\DB::statement('SET FOREIGN_KEY_CHECKS=1;');*/

        $items = [
			[1,'Usuarios',10],
			[2,'Roles y Permisos',20],
			
		];
		
		
        foreach ($items as $value) 
        {
			$groupId = $value[0];
        	if (!Permission::whereName(str_slug('ver '.$value[1]))->first())
        	{
		       	Permission::create([
		       		'guard_name' => 'admin',
		       		'name' => str_slug('ver '.$value[1]),
		       		'group_name' => $value[1],
		       		'group_id' => $groupId,
		       		'order' => $value[2],
		       		'action' => 'ver'
		       	]);
		       	Permission::create([
		       		'guard_name' => 'admin',
		       		'name' => str_slug('editar '.$value[1]),
		       		'group_name' => $value[1],
		       		'group_id' => $groupId,
		       		'order' => $value[2],
		       		'action' => 'editar'
		       	]);	       	
	        }
		}
		
		$eventos = config('constantes.eventos',[]);
		$order = 30;
		foreach ($eventos as $key => $data) {
			$groupId++;
        	if (!Permission::whereName('ver-'.$key)->first())
        	{
		       	Permission::create([
		       		'guard_name' => 'admin',
		       		'name' => 'ver-'.$key,
		       		'group_name' => $data['nombre'],
		       		'group_id' => $groupId,
		       		'order' => $order,
		       		'action' => 'ver'
		       	]);
		       	Permission::create([
					'guard_name' => 'admin',
					'name' => 'editar-'.$key,
					'group_name' => $data['nombre'],
					'group_id' => $groupId,
					'order' => $order,
					'action' => 'editar'
				]);	        
			}
			$order++;
		}

    }
}
