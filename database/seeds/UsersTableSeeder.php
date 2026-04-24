<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\AuthUser;

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
		
		// AuthUser::truncate();
		/* $faker = DB::transaction(function () { 
            $faker = Faker::create('id_ID');
			
            for($i = 1; $i <= 10; $i++){
                AuthUser::create([
					'user_id'     	=> date('y') .date('m') .str_pad($i, 8 , "0" ,STR_PAD_LEFT),
                    'user_nm'     	=> $faker->name ,
                    'email'         => $faker->email,
                    'phone'        	=> $faker->phoneNumber,
                    'password'    	=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
                    'rule_tp'      	=> '1111',
                    'active'       	=> true,
                    'created_id' 	=> 'admin',
                ]);
            }
        }); */
    }
}