<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComTest extends Model{
    protected $table        = 'com_test';
	protected $primaryKey   = 'test_cd'; 
    public $incrementing    = false;
}
