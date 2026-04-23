<?php

use Illuminate\Database\Seeder;

class RoleUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role_users')->delete();
        
        \DB::table('role_users')->insert(array (
            0 => 
            array (
                'role_cd' => 'admin',
                'user_id' => 'admin',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}