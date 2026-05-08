<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->integer('mahasiswa_id', true)->primary(); //--true = auto number
            $table->string('mahasiswa_nm',100);
            $table->string('nim',100)->nullable();
			$table->string('nik',30)->unique();
			$table->string('alamat',200);
			$table->string('telepon',20)->nullable();
			$table->string('email',100)->unique();
			$table->datetime('tanggal_lahir')->nullable();
			$table->string('gender',2)->nullable();
			$table->decimal('amount',15,2)->nullable();
            $table->string('created_id',20)->nullable();
            $table->string('updated_id', 20)->nullable();
            $table->timestamps();

            // $table->primary('mahasiswa_id');
			
			/* $table->foreign('region_cd')
			->references('region_cd')
			->on('region')
			->onUpdate('CASCADE')
            ->onDelete('CASCADE'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
