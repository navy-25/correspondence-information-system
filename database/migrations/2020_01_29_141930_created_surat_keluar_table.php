<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedSuratKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_user')->nullable();
            $table->string('no_surat');
            $table->string('tujuan');
            $table->string('status')->nullable();
            $table->string('indeks');
            $table->string('perihal');
            $table->date('tanggal_keluar');
            $table->date('tanggal_diteruskan');
            $table->string('klasifikasi_surat');
            $table->text('isi_ringkas')->nullable();
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('surat_keluar');
    }
}
