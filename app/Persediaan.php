<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persediaan extends Model
{
    use SoftDeletes;
    protected $table = 'persediaan';
    protected $fillable = [
        'nama_barang',
        'tanggal_masuk',
        'jumlah'
    ];
}
