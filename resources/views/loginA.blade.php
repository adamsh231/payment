@extends('layout/front')
@section('title', 'Login Admin')

@section('add_style')
<link rel="stylesheet" href="{{ asset("assets/css/Login-Form-Dark.css") }}">
@endsection

@section('body')
<div class="login-dark" style="height: 730px;">
    <form action="{{ url('/admin') }}" method="POST">
        @csrf
        <h1 class="text-center">A D M I N</h1>
        <div class="illustration" style="padding: 0px;"><i class="fa fa-user-secret" style="color: rgb(255,255,255);"></i></div>
        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
        <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Sign In</button></div>
    </form>
</div>
@endsection
