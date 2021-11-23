@extends('template.app')

@section('title', 'Pekerja')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pekerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('pekerja.index') }}">Pekerja</a></div>
            <div class="breadcrumb-item">Edit Data</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Pekerja</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pekerja.update', $data->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}" required>
                            </div>
                            <div class="form-group">
                                <label for="telepon">Nomor Telepon <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="telepon" name="telepon" value="{{$data->telepon}}" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                <textarea name="alamat" id="alamat" class="form-control"  rows="10">{{$data->alamat}}</textarea>
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