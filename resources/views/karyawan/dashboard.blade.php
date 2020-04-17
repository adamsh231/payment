@extends('layout/karyawan')
@section('title', 'Dashboard')
@section('content')
<h1>Waroeng Super Sambal "SS"</h1>
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
<div class="card shadow border-left-warning py-2" style="margin-left: 15%;margin-right: 15%;">
    <div class="card-body">
        <div class="row align-items-center no-gutters">
            <div class="col mr-2">
                <div class="text-uppercase text-center text-warning font-weight-bold text-xs mb-1">
                    <span>PRESENSI</span>
                </div>
                <div class="text-center text-dark font-weight-bold h5 mb-0">
                    <span>12 OKTOBER 2019</span>
                </div>
            </div>
            <div class="col-auto">
                <a class="btn btn-success btn-circle ml-1" role="button">
                    <i class="fas fa-check text-white"></i>
                </a>
                <a class="btn btn-danger btn-circle ml-1" role="button" data-toggle="tooltip" data-bs-tooltip="" title="Klik untuk Hadir">
                    <i class="fa fa-hand-stop-o text-white"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
