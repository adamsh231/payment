@extends('layout/admin')
@section('title', 'Gaji Karyawan')
@section('add_style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-center text-primary m-0 font-weight-bold">Gaji Karyawan</p>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 0px;">
            <form style="margin-left: 0;margin-right: 0;margin-bottom: 0px;" method="POST" action="/admin/gaji">
                @csrf
                <div class="form-row float-right d-xl-flex justify-content-xl-center" style="margin-right: 0px;width: 50%;">
                    <div class="col-5" style="padding-right: 0px;padding-left: 0px;">
                        <select class="form-control" style="padding: 10px;" name="bulan">
                            <option value="1" @if($bulan == 1) selected @endif>Januari</option>
                            <option value="2" @if($bulan == 2) selected @endif>Februari</option>
                            <option value="3" @if($bulan == 3) selected @endif>Maret</option>
                            <option value="4" @if($bulan == 4) selected @endif>April</option>
                            <option value="5" @if($bulan == 5) selected @endif>Mei</option>
                            <option value="6" @if($bulan == 6) selected @endif>Juni</option>
                            <option value="7" @if($bulan == 7) selected @endif>Juli</option>
                            <option value="8" @if($bulan == 8) selected @endif>Agustus</option>
                            <option value="9" @if($bulan == 9) selected @endif>September</option>
                            <option value="10" @if($bulan == 10) selected @endif>Oktober</option>
                            <option value="11" @if($bulan == 11) selected @endif>November</option>
                            <option value="12" @if($bulan == 12) selected @endif>Desember</option>
                        </select>
                    </div>
                    <div class="col-3" style="padding-right: 0px;padding-left: 0px;">
                        <select class="form-control" style="padding: 10px;padding-left: 7px;" name="tahun">
                            @foreach ($periode_tahun as $t)
                            <option value="{{ $t->tahun }}">{{ $t->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4 d-xl-flex justify-content-xl-center">
                        <button type="submit" class="btn btn-block text-white btn-facebook" role="button" style="width: 80%;">Tampilkan</button>
                    </div>
                </div>
            </form>
        </div>
        <div style="margin-top: 60px;">
            <div class="table-responsive d-block table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0 table-striped" id="gaji_table">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 15%">ID Karyawan</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Jumlah Absen</th>
                            <th class="text-center">Jumlah Lembur</th>
                            <th class="text-center">Gaji Harian</th>
                            <th class="text-center">Gaji Lembur</th>
                            <th class="text-center">Action</th>
                            </th>
                    </thead>
                    <tbody>
                        @foreach ($karyawan as $k)
                        <tr>
                            <td class="text-center">{{ $k->id }}</td>
                            <td>{{ $k->name }}</td>
                            <td class="text-center">{{ $k->presensi->sum('worktime') }}</td>
                            <td class="text-center">{{ $k->presensi->sum('overtime') }}</td>
                            <td class="text-right">{{ "Rp " . number_format($k->jabatan->daily,2,',','.') }}</td>
                            <td class="text-right">{{ "Rp " . number_format($k->jabatan->overtime,2,',','.') }}</td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm btn-icon-split" role="button">
                                    <span class="text-white-50 icon">
                                        <i class="fa fa-calculator"></i>
                                    </span>
                                    <span class="text-white text">Bayar Gaji</span>
                                </a>
                                <a class="btn btn-success btn-circle ml-1" role="button" data-toggle="tooltip" data-bs-tooltip="" title="Cetak Ulang">
                                    <i class="fas fa-check text-white"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('add_script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#gaji_table').DataTable({
            "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
        });
    } );
</script>
@endsection
