<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BkdJabatan extends Model{
    protected $table        = 'bkd_jabatan';
	protected $primaryKey   = 'jabatan_id'; 
    public $incrementing    = false;
}
