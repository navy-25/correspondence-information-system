<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedPtspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptsp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('instansi');
            $table->string('nik');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('email');
            $table->text('keperluan')->nullable();
            $table->string('tujuan');
            $table->date('tanggal_masuk');
            $table->string('foto')->nullable();
            $table->string('blangko')->nullable();
            $table->string('tindak_lanjut_bidang')->nullable();
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
        Schema::dropIfExists('ptsp');
    }
}
