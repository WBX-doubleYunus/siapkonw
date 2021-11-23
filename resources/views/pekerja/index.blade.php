@extends('template.app')

@section('title', 'Pekerja')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<section class="section">
    <div class="section-header">
        <h1>Pekerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Pekerja</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h4>Data Pekerja</h4>
                        @if(auth()->user()->role == 'admin')
                        <a href="{{ route('pekerja.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <thead>
                                    <tr>
                                        <th width="10%"><b>No</b></th>
                                        <th><b>Nama</b></th>
                                        <th><b>Telepon</b></th>
                                        <th><b>Alamat</b></th>
                                        @if(Auth::user()->role == 'admin')
                                        <th class="text-center" width="20%"><b>Aksi</b></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach($data as $dt)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$dt->nama}}</td>
                                        <td>{{$dt->telepon}}</td>
                                        <td>{{$dt->alamat}}</td>
                                        @if(Auth::user()->role == 'admin')
                                        <td class="text-center">
                                            <a href="/pekerja/edit/{{$dt->id}}" class="btn btn-warning btn-sm">Ubah</a>
                                            <a href="#" class="btn btn-danger btn-sm delete" data-id="{{$dt->id}}" data-nama="{{$dt->nama}}">Hapus</a>
                                        </td>
                                        @endif
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
    $('.delete').click( function(){
        var pekerjaid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        swal({
            title: "Apakah anda yakin ingin menghapus data?",
            text: "Anda akan menghapus data pekerja dengan nama "+nama+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/pekerja/delete/"+pekerjaid+""
                swal("Data Pekerja telah dihapus!", {
                    icon: "success",
                });
            } else {
                swal("Data Pekerja tidak terhapus!");
            }
        });
    });
</script>
<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>
@endsection