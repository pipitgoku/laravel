<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComNation extends Model{
    protected $table        = 'com_nation';
	protected $primaryKey   = 'nation_cd'; 
    public $incrementing    = false;

    protected $fillable = [
        'nation_cd', 'nation_nm', 'capital','created_id', 'updated_id'
    ];
	
	public static function getNationList($param=NULL){
		$query = ComNation::select("nation_cd as id", "nation_nm as text")
					->where("nation_nm", "LIKE", "%$param%")
					->orderBy("nation_nm");
					
        $query->limit(100);
        
        return $query->get();
    }
}
