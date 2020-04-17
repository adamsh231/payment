@extends('layout/admin')
@section('title', 'Profile')
@section('content')
<div style="margin-left: 15%; margin-right: 15%">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
                        </div>
                        <form class="user">
                            <div class="form-group">
                                <input style="text-align: center" type="password" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Isi Untuk Mengubah Password">
                            </div>
                            <div class="form-group">
                                <input style="text-align: center" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Ulangi Password">
                            </div>
                            <a href="index.html" class="btn btn-primary btn-user btn-block">
                                Change Password
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
