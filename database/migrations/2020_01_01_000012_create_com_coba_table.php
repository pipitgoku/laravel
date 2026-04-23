<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComCobaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('com_coba', function (Blueprint $table) {
            $table->string('kolom_1',20);
            $table->string('kolom_2',100);
			$table->integer('kolom_3');
            $table->string('data_1',500)->nullable();
			$table->decimal('data_2',10,2)->nullable();
			$table->string('data_3')->nullable();
			$table->datetime('tanggal')->nullable();
            $table->string('created_id',20)->nullable();
            $table->string('updated_id', 20)->nullable();
            $table->timestamps();

            $table->primary('kolom_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('com_coba');
    }
}
