<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('role_users', function (Blueprint $table) {
            $table->string('role_cd',20);
            $table->string('user_id',20);
            $table->string('created_id',20)->nullable();
            $table->string('updated_id',20)->nullable();
            $table->timestamps();
            $table->primary(['user_id', 'role_cd']);
            
            $table->foreign('user_id')
            ->references('user_id')->on('users')
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
        Schema::dropIfExists('role_users');
    }
}
