<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persediaan;
use App\DetailPersediaan;

class PersediaanController extends Controller
{
    public function index()
    {
        $data = Persediaan::all();
        return view ('persediaan.index', compact('data'));
    }

    public function create()
    {
        return view('persediaan.create');
    }

    public function store(Request $request)
    {
        Persediaan::create([
            'nama_barang' => $request->nama_barang,
            'tanggal_masuk' => $request->tanggal_masuk,
            'jumlah' => $request->jumlah,
        ]);

        DetailPersediaan::create([
            'persediaan_id' => $request->persediaan_id,
            'jumlah_awal' => 0,
            'jumlah_akhir' => $request->jumlah,
        ]);
        return redirect('/persediaan')->with('success','Data Persediaan berhasil ditambah!');
    }

    public function edit($id)
    {
        $data = Persediaan::select('id','nama_barang','tanggal_masuk','jumlah')->where('id', $id)->first();
        return view('persediaan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Persediaan::where('id', $id)->update([
            'nama_barang' => $request->nama_barang,
            'tanggal_masuk' => $request->tanggal_masuk,
            'jumlah' => $request->jumlah,
        ]);

        $input = DetailPersediaan::select('id','persediaan_id', 'jumlah_akhir')->where('persediaan_id', $id)->orderBy('id', 'desc')->first();
        $persediaan_id = $input['persediaan_id'];
        $jumlah_awal = $input['jumlah_akhir'];
        $detail_data = DetailPersediaan::where('persediaan_id', $id)->create([
            'persediaan_id' => $persediaan_id,
            'jumlah_awal' => $jumlah_awal,
            'jumlah_akhir' => $request->jumlah
        ]);

        return redirect ('/persediaan')->with('success','Data Persediaan berhasil diubah!');
    }

    public function delete($id)
    {
        $persediaan = DetailPersediaan::where('persediaan_id', $id);
        $persediaan->delete();
        $data = Persediaan::find($id);
        $data->delete();

        return redirect('/persediaan');
    }
}
