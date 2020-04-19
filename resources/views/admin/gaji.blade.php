@extends('layout/admin')
@section('title', 'Gaji Karyawan')
@section('add_style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-center text-primary m-0 font-weight-bold">Gaji Karyawan</p>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 0px;">
            <form id="periode" style="margin-left: 0;margin-right: 0;margin-bottom: 0px;" method="GET" action="/admin/gaji">
                <div class="form-row float-right d-xl-flex justify-content-xl-center" style="margin-right: 0px;width: 50%;">
                    <div class="col-5" style="padding-right: 0px;padding-left: 0px;">
                        <select class="form-control" style="padding: 10px;" name="bulan">
                            <option value="1" @if($bulan==1) selected @endif>Januari</option>
                            <option value="2" @if($bulan==2) selected @endif>Februari</option>
                            <option value="3" @if($bulan==3) selected @endif>Maret</option>
                            <option value="4" @if($bulan==4) selected @endif>April</option>
                            <option value="5" @if($bulan==5) selected @endif>Mei</option>
                            <option value="6" @if($bulan==6) selected @endif>Juni</option>
                            <option value="7" @if($bulan==7) selected @endif>Juli</option>
                            <option value="8" @if($bulan==8) selected @endif>Agustus</option>
                            <option value="9" @if($bulan==9) selected @endif>September</option>
                            <option value="10" @if($bulan==10) selected @endif>Oktober</option>
                            <option value="11" @if($bulan==11) selected @endif>November</option>
                            <option value="12" @if($bulan==12) selected @endif>Desember</option>
                        </select>
                    </div>
                    <div class="col-3" style="padding-right: 0px;padding-left: 0px;">
                        <select class="form-control" style="padding: 10px;padding-left: 7px;" name="tahun">
                            @foreach ($periode_tahun as $t)
                            <option value="{{ $t->tahun }}" @if($tahun==$t->tahun) selected @endif>{{ $t->tahun }}</option>
                            @endforeach
                            {{-- Start Potential Bug !!--}}
                            {{-- <option value="{{ date('Y') }}" @if($tahun==date('Y')) selected @endif>{{ date('Y') }}</option> --}}
                            {{-- End Potential Bug !!--}}
                        </select>
                    </div>
                    <div class="col-4 d-xl-flex justify-content-xl-center">
                        <button data-toggle="tooltip" data-bs-tooltip="" title="Tampilkan" type="submit" class="btn btn-block text-white btn-facebook" role="button" style="width: 80%;">
                            <i class="fas fa-eye text-white"></i>
                        </button>
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
                        @php
                        $id = $k->id;
                        $nama = $k->name;
                        $jabatan = $k->jabatan->name;
                        $harian = $k->presensi->sum('worktime') * $k->jabatan->worktime;
                        $lembur = $k->presensi->sum('overtime') * $k->jabatan->overtime;
                        $makan = $k->presensi->sum('worktime') * $k->jabatan->food;
                        $transport = $k->presensi->sum('worktime') * $k->jabatan->transport;
                        $total = $harian + $lembur + $makan + $transport;
                        $real_total = $harian + $lembur + $makan + $transport;
                        $harian = "Rp " . number_format($harian,2,',','.');
                        $lembur = "Rp " . number_format($lembur,2,',','.');
                        $makan = "Rp " . number_format($makan,2,',','.');
                        $transport = "Rp " . number_format($transport,2,',','.');
                        $total = "Rp " . number_format($total,2,',','.');
                        @endphp
                        <tr>
                            <td class="text-center">{{ $k->id }}</td>
                            <td>{{ $k->name }}</td>
                            <td class="text-center">{{ $k->presensi->sum('worktime') }}</td>
                            <td class="text-center">{{ $k->presensi->sum('overtime') }}</td>
                            <td class="text-right">{{ "Rp " . number_format($k->jabatan->worktime,2,',','.') }}</td>
                            <td class="text-right">{{ "Rp " . number_format($k->jabatan->overtime,2,',','.') }}</td>
                            <td class="text-center">
                                @foreach ($k->gaji as $kg)
                                @if ($kg->status)
                                <a class="btn btn-success btn-circle ml-1" target="_blank" href="{{ url('admin/slip/'.$k->id.'/'.$bulan.'/'.$tahun) }}" data-toggle="tooltip" data-bs-tooltip="" title="Cetak Ulang">
                                    <i class="fas fa-check text-white"></i>
                                </a>
                                @else
                                <a class="btn btn-info btn-sm btn-icon-split" data-toggle="modal" data-target="#modal_gaji" onclick="viewModalGaji({{$id}}, '{{$nama}}', '{{$jabatan}}', '{{$harian}}', '{{$lembur}}', '{{$makan}}', '{{$transport}}', '{{$total}}', {{$real_total}})">
                                    <span class="text-white-50 icon">
                                        <i class="fa fa-calculator"></i>
                                    </span>
                                    <span class="text-white text">Bayar Gaji</span>
                                </a>
                                @endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@component('component/modal')
@slot('modal_id','modal_gaji')
@slot('modal_title', 'Bayar Gaji')
@slot('modal_size', 'modal-md')
@slot('modal_body')
<form id="form_gaji">
    <div class="form-group">
        <p class="d-inline">ID&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: </p>
        <p class="d-inline" id="id"></p>
        <br>
        <p class="d-inline">Nama &nbsp; &nbsp; &nbsp; &nbsp; : </p>
        <p class="d-inline" id="nama"></p>
        <br>
        <p class="d-inline">Jabatan &nbsp; &nbsp; &nbsp;: </p>
        <p class="d-inline" id="jabatan"></p>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label class="d-inline">Total Gaji Harian</label>
                <p class="d-inline-block float-right" id="harian"></p>
            </div>
            <div class="form-group">
                <label class="d-inline">Total Gaji Lembur</label>
                <p class="d-inline-block float-right" id="lembur"></p>
            </div>
            <div class="form-group">
                <label class="d-inline">Total Tunjangan Makanan</label>
                <p class="d-inline-block float-right" id="makan"></p>
            </div>
            <div class="form-group">
                <label class="d-inline">Total Tunjangan Transport</label>
                <p class="d-inline-block float-right" id="transport"></p>
            </div>
            <hr>
            <div class="form-group">
                <label class="d-inline">Total Gaji Diterima</label>
                <p class="d-inline-block float-right" id="total"></p>
            </div>
        </div>
    </div>
</form>
@endslot
@slot('modal_footer')
<button id="btn_bayar" class="btn btn-primary">Bayar</button>
@endslot
@endcomponent

@endsection
@section('add_script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready( function () {
        $('#gaji_table').DataTable({
            "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
        });
    });

    function viewModalGaji(id, nama, jabatan, harian, lembur, makan, transport, total, real_total){
        $("#form_gaji #id").html(id);
        $("#form_gaji #nama").html(nama);
        $("#form_gaji #jabatan").html(jabatan);
        $("#form_gaji #harian").html(harian);
        $("#form_gaji #lembur").html(lembur);
        $("#form_gaji #makan").html(makan);
        $("#form_gaji #transport").html(transport);
        $("#form_gaji #total").html(total);
        $('#btn_bayar').off('click');
        $("#btn_bayar").click(function () {
            bayar(id, real_total);
        });
    }

    function bayar(id, total){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PATCH',
            url: '/admin/slip',
            data: {
                id: id,
                bulan: $("#periode select[name=bulan]").val(),
                tahun: $("#periode select[name=tahun]").val(),
                total: total,
            },
            dataType: 'json',
            success: function (data) {
                $('#modal_gaji').modal('hide');
                Swal.fire({
                    title: 'Pembayaran Berhasil!',
                    icon: 'success',
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Cetak Slip Gaji",
                    cancelButtonText: "Ok"
                }).then((result) => {
                    if (result.value) {
                        bulan =  $("#periode select[name=bulan]").val();
                        tahun =  $("#periode select[name=tahun]").val();
                        window.open('/admin/slip/'+id+'/'+bulan+'/'+tahun, '_blank');
                    }
                    window.location.reload();
                });
            },
            error: function (data) {
                Swal.fire({
                    title: 'Pembayaran Gagal!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 700
                });
            }
        });
    }
</script>
@endsection
