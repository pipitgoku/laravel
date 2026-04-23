<?php

use Illuminate\Database\Seeder;
use App\Models\ComCode;

class ComCodeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        /* \DB::table('com_code')->delete();
        
        \DB::table('com_code')->insert(array (
            0 => 
            array (
                'com_cd' => 'GENDER_TP_01',
                'code_nm' => 'Laki-Laki',
                'code_group' => 'GENDER_TP',
                'code_value' => 'NULL',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'com_cd' => 'GENDER_TP_02',
                'code_nm' => 'Perempuan',
                'code_group' => 'GENDER_TP',
                'code_value' => 'NULL',
                'created_id' => 'admin',
                'updated_id' => NULL,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL,
            ),
        )); */
        
        ComCode::truncate();

        ComCode::insert([
            /*--DAY_TP--*/
            ["com_cd" => "DAY_TP_01","code_nm"=>"Senin",    "code_group" => "DAY_TP","code_value" => "Monday","created_id"=>"admin","created_at" => date("Y-m-d H:i:s")],
            ["com_cd" => "DAY_TP_02","code_nm"=>"Selasa",   "code_group" => "DAY_TP","code_value" => "Tuesday","created_id"=>"admin","created_at" => date("Y-m-d H:i:s")],
            ["com_cd" => "DAY_TP_03","code_nm"=>"Rabu",     "code_group" => "DAY_TP","code_value" => "Wednesday","created_id"=>"admin","created_at" => date("Y-m-d H:i:s")],
            ["com_cd" => "DAY_TP_04","code_nm"=>"Kamis",    "code_group" => "DAY_TP","code_value" => "Thursday","created_id"=>"admin","created_at" => date("Y-m-d H:i:s")],
            ["com_cd" => "DAY_TP_05","code_nm"=>"Jumat",    "code_group" => "DAY_TP","code_value" => "Friday","created_id"=>"admin","created_at" => date("Y-m-d H:i:s")],
            ["com_cd" => "DAY_TP_06","code_nm"=>"Sabtu",    "code_group" => "DAY_TP","code_value" => "Saturday","created_id"=>"admin","created_at" => date("Y-m-d H:i:s")],
            ["com_cd" => "DAY_TP_07","code_nm"=>"Minggu",   "code_group" => "DAY_TP","code_value" => "Sunday","created_id"=>"admin","created_at" => date("Y-m-d H:i:s")],
			
			/*--IDENTITY_TP--*/
            [ "com_cd" => "ID_TP_1", "code_nm" => "KTP", "code_group" => "IDENTITY_TP","code_value" => "", "created_id" => "admin", "created_at" => date("Y-m-d H:i:s")],
            [ "com_cd" => "ID_TP_2", "code_nm" => "KK", "code_group" => "IDENTITY_TP","code_value" => "", "created_id" => "admin", "created_at" => date("Y-m-d H:i:s")],
            [ "com_cd" => "ID_TP_3", "code_nm" => "SIM", "code_group" => "IDENTITY_TP","code_value" => "", "created_id" => "admin", "created_at" => date("Y-m-d H:i:s")],
            [ "com_cd" => "ID_TP_4", "code_nm" => "Paspor", "code_group" => "IDENTITY_TP","code_value" => "", "created_id" => "admin", "created_at" => date("Y-m-d H:i:s")],
            [ "com_cd" => "ID_TP_5", "code_nm" => "KITAS", "code_group" => "IDENTITY_TP","code_value" => "", "created_id" => "admin", "created_at" => date("Y-m-d H:i:s")],

            /*--GENDER_TP--*/
            /*["com_cd" => "GENDER_TP_01","code_nm"=>"Laki-Laki", "code_group" => "GENDER_TP","code_value" => NULL,"created_id"=>"admin","created_at" => date("Y-m-d H:i:s")],
            ["com_cd" => "GENDER_TP_02","code_nm"=>"Perempuan", "code_group" => "GENDER_TP","code_value" => NULL,"created_id"=>"admin","created_at" => date("Y-m-d H:i:s")],*/
        ]);
    }
}