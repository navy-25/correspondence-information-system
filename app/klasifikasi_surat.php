<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class klasifikasi_surat extends Model
{
    protected $table = 'klasifikasi_surat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_klasifikasi',
        'nama_klasifikasi', 
    ];
}
