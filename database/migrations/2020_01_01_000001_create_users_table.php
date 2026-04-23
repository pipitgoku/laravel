<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id',20)->primary();
            $table->string('user_nm',100);
            $table->string('email',100)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('password',100);
            $table->string('image',100)->nullable();
            $table->string('rule_tp',20)->default('1111');
            $table->boolean('active')->default(true);
            $table->string('created_id',20)->nullable();
            $table->string('updated_id',20)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
