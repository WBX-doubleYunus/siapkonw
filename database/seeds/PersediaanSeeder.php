<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Persediaan;
use App\DetailPersediaan;
use Carbon\Carbon;

class PersediaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persediaan::insert([
            'nama_barang' => 'Batu Bata',
            'tanggal_masuk' => Carbon::create('2021', '10', '14'),
            'jumlah' => 500
        ]);

        DetailPersediaan::insert([
            'persediaan_id' => 1,
            'jumlah_awal' => 0,
            'jumlah_akhir' => 500
        ]);
    }
}
