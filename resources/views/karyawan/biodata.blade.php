@extends('layout/karyawan')
@section('title', 'Biodata')
@section('add_style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-center text-primary m-0 font-weight-bold">Biodata</p>
    </div>
    <div class="card-body">
        <form id="form_biodata">
            <hr>
            <div class="form-group text-center">
                <label>
                    {{-- <strong>ID Karyawan</strong> --}}
                </label>
                <b class="text-info">{{ $karyawan->id }} - {{ $karyawan->jabatan->name }}</b>
            </div>
            <hr>
            <div class="form-group">
                <label>
                    <strong>Nama</strong>
                </label>
                <input class="form-control" type="text" placeholder="Nama Karyawan" name="name" value="{{ $karyawan->name }}">
                <small name="name" class="form-text text-danger d-none"></small>
            </div>
            <div class="form-group">
                <label>
                    <strong>Username</strong>
                </label>
                <input class="form-control" type="text" placeholder="Username Karyawan" name="username" value="{{ $karyawan->username }}">
                <small name="username" class="form-text text-danger d-none"></small>
            </div>
            <div class="form-group">
                <label>
                    <strong>Alamat</strong>
                </label>
                <textarea class="form-control h-150px alamat" rows="6">{{ $karyawan->address }}</textarea>
                <small name="address" class="form-text text-danger d-none"></small>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label>
                            <strong>Tanggal Lahir</strong>
                            <br>
                        </label>
                        <input class="form-control" type="date" name="birth" value="{{ $karyawan->birth }}">
                        <small name="birth" class="form-text text-danger d-none"></small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>
                            <strong>No Handphone</strong>
                        </label>
                        <input class="form-control" type="text" placeholder="Nomor Handphone Karyawan" name="phone" value="{{ $karyawan->phone }}">
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
                            <option @if($karyawan->gender == -1) selected @endif></option>
                            <option value="0" @if($karyawan->gender == 0) selected @endif>Wanita</option>
                            <option value="1" @if($karyawan->gender == 1) selected @endif>Pria</option>
                        </select>
                        <small name="gender" class="form-text text-danger d-none"></small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>
                            <strong>Mulai Bekerja</strong>
                        </label>
                        <input class="form-control" type="date" value="{{ $karyawan->start_work }}" readonly>
                    </div>
                </div>
            </div>
        </form>
        <button onclick="save({{ $karyawan->id }})" class="btn btn-primary btn-sm float-right">Save</button>
    </div>
</div>
@endsection

@section('add_script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    function save(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PATCH',
            url: '/karyawan/biodata/'+ id,
            timeout: 2000,
            data: {
                name: $('#form_biodata input[name=name]').val(),
                username: $('#form_biodata input[name=username]').val(),
                address: $('#form_biodata .alamat').val(),
                birth: $('#form_biodata input[name=birth]').val(),
                phone: $('#form_biodata input[name=phone]').val(),
                gender: $('#form_biodata select[name=gender]').val(),
            },
            dataType: 'json',
            beforeSend: function () {
                Swal.fire({
                    title: 'Loading...',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
                arr_err = ['name', 'username', 'address', 'birth', 'phone', 'gender'];
                for (let index = 0; index < arr_err.length; index++) {
                    $('#form_biodata small[name=' + arr_err[index] + ']').removeClass('d-block').addClass('d-none');
                }
            },
            success: function (data) {
                Swal.fire({
                    title: 'Data Saved!',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 700
                });
                setTimeout(() => {
                    window.location.reload();
                }, 700);
            },
            error: function (data, errortype) {
                Swal.close();
                if (errortype == 'timeout') {
                    Swal.fire({
                        title: 'Connection Time Out!',
                        icon: 'warning',
                        showConfirmButton: true,
                    });
                }
                var errors = $.parseJSON(data.responseText);
                arr_err = ['name', 'username', 'address', 'birth', 'phone', 'gender'];
                for (let index = 0; index < arr_err.length; index++) {
                    if (errors.messages[arr_err[index]] === undefined) {
                        $('#form_biodata small[name=' + arr_err[index] + ']').removeClass('d-block').addClass('d-none');
                    } else {
                        $('#form_biodata small[name=' + arr_err[index] + ']').html(errors.messages[arr_err[index]]);
                        $('#form_biodata small[name=' + arr_err[index] + ']').removeClass('d-none').addClass('d-block');
                    }
                }
            }
        });
    }
</script>
@endsection
