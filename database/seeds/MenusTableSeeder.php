<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'menu_cd' => 'SYS',
                'menu_nm' => 'Sistem',
                'menu_no' => '01',
                'menu_root' => '',
                'menu_level' => 1,
                'menu_url' => '#',
                'menu_image' => 'icon-cog2',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'menu_cd' => 'SYS01',
                'menu_nm' => 'User',
                'menu_no' => '0101',
                'menu_root' => 'SYS',
                'menu_level' => 2,
                'menu_url' => 'sistem/user',
                'menu_image' => '',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'menu_cd' => 'SYS02',
                'menu_nm' => 'Autorisasi',
                'menu_no' => '0102',
                'menu_root' => 'SYS',
                'menu_level' => 2,
                'menu_url' => 'sistem/autorisasi',
                'menu_image' => '',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'menu_cd' => 'SYS03',
                'menu_nm' => 'Kode',
                'menu_no' => '0103',
                'menu_root' => 'SYS',
                'menu_level' => 2,
                'menu_url' => 'sistem/kode',
                'menu_image' => '',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
			4 => 
            array (
                'menu_cd' => 'MST',
                'menu_nm' => 'Data',
                'menu_no' => '02',
                'menu_root' => '',
                'menu_level' => 1,
                'menu_url' => '',
                'menu_image' => 'icon-stack3',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}