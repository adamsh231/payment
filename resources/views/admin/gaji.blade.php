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
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td class="text-center"><a class="btn btn-info btn-sm btn-icon-split" role="button"><span class="text-white-50 icon"><i class="fa fa-calculator"></i></span><span class="text-white text">Bayar Gaji</span></a></td>
                        </tr>
                        <tr>
                            <td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Angelica Ramos</td>
                            <td>Chief Executive Officer(CEO)</td>
                            <td>London</td>
                            <td>47</td>
                            <td>2009/10/09<br></td>
                            <td class="text-center"><a class="btn btn-success btn-circle ml-1" role="button" data-toggle="tooltip" data-bs-tooltip="" title="Cetak Ulang"><i class="fas fa-check text-white"></i></a></td>
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
</div>
@endsection
