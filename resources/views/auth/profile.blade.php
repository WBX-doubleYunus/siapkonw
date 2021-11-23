@extends('template.app')

@section('title', 'Profil')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<section class="section">
    <div class="section-header">
        <h1>Profil {{$data->nama}}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Profil</div>
            <div class="breadcrumb-item">Edit Data</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <table class="no-border">
                            <thead>
                                <tr>
                                    <th>
                                        <h4>Menu Detail Akun</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kartu ini berisikan detail data Nama dan Username akun Anda!</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profil.store', $data->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="username" name="username" value="{{$data->username}}" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Role <span class="text-danger">*</span></label>
                                <select class="form-control" name="role" id="role" required>
                                    <option value="">--Silahkan pilih role</option>
                                    <option value="admin">Admin</option>
                                    <option value="pemilik">Pemilik</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-sm btn-outline-secondary">Reset</button>
                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <table class="no-border">
                            <thead>
                                <tr>
                                    <th>
                                        <h4>Menu Detail Password</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kartu ini berisikan detail data Password akun Anda!</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('password.store', $data->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="password_lama">Password Lama <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password_lama" name="password_lama" required>
                            </div>
                            <div class="form-group">
                                <label for="password_baru">Password Baru <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password_baru" name="password_baru" required>
                            </div>
                            <div class="form-group">
                                <label for="password_baru_konfir">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password_baru_konfir" name="password_baru_konfir" required>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
</script>

<script>
    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}")
    @endif
</script>
@endsection