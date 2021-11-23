@extends('template.app')

@section('title', 'Agenda')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Agenda</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('agenda.index') }}">Agenda</a></div>
            <div class="breadcrumb-item">Tambah Data</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Agenda</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('agenda.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="admin_id" value="{{$admin_id}}">
                                <label for="judul">Judul <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal">Waktu Mulai <span class="text-danger">*</span></label>
                                        <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal">Waktu Selesai <span class="text-danger">*</span></label>
                                        <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" required>
                                    </div>
                                </div>
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