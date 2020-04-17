@extends('layout/admin')
@section('title', 'Karyawan')
@section('add_style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endsection
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
                        <td class="text-center"><a class="btn btn-primary btn-circle ml-1" role="button"><i class="fa fa-pencil text-white"></i></a><a class="btn btn-danger btn-circle ml-1" role="button"><i class="fas fa-trash text-white"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('add_script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#karyawan_table').DataTable({
            "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
        });
    } );
</script>
@endsection
