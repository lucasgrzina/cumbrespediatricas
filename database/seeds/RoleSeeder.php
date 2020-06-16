<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->truncate();
        \DB::table('model_has_roles')->truncate();
        /*\DB::table('model_has_permissions')->truncate();*/
        \DB::table('role_has_permissions')->truncate();

        $items = [
            [1,'Superadmin',1],
            [2,'Tester',1],
        ];

        foreach ($items as $item) 
        {
            Role::create([
                'guard_name' => 'admin',
                'name' => $item[1],
                'id' => $item[0],
                'enabled' => $item[2],
            ]);
        }
       	
    }
}
