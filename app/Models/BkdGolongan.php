<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BkdGolongan extends Model{
    protected $table        = 'bkd_golongan';
	protected $primaryKey   = 'golongan_id'; 
    public $incrementing    = false;
}
