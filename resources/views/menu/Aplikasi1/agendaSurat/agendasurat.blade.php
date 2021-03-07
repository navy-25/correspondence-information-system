@extends('layouts.applogin')
@section('tittle')
    Agenda Surat
@endsection 
@section('header')
<div class="container">
    <div class="header-body text-center mb-6" style="height:50px">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
                <h1 class="text-white">Agenda Surat<br>
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
<div class="row justify-content-center" style="margin-bottom:50px">
    <div class="col-lg-10 col-md-7">
        <div class="row">
            <div class="col-xl-3 col-md-3" style="margin-bottom:10px;height:100px" >
                <a href="{{route('ag_sm')}}" class="btn btn-light" style="background-color:white;width:100%;height:100%">       
                    <h2>            
                        Agenda <br> Surat Masuk
                    </h2>    
                </a>
            </div>
            <div class="col-xl-3 col-md-3" style="margin-bottom:10px;height:100px" >
                <a href="{{route('ag_sk')}}" class="btn btn-light"  style="background-color:white;width:100%;height:100%">
                    <h2>            
                        Agenda <br> Surat Keluar
                    </h2>   
                </a>
            </div>
            <div class="col-xl-3 col-md-3" style="margin-bottom:10px;height:100px" >
                <a href="{{route('ag_sp')}}" class="btn btn-light" style="background-color:white;width:100%;height:100%">       
                    <h2>            
                        Agenda <br> Surat Perintah
                    </h2>    
                </a>
            </div>
            <div class="col-xl-3 col-md-3" style="margin-bottom:10px;height:100px" >
                <a href="{{route('ag_sr')}}" class="btn btn-light" style="background-color:white;width:100%;height:100%">       
                    <h2>            
                        Agenda <br> Surat Pengantar
                    </h2>    
                </a>
            </div>
        </div>     
    </div>
</div>
@endsection 