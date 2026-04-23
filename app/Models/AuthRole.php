<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthRole extends Model{
    protected $table        = 'roles';
    protected $primaryKey   = 'role_cd'; 
    public $incrementing    = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'role_cd', 'role_nm','rule_tp','created_id','updated_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
