<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\DetailAgenda;
use App\User;
use App\Pekerja;
use App\Persediaan;
use App\DetailPersediaan;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('dari_tanggal')) {
            $data = Agenda::select('id','judul','tanggal','waktu_mulai','waktu_selesai','status')->where('status','=','belum')->whereDate('tanggal','>=',$request->dari_tanggal)->whereDate('tanggal','<=',$request->sampai_tanggal)->get();
        } else {
            $data = Agenda::select('id', 'judul', 'tanggal', 'waktu_mulai', 'waktu_selesai', 'status')->where('status', '=', 'belum')->get();
        }
        return view('agenda.index', compact('data'));
    }

    public function create()
    {
        $admin_id = User::select('id')->where('id', Auth::user()->id)->first();
        $admin_id = $admin_id['id'];
        return view('agenda.create', compact('admin_id'));
    }

    public function store(Request $request)
    {
        Agenda::create([
            'admin_id' => $request->admin_id,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'status' => 'belum'
        ]);

        return redirect('/')->with('success', 'Data Agenda berhasil ditambah!');
    }

    public function edit($id)
    {
        $admin_id = User::where('id', Auth::user()->id)->first();
        $data = Agenda::select('id', 'judul', 'tanggal', 'waktu_mulai', 'waktu_selesai', 'status')->where('id', $id)->first();
        return view('agenda.edit', compact('data', 'admin_id'));
    }

    public function update(Request $request, $id)
    {
        $data = Agenda::where('id', $id)->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
        ]);

        return redirect('/')->with('success','Data Agenda berhasil diubah!');
    }

    public function detail($id)
    {
        $data = Agenda::where('id', $id)->first();
        $detaildata = DetailAgenda::join('pekerja', 'detail_agenda.pekerja_id', '=', 'pekerja.id')->join('persediaan', 'detail_agenda.persediaan_id', '=', 'persediaan.id')->select('detail_agenda.agenda_id', 'pekerja.nama', 'persediaan.nama_barang', 'detail_agenda.jumlah_barang')->where('detail_agenda.agenda_id', $id)->first();
        return view('riwayat.detail', compact('data', 'detaildata'));
    }

    public function delete($id)
    {
        $data = Agenda::find($id);
        $data->delete();

        return redirect('/');
    }

    public function confirm($id)
    {
        $data = Agenda::where('id', $id)->first();
        $pekerja = Pekerja::select('id', 'nama')->get();
        $persediaan = Persediaan::select('id', 'nama_barang', 'jumlah')->get();
        return view('agenda.confirm', compact('data', 'pekerja', 'persediaan'));
    }

    public function confirm_update(Request $request, $id)
    {
        DetailAgenda::create([
            'agenda_id' => $id,
            'pekerja_id' => $request->pekerja_id,
            'persediaan_id' => $request->persediaan_id,
            'jumlah_barang' => $request->jumlah_barang
        ]);

        Agenda::where('id', $id)->update([
            'status' => 'selesai'
        ]);

        $jumlah_awal = Persediaan::select('id', 'jumlah')->where('id', $request->persediaan_id)->first();
        $jumlah_awal = $jumlah_awal['jumlah'];
        $data = Persediaan::where('id', $request->persediaan_id)->update([
            'jumlah' => intval($jumlah_awal) - intval($request->jumlah_barang),
        ]);

        $input = DetailPersediaan::select('id', 'persediaan_id', 'jumlah_akhir')->where('persediaan_id', $request->persediaan_id)->orderBy('id', 'desc')->first();
        $persediaan_id = $input['persediaan_id'];
        $jumlah_awal = $input['jumlah_akhir'];
        $detail_data = DetailPersediaan::where('persediaan_id', $request->persediaan_id)->create([
            'persediaan_id' => $request->persediaan_id,
            'jumlah_awal' => $jumlah_awal,
            'jumlah_akhir' => intval($jumlah_awal) - intval($request->jumlah_barang),
        ]);

        return redirect('/riwayat')->with('success','Data Agenda telah dikonfirmasi!');
    }

    public function indexRiwayat(Request $request)
    {
        if ($request->has('dari_tanggal')) {
            $data = Agenda::select('id','judul','tanggal','waktu_mulai','waktu_selesai','status')->where('status','=','selesai')->whereDate('tanggal','>=',$request->dari_tanggal)->whereDate('tanggal','<=',$request->sampai_tanggal)->get();
        } else {
            $data = Agenda::select('id', 'judul', 'tanggal', 'waktu_mulai', 'waktu_selesai', 'status')->where('status', '=', 'selesai')->get();
        }
        return view('riwayat.index', compact('data'));
    }
}
