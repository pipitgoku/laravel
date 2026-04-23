<?php

use Illuminate\Database\Seeder;

class RoleMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role_menus')->delete();
        
        \DB::table('role_menus')->insert(array (
            0 => 
            array (
                'role_cd' => 'admin',
                'menu_cd' => 'SYS',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'role_cd' => 'admin',
                'menu_cd' => 'SYS01',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'role_cd' => 'admin',
                'menu_cd' => 'SYS02',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}