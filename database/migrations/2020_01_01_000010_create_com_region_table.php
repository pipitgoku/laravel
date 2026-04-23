<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_region', function (Blueprint $table) {
            $table->string('region_cd',20);
            $table->string('region_nm',100);
            $table->string('region_root',20)->nullable();
            $table->string('region_capital',100)->nullable();
            $table->integer('region_level')->nullable();
            $table->char('default_st',1)->default('0');
            $table->string('region_tp',20)->nullable();
            $table->string('created_id',20)->nullable();
			$table->string('updated_id', 20)->nullable();
            $table->timestamps();

            $table->primary('region_cd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('com_region');
    }
}
