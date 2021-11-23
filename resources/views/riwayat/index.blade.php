@extends('template.app')

@section('title', 'Agenda')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<section class="section">
    <div class="section-header">
        <h1>Agenda</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Agenda</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <form action="{{ route('riwayat.index') }}" method="get">
                                    <div class="table-responsive">
                                        <table>
                                            <tr>
                                                <th>Dari Tanggal</th>
                                                <th>Sampai Tanggal</th>
                                            </tr>
                                            <tr>

                                                <td><input class="form-control" type="date" name="dari_tanggal" required></td>
                                                <td><input class="form-control" type="date" name="sampai_tanggal" required></td>
                                                <td><button class="btn btn-primary btn-sm" type="submit" >Cari</button></td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-md">
                                <thead>
                                    <tr>
                                        <th><b>Judul</b></th>
                                        <th><b>Tanggal</b></th>
                                        <th><b>Waktu Mulai</b></th>
                                        <th><b>Waktu Selesai</b></th>
                                        <th><b>Status</b></th>
                                        <th class="text-center"><b>Aksi</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $dt)
                                    <tr>
                                        <td>{{$dt->judul}}</td>
                                        <td>{{$dt->tanggal}}</td>
                                        <td>{{$dt->waktu_mulai}}</td>
                                        <td>{{$dt->waktu_selesai}}</td>
                                        <td>
                                            @if($dt->status == 'belum')
                                            <span class="badge badge-warning">{{$dt->status}}</span>
                                            @elseif($dt->status == 'selesai')
                                            <span class="badge badge-success">{{$dt->status}}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($dt->status == 'belum' && Auth::user()->role == 'admin')
                                            <a href="/agenda/edit/{{$dt->id}}" class="btn btn-warning btn-sm">Ubah</a>
                                            <a href="/agenda/delete/{{$dt->id}}" class="btn btn-danger btn-sm">Hapus</a>
                                            @elseif($dt->status == 'selesai' && Auth::user()->role == 'admin')
                                            <a href="/riwayat/detail/{{$dt->id}}" class="btn btn-primary btn-sm">Detail</a>
                                            @elseif($dt->status == 'belum' && Auth::user()->role == 'pemilik')
                                            <a href="/agenda/confirm/{{$dt->id}}" class="btn btn-success btn-sm">Confirm</a>
                                            @elseif($dt->status == 'selesai' && Auth::user()->role == 'pemilik')
                                            <a href="/riwayat/detail/{{$dt->id}}" class="btn btn-primary btn-sm">Detail</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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