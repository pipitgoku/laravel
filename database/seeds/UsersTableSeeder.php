<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'user_id' => 'admin',
                'user_nm' => 'Administrator',
                'email' => 'admin@mail.com',
                'phone' => '',
                'password' => '$2y$10$JafDMyGGK6/zv5drxJss1uvF39mojh3/KHYg8eQtBLjCeYyvdZ.hS',
                'image' => NULL,
                'rule_tp' => '1111',
                'active' => 1,
                'remember_token' => NULL,
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}