<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sifat_surat extends Model
{
    protected $table = 'sifat_surat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_sifat_surat', 
    ];
}
