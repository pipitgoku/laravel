<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\User;

$factory->define(User::class, function (Faker $faker) {
    return [
		'user_id'	=> date('y') .date('m') .str_pad($i, 8 , "0" ,STR_PAD_LEFT),
        'name' 		=> $faker->name,
        'email' 	=> $faker->unique()->safeEmail,
		'phone'		=> $faker->phoneNumber,
        'password'	=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
		'rule_tp'	=> '1111',
        'active'	=> true,
		'created_id'=> 'admin',
		'remember_token' => Str::random(10),
    ];
});