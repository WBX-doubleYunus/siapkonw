@extends('template.app')

@section('title', 'Pekerja')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pekerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('pekerja.index') }}">Pekerja</a></div>
            <div class="breadcrumb-item">Tambah Data</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Pekerja</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pekerja.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="judul">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="telepon">Nomor Telepon <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="telepon" name="telepon" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="10" ></textarea>
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