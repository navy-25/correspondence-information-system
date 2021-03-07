@extends('layouts.applogin')
@section('tittle')
    Main Menu
@endsection 
@section('header')
<div class="container">
    <div class="header-body text-center mb-6" style="height:50px">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
                <img src="img/logo.png" alt="" width=150px height=150px style="margin-right:10px;margin-top:-70px">
                <h1 class="text-white">
                <!-- Main Menu<br> -->
                    <b>Si Apel Batu</b>
                    <br>
                    <h4 style="color:white;margin-top:-10px">
                        Sistem Pelayanan Kejaksaan Negeri Batu
                    </h4>
                </h1>             
            </div>
        </div>
    </div>
    </div>
    <!-- <div class="separator separator-bottom separator-skew zindex-100">
    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
    </svg> -->
</div>
@endsection
@section('content')
<div class="row justify-content-center" style="margin-bottom:50px;margin-top:60px">
    <div class="col-lg-8 col-md-12 col-sm">
        <div class="row">
            <div class="col-xl-6 col-md-6" style="margin-bottom:10px;height:100px" >
                <a href="{{route('aplikasi1')}}" class="btn btn-light" style="background-color:white;width:100%;height:100%">       
                    <div class="row">
                        <div class="col-xl-4 col-md-5 col-5">
                            <img src="{{asset('img/surat.png')}}" style="margin-top:15px" alt="persuratan" width="50px" hight="50px">
                        </div>
                        <div class="col-xl-8 col-md-7 col-7">
                            <h1 style="margin-top:16px">            
                                PERSURATAN
                            </h1>    
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-6 col-md-6" style="margin-bottom:10px;height:100px" >
                 <a href="{{route('aplikasi2')}}" class="btn btn-light" style="background-color:white;width:100%;height:100%">       
                 <div class="row">
                        <div class="col-xl-4 col-md-5 col-5">
                            <img src="{{asset('img/ptsp.png')}}" style="margin-top:15px" alt="persuratan" width="50px" hight="50px">
                        </div>
                        <div class="col-xl-8 col-md-7 col-7">
                            <h1 style="margin-top:16px">            
                                PTSP
                            </h1>    
                        </div>
                    </div> 
                </a>
            </div>
        </div>     
    </div>
</div>
@endsection

@section('footer')
<div class="col-xl-6">
    <div class="copyright text-center text-xl-left text-muted">
    © 2020 Created by <b>V</b>tim
    </div>
</div>
<div class="col-xl-6">
    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
        <li class="nav-item">
            <p>Kejaksaan Negeri Batu</p>
        </li>                   
    </ul>
</div>
@endsection