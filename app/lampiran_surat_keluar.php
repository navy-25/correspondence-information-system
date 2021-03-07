<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lampiran_surat_keluar extends Model
{
    protected $table = 'lampiran_surat_keluar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_surat',
        'lampiran',
    ];
    public function getLampiran(){      
        return asset('file/surat_keluar/lampiran/'.$this->lampiran);
    }
}