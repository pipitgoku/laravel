<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('configurations', function (Blueprint $table) {
            $table->string('configuration_cd',20);
            $table->string('configuration_nm',100);
            $table->string('configuration_group',20);
            $table->string('configuration_value',100)->nullable();
            $table->string('created_id',20)->nullable();
            $table->string('updated_id',20)->nullable();
            $table->timestamps();
            $table->primary(['configuration_cd']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('configurations');
    }
}
