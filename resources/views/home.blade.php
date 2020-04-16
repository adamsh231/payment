@extends('layout/front')
@section('title', 'Home')

@section('add_style')
<link rel="stylesheet" href="{{ asset("assets/css/best-carousel-slide.css") }}">
<link rel="stylesheet" href="{{ asset("assets/css/Footer-Basic.css") }}">
<link rel="stylesheet" href="{{ asset("assets/css/Navigation-with-Button.css") }}">
@endsection

@section('body')
<nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset("assets/img/ss_logo.jpg") }}" alt="logo ss" style="width:50px;height:50px;">
        </a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item" role="presentation"></li>
                <li class="nav-item" role="presentation"></li>
            </ul>
            <div class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="margin-right: 10px;filter: blur(0px);">Sign In</a>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" role="presentation" href="{{ url('/login/admin') }}">Admin</a>
                    <a class="dropdown-item" role="presentation" href="{{ url('/login/karyawan') }}">Karyawan</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="container" style="height: 443px;">
    <section id="carousel">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item">
                    <div class="jumbotron pulse animated hero-nature carousel-hero">
                        <div class="container" style="height: 280px">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="jumbotron pulse animated hero-photography carousel-hero">
                        <div class="container" style="height: 280px">
                        </div>
                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="jumbotron pulse animated hero-technology carousel-hero">
                        <div class="container" style="height: 280px">
                        </div>
                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
            </ol>
        </div>
    </section>
</div>
<div class="footer-basic">
    <footer style="margin-top: 22px;">
        <div class="social" style="padding: 0px;"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <p class="copyright" style="margin-top: 9px;">Waroeng SS © 2020</p>
    </footer>
</div>
@endsection
