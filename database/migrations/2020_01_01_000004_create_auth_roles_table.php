<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('roles', function (Blueprint $table) {
            $table->string('role_cd',20);
            $table->string('role_nm',100);
            $table->string('rule_tp',20);
            $table->string('created_id',20)->nullable();
            $table->string('updated_id',20)->nullable();
            $table->timestamps();
            $table->primary('role_cd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('roles');
    }
}
