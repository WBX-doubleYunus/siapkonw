<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pekerja;

class PekerjaController extends Controller
{
    public function index()
    {
        $data = Pekerja::all();
        return view ('pekerja.index', compact('data'));
    }

    public function create()
    {
        return view('pekerja.create');
    }

    public function store(Request $request)
    {
        Pekerja::create([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);
        return redirect('/pekerja')->with('success','Data Pekerja berhasil ditambah!');
    }

    public function edit($id)
    {
        $data = Pekerja::select('id','nama','telepon','alamat')->where('id', $id)->first();
        return view('pekerja.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Pekerja::where('id', $id)->update([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect ('/pekerja')->with('success','Data Pekerja berhasil diubah!');
    }

    public function delete($id)
    {
        $data = Pekerja::find($id);
        $data->delete();

        return redirect('/pekerja');
    }
}
