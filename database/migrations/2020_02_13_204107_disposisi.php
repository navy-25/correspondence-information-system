<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Disposisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_jenis_surat')->nullable();
            $table->string('id_surat');
            $table->string('harap');
            $table->string('pegawai_yang_tunjuk');
            $table->string('catatan_admin_tu')->nullable();
            $table->string('catatan_admin_kepala')->nullable();
            $table->string('verifikasi');
            $table->string('tanggal_verifikasi');
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
        Schema::dropIfExists('disposisi');
    }
}
