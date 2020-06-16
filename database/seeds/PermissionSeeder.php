<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        \DB::table('model_has_permissions')->truncate();
        \DB::table('role_has_permissions')->truncate();    	
        \DB::table('permissions')->truncate();

        $items = [
			[1,'Usuarios',10],
			[2,'Roles y Permisos',20],
			[3,'Categorias',30],
			[4,'Secciones',40],
			[5,'Productos',50],
        ];

        foreach ($items as $value) 
        {
        	if (!Permission::whereName('ver '.$value[1])->first())
        	{
		       	Permission::create([
		       		'guard_name' => 'admin',
		       		'name' => str_slug('ver '.$value[1]),
		       		'group_name' => $value[1],
		       		'group_id' => $value[0],
		       		'order' => $value[2],
		       		'action' => 'ver'
		       	]);
		       	Permission::create([
		       		'guard_name' => 'admin',
		       		'name' => str_slug('editar '.$value[1]),
		       		'group_name' => $value[1],
		       		'group_id' => $value[0],
		       		'order' => $value[2],
		       		'action' => 'editar'
		       	]);	       	
	        }
        }
    }
}
