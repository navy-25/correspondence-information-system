<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lampiran_surat_pengantar extends Model
{
    protected $table = 'lampiran_surat_pengantar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_surat',
        'lampiran',
    ];
    public function getLampiran(){      
        return asset('file/surat_pengantar/lampiran/'.$this->lampiran);
    }
}
