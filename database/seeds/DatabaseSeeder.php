<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ConfigurationsTableSeeder::class);
        $this->call(ComCodeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(RoleUsersSeeder::class);
        $this->call(RoleMenusTableSeeder::class);
        $this->call(RoleUsersTableSeeder::class);
		
		//$this->call(ComRegionTableSeeder::class);
		//php artisan db:seed --class=ComRegionTableSeeder
    }
}
