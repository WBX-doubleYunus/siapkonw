<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPersediaan extends Model
{
    protected $table = 'detail_persediaan';
    protected $fillable = [
        'persediaan_id',
        'jumlah_awal',
        'jumlah_akhir'
    ];
}
