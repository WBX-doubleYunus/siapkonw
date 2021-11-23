<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pekerja extends Model
{
    use SoftDeletes;
    protected $table = 'pekerja';
    protected $fillable = [
        'nama',
        'telepon',
        'alamat',
    ];
}
