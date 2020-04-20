@extends('layout/karyawan')
@section('title', 'Absensi')
@section('add_style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endsection
@section('content')
@foreach ($absen as $a)
<div class="card shadow border-left-warning py-2" style="margin-left: 15%;margin-right: 15%;">
    <div class="card-body">
        <div class="row align-items-center no-gutters">
            <div class="col mr-2">
                <div class="text-uppercase text-center text-warning font-weight-bold text-xs mb-1">
                    <span>PRESENSI</span>
                </div>
                <div class="text-center text-dark font-weight-bold h5 mb-0">
                    <span>{{ date('d M Y', strtotime($a->date)) }}</span>
                </div>
            </div>
            <div class="col-auto">
                @if ($a->worktime)
                <a class="btn btn-success btn-circle ml-1" role="button">
                    <i class="fas fa-check text-white"></i>
                </a>
                @else
                <form action="{{ url('/karyawan/absen/'.$a->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-circle ml-1 tada animated infinite slow" role="button" data-toggle="tooltip" data-bs-tooltip="" title="Klik untuk Hadir">
                        <i class="fa fa-hand-stop-o text-white"></i>
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="card shadow mt-4">
    <div class="card-header py-3">
        <p class="text-center text-primary m-0 font-weight-bold">Presensi</p>
    </div>
    <div class="card-body">
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table dataTable my-0 table-striped" id="absen_table">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 10%">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Kehadiran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($presensi as $p)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ date('d/m/Y', strtotime($p->date)) }}</td>
                        <td class="text-center">
                            @if ($p->worktime)
                            <a class="btn btn-success btn-circle disabled" role="button">
                                <i class="fa fa-check fa-2x text-white"></i>
                            </a>
                            @else
                            <a class="btn btn-danger btn-circle disabled" role="button">
                                <i class="fa fa-times fa-2x text-white"></i>
                            </a>
                            @endif
                        </td>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready( function () {
        $('#absen_table').DataTable({
            "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
        });
    });
</script>
@endsection
