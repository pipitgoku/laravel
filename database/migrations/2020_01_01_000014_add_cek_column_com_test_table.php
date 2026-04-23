<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCekColumnComTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('com_test', function (Blueprint $table) {
            $table->string('cek',20)->nullable()->after('test_nm');
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
            $table->dropColumn('cek');
        });
    }
}
