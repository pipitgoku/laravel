<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTahunBulanColumnComTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('com_test', function (Blueprint $table) {
            $table->integer('tahun')->nullable();
			$table->integer('bulan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('com_test', function (Blueprint $table) {
            $table->dropColumn('tahun');
			$table->dropColumn('bulan');
        });
    }
}
