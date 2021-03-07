<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ptsp extends Model
{
    protected $table = 'ptsp';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 
        'instansi', 
        'keperluan', 
        'tujuan', 
        'blangko', 
        'tindak_lanjut_bidang', 
        'tanggal_masuk',
        'nik',
        'alamat',
        'telepon',
        'email',
        'foto',
    ];
    public function getBlangko(){      
        return asset('file/blangko/'.$this->blangko);
    }
    public function getTLB(){      
        return asset('file/tindak_lanjut_bidang/'.$this->tindak_lanjut_bidang);
    }
    public function getFoto(){      
        return asset('file/foto/'.$this->foto);
    }
}
