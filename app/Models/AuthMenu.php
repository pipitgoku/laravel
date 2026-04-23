<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class AuthMenu extends Model{
    protected $table            = 'menus';
    protected Static $tableName = 'menus';
    protected $primaryKey       = 'menu_cd'; 
    public $incrementing        = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_cd',
        'menu_nm',
        'menu_url',
        'menu_no',
        'menu_level',
        'menu_root',
        'menu_image', 
        'created_id',
        'updated_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function childMenu(){
        return $this->hasMany('App\Models\Menu', 'menu_root', 'menu_cd');
    }

    public function roleMenu(){
        return $this->hasMany('App\Models\RoleMenu', 'menu_cd', 'menu_cd');
    }

    public static function getUserMenu($id, $url=NULL){
        $query = DB::table(Self::$tableName.' as menu')
                ->join('role_menus as rm','rm.menu_cd','=','menu.menu_cd')
                ->join('role_users as ru','ru.role_cd','=','rm.role_cd')
                ->where('ru.user_id',$id)
                ->select('menu.menu_cd','menu_nm','menu_root','menu_level','menu_no','menu_url', 'menu_image')
                ->orderBy('menu_no')
                ->distinct();

        if ($url != '' || $url != NULL) {
            $query = $query->where('menu.menu_url','=',$url);
        }

        return $query->get();
    }
}
