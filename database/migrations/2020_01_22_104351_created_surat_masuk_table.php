<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedSuratMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_user')->nullable();
            $table->string('dari');
            $table->string('no_surat')->unique();
            $table->string('diteruskan')->nullable();
            $table->string('status')->nullable();
            $table->string('indeks');
            $table->string('perihal');
            $table->date('tanggal_masuk');
            $table->date('tanggal_diteruskan');
            $table->string('sifat_surat');
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
        Schema::dropIfExists('surat_masuk');
    }
}
