<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lampiran_surat_perintah extends Model
{
    protected $table = 'lampiran_surat_perintah';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_surat',
        'lampiran',
    ];
    public function getLampiran(){      
        return asset('file/surat_perintah/lampiran/'.$this->lampiran);
    }
}
