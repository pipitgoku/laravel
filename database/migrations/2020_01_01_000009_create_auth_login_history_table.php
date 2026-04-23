<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthLoginHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('login_history', function (Blueprint $table) {
            $table->bigIncrements('login_history_id');
            $table->string('user_id',20);
            $table->timestamp('datetime_login')->useCurrent();
            $table->timestamp('datetime_logout')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->macAddress('mac_address')->nullable();
			$table->string('created_id',20)->nullable();
            $table->string('updated_id',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('login_history');
    }
}
