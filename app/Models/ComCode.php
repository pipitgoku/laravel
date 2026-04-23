<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class ComCode extends Model{
    protected $table        = 'com_code';
	private static $tableName   = 'com_code';
    protected $primaryKey   = 'com_cd'; 
    public $incrementing    = false;

    protected $fillable = [
        'com_cd', 'code_nm', 'code_group','code_value','created_id', 'updated_id'
    ];

    public static function getComCd($codeGroup){
        $code = ComCode::where('code_group', $codeGroup)->count();

        return $codeGroup.'_'.str_pad($code + 1 , 2 , "0" ,STR_PAD_LEFT);
    }
	
	public static function getCodeGroup($codeGroup){
		$data = DB::table(Self::$tableName.' as A')
			->where('A.code_group',$codeGroup)
			->select('A.com_cd','A.code_nm','A.code_group','A.code_value')
			->orderBy('A.com_cd')
			->distinct();
        
		return $data;
    }
	
	public static function getAllGroup(){
		$data = DB::table(Self::$tableName)->distinct()->get(['code_group']);
		
		return $data;
		
		/*$query = DB::table(Self::$tableName.' as A')
			->select('A.code_group')
			->orderBy('A.com_cd')
			->distinct();
			
		return $query->get();*/
    }
	
	public static function getAllData(){
		$data = DB::table(Self::$tableName)->get(['com_cd','code_nm']);
		
		return $data;
    }
}
