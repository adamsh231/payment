@extends('layout/admin')
@section('title', 'Karyawan')
@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-center text-primary m-0 font-weight-bold">Karyawan</p>
    </div>
    <div class="card-body">
        <a class="btn btn-primary btn-sm float-right btn-icon-split" role="button" style="margin-bottom: 12px;">
            <span class="text-white-50 icon">
                <i class="fa fa-user-plus"></i>
            </span>
            <span class="text-white text">Tambah Karyawan</span>
        </a>
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
