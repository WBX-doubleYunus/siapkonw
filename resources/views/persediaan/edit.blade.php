@extends('template.app')

@section('title', 'Persediaan')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Persediaan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('persediaan.index') }}">Persediaan</a></div>
            <div class="breadcrumb-item">Edit Data</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Persediaan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('persediaan.update', $data->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{$data->nama_barang}}" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_masuk">Tanggal Masuk<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{$data->tanggal_masuk}}" required>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{$data->jumlah}}" required>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-sm btn-outline-secondary">Reset</button>
                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection