@extends('layout/admin')
@section('title', 'Laporan')
@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-center text-primary m-0 font-weight-bold">Laporan</p>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 0px;">
            <form style="margin-left: 0;margin-right: 0;margin-bottom: 0px;" id="form_laporan">
                <div class="form-row float-right d-xl-flex justify-content-xl-center" style="margin-right: 0px;width: 100%;">
                    <div class="col-3">
                        <select class="form-control" style="padding: 10px;" name="bulan1">
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
                    <div class="col-2 text-center">
                        <h2><i class="fas fa-arrow-right text-dark"></i></h2>
                    </div>
                    <div class="col-3">
                        <select class="form-control" style="padding: 10px;" name="bulan2">
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
                    <div class="col-1" style="padding-right: 0px;padding-left: 0px;margin-left: 12px;">
                        <select class="form-control" style="padding: 10px;padding-left: 7px;" name="tahun">
                            @foreach ($periode_tahun as $t)
                            <option value="{{ $t->tahun }}" @if($tahun==$t->tahun) selected @endif>{{ $t->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2 justify-content-xl-center">
                        <a onclick="cetak()" data-toggle="tooltip" data-bs-tooltip="" title="Cetak" class="btn btn-link btn-block text-white btn-facebook" role="button" style="width: 80%;">
                            <i class="fas fa-print text-white m-0 p-0"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('add_script')
<script>
    function cetak(){
        bulan1 = $('#form_laporan select[name=bulan1]').val();
        bulan2 = $('#form_laporan select[name=bulan2]').val();
        tahun = $('#form_laporan select[name=tahun]').val();
        window.open('/admin/laporan/cetak?bulan1='+bulan1+'&bulan2='+bulan2+'&tahun='+tahun, '_blank');
    }

</script>
@endsection
