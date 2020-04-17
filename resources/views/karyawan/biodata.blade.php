@extends('layout/karyawan')
@section('title', 'Biodata')
@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-center text-primary m-0 font-weight-bold">Biodata</p>
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="address">
                    <strong>Nama</strong>
                </label>
                <input class="form-control" type="text" placeholder="Nama Karyawan" name="address">
            </div>
            <div class="form-group">
                <label for="address">
                    <strong>Alamat</strong>
                </label>
                <input class="form-control" type="text" placeholder="Alamat Karyawan" name="address">
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="city">
                            <strong>Tanggal Lahir</strong>
                            <br>
                        </label>
                        <input class="form-control" type="text" name="city">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="country">
                            <strong>No Handphone</strong>
                        </label>
                        <input class="form-control" type="text" placeholder="Nomor Handphone Karyawan" name="country">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="city">
                            <strong>Jenis Kelamin</strong>
                        </label>
                        <input class="form-control" type="text" placeholder="Jenis Kelamin Karyawan" name="city">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="country">
                            <strong>Mulai Bekerja</strong>
                        </label>
                        <input class="form-control" type="text" name="country">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-bs-tooltip="" type="submit" title="Klik untuk Merubah">Save&nbsp;Settings</button>
            </div>
        </form>
    </div>
</div>
@endsection
