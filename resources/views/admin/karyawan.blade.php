@extends('layout/admin')
@section('title', 'Karyawan')
@section('add_style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-center text-primary m-0 font-weight-bold">Karyawan</p>
    </div>
    <div class="card-body">
        <a class="btn btn-primary btn-sm float-right btn-icon-split" data-toggle="modal" data-target="#modal_add_karyawan" style="margin-bottom: 12px;">
            <span class="text-white-50 icon">
                <i class="fa fa-user-plus"></i>
            </span>
            <span class="text-white text">Tambah Karyawan</span>
        </a>
        <div class="table-responsive table-striped table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table dataTable my-0" id="karyawan_table">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 10%">ID Karyawan</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $k)
                    <tr>
                        <td class="text-center">{{ $k->id }}</td>
                        <td>{{ $k->name }}</td>
                        <td class="text-center">{{ ($k->gender == 0 ? "Wanita" : "Pria") }}</td>
                        <td class="text-center">{{ $k->jabatan->name }}</td>
                        <td class="text-center">
                            <a onclick="viewModalEdit({{$k->id}},'{{$k->name}}','{{$k->username}}',{{$k->jabatan->id}},'{{$k->address}}','{{$k->birth}}','{{$k->phone}}',{{$k->gender}},'{{$k->start_work}}')" class="btn btn-primary btn-circle ml-1" role="button">
                                <i class="fa fa-pencil text-white"></i>
                            </a>
                            <a onclick="deleteKaryawan({{$k->id}},'{{$k->name}}')" class="btn btn-danger btn-circle ml-1" role="button">
                                <i class="fas fa-trash text-white"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@component('component/modal')
@slot('modal_id','modal_add_karyawan')
@slot('modal_title', 'Tambah Karyawan')
@slot('modal_size', 'modal-lg')
@slot('modal_body')
<form>
    <div class="form-group">
        <label>
            <strong>Nama</strong>
        </label>
        <input class="form-control" type="text" placeholder="Nama Karyawan" name="name">
        <small name="name" class="form-text text-danger d-none"></small>
    </div>
    <div class="form-group">
        <label>
            <strong>Jabatan</strong>
        </label>
        <select class="form-control" name="jabatan">
            <option selected></option>
            @foreach ($jabatan as $j)
            <option value="{{ $j->id }}">{{ $j->name }}</option>
            @endforeach
        </select>
        <small name="jabatan" class="form-text text-danger d-none"></small>
    </div>
    <div class="form-group">
        <label>
            <strong>Alamat</strong>
        </label>
        <textarea class="form-control h-150px alamat" rows="6"></textarea>
        <small name="address" class="form-text text-danger d-none"></small>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label>
                    <strong>Tanggal Lahir</strong>
                    <br>
                </label>
                <input class="form-control" type="date" name="birth">
                <small name="birth" class="form-text text-danger d-none"></small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>
                    <strong>No Handphone</strong>
                </label>
                <input class="form-control" type="number" placeholder="Nomor Handphone Karyawan" name="phone">
                <small name="phone" class="form-text text-danger d-none"></small>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label>
                    <strong>Jenis Kelamin</strong>
                </label>
                <select class="form-control" name="gender">
                    <option selected></option>
                    <option value="0">Wanita</option>
                    <option value="1">Pria</option>
                </select>
                <small name="gender" class="form-text text-danger d-none"></small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>
                    <strong>Mulai Bekerja</strong>
                </label>
                <input class="form-control" type="date" name="start_work">
                <small name="start_work" class="form-text text-danger d-none"></small>
            </div>
        </div>
    </div>
</form>
@endslot
@slot('modal_footer')
<button onclick="tambah()" class="btn btn-primary">Tambah</button>
@endslot
@endcomponent

@component('component/modal')
@slot('modal_id','modal_edit_karyawan')
@slot('modal_title', 'Edit Karyawan')
@slot('modal_size', 'modal-lg')
@slot('modal_body')
<form>
    <div class="form-group">
        <label>
            <strong>Nama</strong>
        </label>
        <input class="form-control" type="text" placeholder="Nama Karyawan" name="name">
        <small name="name" class="form-text text-danger d-none"></small>
    </div>
    <div class="form-group">
        <label>
            <strong>Username</strong>
        </label>
        <input class="form-control" type="text" placeholder="Username Karyawan" name="username">
        <small name="username" class="form-text text-danger d-none"></small>
    </div>
    <div class="form-group">
        <label>
            <strong>Password</strong>
        </label>
        <input class="form-control" type="password" placeholder="Isi Password untuk Mengubah" name="password">
        <small name="password" class="form-text text-danger d-none"></small>
    </div>
    <div class="form-group">
        <label>
            <strong>Jabatan</strong>
        </label>
        <select class="form-control" name="jabatan">
            <option selected></option>
            @foreach ($jabatan as $j)
            <option value="{{ $j->id }}">{{ $j->name }}</option>
            @endforeach
        </select>
        <small name="jabatan" class="form-text text-danger d-none"></small>
    </div>
    <div class="form-group">
        <label>
            <strong>Alamat</strong>
        </label>
        <textarea class="form-control h-150px alamat" rows="6"></textarea>
        <small name="address" class="form-text text-danger d-none"></small>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label>
                    <strong>Tanggal Lahir</strong>
                    <br>
                </label>
                <input class="form-control" type="date" name="birth">
                <small name="birth" class="form-text text-danger d-none"></small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>
                    <strong>No Handphone</strong>
                </label>
                <input class="form-control" type="text" placeholder="Nomor Handphone Karyawan" name="phone">
                <small name="phone" class="form-text text-danger d-none"></small>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label>
                    <strong>Jenis Kelamin</strong>
                </label>
                <select class="form-control" name="gender">
                    <option selected></option>
                    <option value="0">Wanita</option>
                    <option value="1">Pria</option>
                </select>
                <small name="gender" class="form-text text-danger d-none"></small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>
                    <strong>Mulai Bekerja</strong>
                </label>
                <input class="form-control" type="date" name="start_work">
                <small name="start_work" class="form-text text-danger d-none"></small>
            </div>
        </div>
    </div>
</form>
@endslot
@slot('modal_footer')
<button id="btn_edit" class="btn btn-primary">Update</button>
@endslot
@endcomponent

@endsection

@section('add_script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('assets/js/admin_karyawan.js') }}"></script>
<script>
    $(document).ready( function () {
        $('#karyawan_table').DataTable({
            "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
        });
    });
</script>
@endsection
