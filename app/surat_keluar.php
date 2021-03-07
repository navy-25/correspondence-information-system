<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat_keluar extends Model
{
    protected $table = 'surat_keluar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'no_surat',
        'tujuan',
        'indeks', 
        'perihal', 
        'status', 
        'tanggal_keluar', 
        'tanggal_diteruskan',
        'klasifikasi_surat',
        'isi_ringkas',
        'catatan',
    ];

}