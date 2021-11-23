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
            <div class="col-md-6">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Data Agenda</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Detail Pelaksanaan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                        <tr>
                                            <td><b>Pekerja</b></td>
                                            <td>: {{$detaildata->nama}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Kebutuhan Barang</b></td>
                                            <td>: {{$detaildata->nama_barang}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Banyaknya</b></td>
                                            <td>: {{$detaildata->jumlah_barang}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-12">
            <div class="col-lg-12"> -->
                <!-- <div class="card"> -->
                    <!-- <div class="card-body"> -->
                        <!-- <div class="table-responsive"> -->
                            <table class="table table-striped table-md">
                                <tr>
                                    <th class="text-center"><span class="badge badge-success" style="font-size:80px;">TELAH SELESAI</span></th>
                                </tr>
                            </table>
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div>
        </div> -->
</section>
@endsection