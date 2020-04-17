@extends('layout/karyawan')
@section('title', 'Absensi')
@section('add_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
@endsection
@section('content')
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
                <a class="btn btn-danger btn-circle ml-1 tada animated infinite slow" role="button" data-toggle="tooltip" data-bs-tooltip="" title="Klik untuk Hadir">
                    <i class="fa fa-hand-stop-o text-white"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mt-4">
    <div class="card-header py-3">
        <p class="text-center text-primary m-0 font-weight-bold">Presensi</p>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 50px;">
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
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table dataTable my-0" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Position</th>
                        <th class="text-center">Office</th>
                        <th class="text-center">Age</th>
                        <th class="text-center">Start date</th>
                        <th class="text-center">Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008/11/28</td>
                        <td class="text-center"><a class="btn btn-primary btn-circle ml-1" role="button"><i class="fa fa-pencil text-white"></i></a><a class="btn btn-danger btn-circle ml-1" role="button"><i class="fas fa-trash text-white"></i></a></td>
                    </tr>
                    <tr>
                        <td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Angelica Ramos</td>
                        <td>Chief Executive Officer(CEO)</td>
                        <td>London</td>
                        <td>47</td>
                        <td>2009/10/09<br></td>
                        <td>$1,200,000</td>
                    </tr>
                    <tr>
                        <td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar3.jpeg">Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12<br></td>
                        <td>$86,000</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td><strong>Position</strong></td>
                        <td><strong>Office</strong></td>
                        <td><strong>Age</strong></td>
                        <td><strong>Start date</strong></td>
                        <td><strong>Salary</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
