<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailAgenda extends Model
{
    protected $table = 'detail_agenda';
    protected $fillable = [
        'agenda_id',
        'pekerja_id',
        'persediaan_id',
        'jumlah_barang',
    ];
}
