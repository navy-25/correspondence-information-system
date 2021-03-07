<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat_masuk extends Model
{
    protected $table = 'surat_masuk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'dari', 
        'no_surat', 
        'diteruskan',
        'indeks', 
        'perihal', 
        'tanggal_masuk', 
        'status', 
        'tanggal_diteruskan', 
        'perihal', 
        'sifat_surat', 
        'klasifikasi_surat',
        'isi_ringkas',
        'catatan',
    ];
   
}
