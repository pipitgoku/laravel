<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthRoleMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('role_menus', function (Blueprint $table) {
            $table->string('role_cd',20);
            $table->string('menu_cd',20);
            $table->string('created_id',20)->nullable();
            $table->string('updated_id',20)->nullable();
            $table->timestamps();
            $table->primary(['menu_cd', 'role_cd']);
            
            $table->foreign('menu_cd')
            ->references('menu_cd')->on('menus')
            ->onDelete('cascade');

            $table->foreign('role_cd')
            ->references('role_cd')->on('roles')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('role_menus');
    }
}
