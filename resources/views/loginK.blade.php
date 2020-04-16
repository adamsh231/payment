@extends('layout/front')
@section('title', 'Login Karyawan')

@section('add_style')
<link rel="stylesheet" href="{{ asset("assets/css/Login-Form-Dark.css") }}">
@endsection

@section('body')
<div class="login-dark" style="height: 730px;">
    <form action="{{ url('/karyawan') }}" method="POST">
        @csrf
        <h1 class="text-center">KARYAWAN</h1>
        <div class="illustration" style="padding: 0px;"><i class="fa fa-user" style="color: #ffffff;"></i></div>
        <div class="form-group">
            <input class="form-control text-center" type="text" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <input class="form-control text-center" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Sign In</button>
        </div>
    </form>
</div>
@endsection
