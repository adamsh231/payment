@extends('layout/admin')
@section('title', 'Laporan')
@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-center text-primary m-0 font-weight-bold">Laporan</p>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 0px;">
            <form style="margin-left: 0;margin-right: 0;margin-bottom: 0px;">
                <div class="form-row float-right d-xl-flex justify-content-xl-center" style="margin-right: 0px;width: 100%;">
                    <div class="col-3">
                        <select class="form-control" style="padding: 10px;">
                            <option value="12" selected="">Desember</option>
                        </select>
                    </div>
                    <div class="col-2 text-center">
                        <h2><i class="fas fa-arrow-right text-dark"></i></h2>
                    </div>
                    <div class="col-3">
                        <select class="form-control" style="padding: 10px;">
                            <option value="12" selected="">Desember</option>
                        </select>
                    </div>
                    <div class="col-1" style="padding-right: 0px;padding-left: 0px;margin-left: 12px;">
                        <select class="form-control" style="padding: 10px;padding-left: 5px;">
                            <option value="12" selected="">2018</option>
                        </select>
                    </div>
                    <div class="col-2 justify-content-xl-center">
                        <a data-toggle="tooltip" data-bs-tooltip="" title="Cetak" class="btn btn-link btn-block text-white btn-facebook" role="button" style="width: 80%;">
                            <i class="fas fa-print text-white m-0 p-0"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
