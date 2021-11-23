@extends('template.app')

@section('title', 'Agenda')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Agenda</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('agenda.index') }}">Agenda</a></div>
            <div class="breadcrumb-item">Konfrimasi Data</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h4>Data Agenda</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <thead>
                                    <tr>
                                        <td><b>Judul</b></td>
                                        <td>: {{$data->judul}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Tanggal</b></td>
                                        <td>: {{$data->tanggal}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Waktu</b></td>
                                        <td>: {{$data->waktu_mulai}} - {{$data->waktu_selesai}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Status</b></td>
                                        <td>: <span class="badge badge-warning">{{$data->status}}</span></td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h4>Menu Konfirmasi</h4>
                        <p>Silahkan isi data Pekerja dan Persediaan yang telah digunakan!</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('agenda.confirm-update', $data->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="pekerja">Pekerja <span class="text-danger">*</span></label>
                                <select class="form-control" name="pekerja_id" required>
                                    <option value="">---Silahkan Pilih Pekerja</option>
                                    @foreach($pekerja as $pkj)
                                    <option value="{{$pkj->id}}">{{$pkj->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <p for="persediaan">Persediaan <span class="text-danger">*</span></p>
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="">Barang</label>
                                        <select class="form-control" name="persediaan_id" required>
                                            <option value="">---Silahkan Pilih Persediaan yang telah digunakan</option>
                                            @foreach($persediaan as $item)
                                            <option value="{{$item->id}}">{{$item->nama_barang}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Jumlah</label>
                                        <input class="form-control" type="number" name="jumlah_barang" placeholder="Masukkan jumlah barang..." required>
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
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>
@endsection