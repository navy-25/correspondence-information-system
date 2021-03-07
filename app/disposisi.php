<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class disposisi extends Model
{
    protected $table = 'disposisi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_jenis_surat',
        'id_surat',
        'harap',
        'ttd',
        'pegawai_yang_tunjuk', 
        'catatan_admin_tu', 
        'catatan_admin_kepala', 
        'verifikasi', 
        'tanggal_verifikasi', 
    ];
  
}
