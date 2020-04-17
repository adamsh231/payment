@extends('layout/admin')
@section('title', 'Gaji Karyawan')
@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-center text-primary m-0 font-weight-bold">Gaji Karyawan</p>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 0px;">
            <form style="margin-left: 0;margin-right: 0;margin-bottom: 0px;">
                <div class="form-row float-right d-xl-flex justify-content-xl-center" style="margin-right: 0px;width: 50%;">
                    <div class="col-5" style="padding-right: 0px;padding-left: 0px;">
                        <select class="form-control" style="padding: 10px;">
                            <option value="12" selected="">Desember</option>
                        </select>
                    </div>
                    <div class="col-3" style="padding-right: 0px;padding-left: 0px;">
                        <select class="form-control" style="padding: 10px;padding-left: 7px;">
                            <option value="12" selected="">2018</option>
                        </select>
                    </div>
                    <div class="col-4 d-xl-flex justify-content-xl-center">
                        <a class="btn btn-link btn-block text-white btn-facebook" role="button" style="width: 80%;">Tampilkan</a>
                    </div>
                </div>
            </form>
        </div>
        <div style="margin-top: 60px;">
            <div class="table-responsive d-block table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 10%">ID Karyawan</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Jumlah Absen</th>
                            <th class="text-center">Jumlah Lembur</th>
                            <th class="text-center">Gaji Harian</th>
                            <th class="text-center">Action</th>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">3215464</td>
                            <td>Accountant</td>
                            <td class="text-center">Tokyo</td>
                            <td class="text-center">33</td>
                            <td class="text-right">2008/11/28</td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm btn-icon-split" role="button">
                                    <span class="text-white-50 icon"><i class="fa fa-calculator"></i></span>
                                    <span class="text-white text">Bayar Gaji</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
