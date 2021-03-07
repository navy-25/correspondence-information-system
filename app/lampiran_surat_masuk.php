<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lampiran_surat_masuk extends Model
{
    protected $table = 'lampiran_surat_masuk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_surat',
        'lampiran',
    ];
    public function getLampiran(){      
        return asset('file/surat_masuk/lampiran/'.$this->lampiran);
    }
}
