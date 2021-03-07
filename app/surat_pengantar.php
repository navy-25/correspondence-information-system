<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat_pengantar extends Model
{
    protected $table = 'surat_pengantar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'tujuan',
        'no_surat', 
        'perihal', 
        'status', 
        'tanggal_keluar', 
        'tanggal_diteruskan',
        'klasifikasi_surat',
        'isi_ringkas',
        'catatan',
    ];

}