@extends('layouts.master')
@section('tittle')
    Dashboard
@endsection 
@section('sidebar-db')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Dashboard</a>       
@endsection

@section('content')
@if(auth()->user()->hak_akses=='Sekretariatan' || auth()->user()->hak_akses=='Admin')
<H3 style="color:white"><i class="ni ni-box-2 " style="margin-right:7px"></i>Master Surat</H3>
<div class="row" style="margin-bottom:10px">
    <div class="col-xl-4 col-md-12 col-sm-12">
        <!-- <a href="{{route('ss')}}" class="btn btn-danger" style="margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px"> -->
        <a href="{{route('ss')}}" class="btn btn-light" style="margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px;background-color:white;color:#5e72e4">
        <i class="ni ni-badge" style="margin-right:10px"></i> SIFAT SURAT
        </a>
    </div>
    <div class="col-xl-4 col-md-12 col-sm-12">
        <!-- <a  href="{{route('ks')}}" class="btn btn-danger" style=";margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px"> -->
        <a href="{{route('ks')}}" class="btn btn-light" style="margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px;background-color:white;color:#5e72e4">
        <i class="ni ni-tag" style="margin-right:10px"></i> KLASIFIKASI SURAT
        </a>
    </div>
    <div class="col-xl-4 col-md-12 col-sm-12">
        <!-- <a   href="{{route('mh')}}" class="btn btn-danger" style=";margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px"> -->
        <a href="{{route('mh')}}" class="btn btn-light" style="margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px;background-color:white;color:#5e72e4">
        <i class="ni ni-diamond" style="margin-right:10px"></i> MASTER HARAP
        </a>
    </div>
</div>
@endif
<H3 style="color:white"><i class="ni ni-books " style="margin-right:7px"></i>Data Surat</H3>
<div class="row" style="margin-bottom:10px">
    <div class="col-xl-8 col-md-12 col-sm-12">
        <div class="row" style="padding:0px">
            <div class="col-xl-6 col-md-6 col-sm-12"  style="padding:0px">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <a href="{{route('sm')}}" class="btn btn-light" style="margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px;background-color:white;color:#5e72e4">
                    <!-- <a href="{{route('sm')}}" class="btn btn-success" style="margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px"> -->
                    <i class="ni ni-email-83" style="margin-right:10px"></i> SURAT MASUK
                    </a>
                </div>
                @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin == 'user' || auth()->user()->is_admin == 'kajari')   
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <a  href="{{route('sk')}}" class="btn btn-light" style=";margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px;background-color:white;color:#5e72e4">
                    <!-- <a  href="{{route('sk')}}" class="btn btn-success" style=";margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px"> -->
                    <i class="ni ni-send" style="margin-right:10px"></i>SURAT KELUAR
                    </a>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12"  style="padding:0px">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <a   href="{{route('sr')}}" class="btn btn-light" style=";margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px;background-color:white;color:#5e72e4">
                    <!-- <a   href="{{route('sr')}}" class="btn btn-success" style=";margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px"> -->
                    <i class="ni ni-notification-70 " style="margin-right:10px"></i>SURAT PERINTAH
                    </a>
                </div>
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <a   href="{{route('sp')}}" class="btn btn-light" style=";margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px;background-color:white;color:#5e72e4">
                    <!-- <a   href="{{route('sp')}}" class="btn btn-success" style=";margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px"> -->
                    <i class="ni ni-paper-diploma " style="margin-right:10px"></i>SURAT PENGANTAR
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-12 col-sm-12">
        @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin == 'user' || auth()->user()->is_admin == 'kajari')   
        <a   href="{{route('ag_sm')}}" class="btn btn-light" style=";margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px;background-color:white;color:#5e72e4">
        <!-- <a   href="{{route('ag_sm')}}" class="btn btn-warning" style=";margin-bottom:10px;padding:2px;width:100%;height:70px;padding-top:25px;"> -->
            <i class="ni ni-single-copy-04 " style="margin-right:10px"></i>AGENDA SURAT
        </a>
        @endif
    </div>
</div>
<!-- End card -->
@endsection
