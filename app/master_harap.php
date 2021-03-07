<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_harap extends Model
{
    protected $table = 'master_harap';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_harap', 
    ];
}
