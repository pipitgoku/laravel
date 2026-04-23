<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('com_test', function (Blueprint $table) {
            $table->string('test_cd',20);
            $table->string('test_nm',100);
            $table->string('created_id',20)->nullable();
            $table->string('updated_id', 20)->nullable();
            $table->timestamps();

            $table->primary('test_cd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('com_test');
    }
}
