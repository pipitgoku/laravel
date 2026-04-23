<?php

use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('configurations')->delete();
        
        \DB::table('configurations')->insert(array (
            0 => 
            array (
                'configuration_cd' => 'APP_DESC',
                'configuration_nm' => 'Deskripsi Aplikasi',
                'configuration_group' => 'APP_CD',
                'configuration_value' => 'MASTER APP DESC',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'configuration_cd' => 'APP_NAME',
                'configuration_nm' => 'Nama Aplikasi',
                'configuration_group' => 'APP_CD',
                'configuration_value' => 'MASTER',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'configuration_cd' => 'INST_LOGO',
                'configuration_nm' => 'Logo Organisasi',
                'configuration_group' => 'APP_CD',
                'configuration_value' => 'images/logo.png',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'configuration_cd' => 'INST_NAME',
                'configuration_nm' => 'Nama Organisasi',
                'configuration_group' => 'APP_CD',
                'configuration_value' => 'ORGANISASI',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
			4 => 
            array (
                'configuration_cd' => 'DEFAULT_REGION1',
                'configuration_nm' => 'Default Region 1',
                'configuration_group' => 'APP_CD',
                'configuration_value' => '31',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'configuration_cd' => 'DEFAULT_REGION2',
                'configuration_nm' => 'Default Region 2',
                'configuration_group' => 'APP_CD',
                'configuration_value' => '',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
			6 => 
            array (
                'configuration_cd' => 'DEFAULT_REGION3',
                'configuration_nm' => 'Default Region 3',
                'configuration_group' => 'APP_CD',
                'configuration_value' => '',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
			7 => 
            array (
                'configuration_cd' => 'DEFAULT_REGION4',
                'configuration_nm' => 'Default Region 4',
                'configuration_group' => 'APP_CD',
                'configuration_value' => '',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            )
        ));
        
        
    }
}