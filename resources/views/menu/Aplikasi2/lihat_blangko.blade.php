@extends('layouts.master2')
@section('tittle')
    Pengajuan PTSP
@endsection 
@section('sidebar-beranda')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Lihat Blangko Pengajuan PTSP</a>       
@endsection
<style>
    table {
        border-collapse: collapse;
        font-family:sans-serif;
    }
    table, th, td {
        border: 1px solid black;
        font-size:12px;
    }
    .no-border{
        border: none;
        font-size:12px;
    }
</style>
@section('content')
<div class="card">
    <div class="card-body">    
        <div class="row">
            <div class="col-xl-5 col-md-12 col-sm-12">
                <a href="/blangko/{{$ptsp->id}}/downloadblangko" style="margin-bottom:10px;width:100%;height:50px;padding-top:15px" class="btn btn-success btn-sm">
                    <span>
                        <i class="ni ni-folder-17" style="margin-right:8px"></i>
                        Unduh Blangko (PDF)
                    </span>
                </a>    
                <a href="{{route('aplikasi2')}}" style="margin-bottom:10px;width:100%;height:50px;padding-top:15px" class="btn btn-primary btn-sm">
                    <span>
                        <i class="ni ni-bold-left" style="margin-right:8px"></i>
                        Kembali
                    </span>
                </a>    
            </div>   
            <div class="col-xl-12 col-md-12 col-sm-12">
                <table class="no-border" style="margin-bottom:10px;border: none;">
                    <tr>
                        <td style="border: none;">
                            <img src="/img/logo.png" alt="" width=50px height=50px style="margin-right:10px">
                        </td>
                        <td colspan=2 style="width:400px;padding:5px;border: none;">
                            <H3 style="margin:0px;margin-top:10px;margin-bottom:10px"> 
                                <b>
                                    BLANGKO LAYANAN <br>
                                    PTSP KEJAKSAAN NEGERI BATU
                                </b>
                            </H3>
                        </td>
                    </tr>
                </table>
                <div class="table-responsive table-hover">
                    <div>
                        <table border=1 style="width:420px" >      
                            <tr>
                                <td style="height:30px;padding:5px;width:100px;border: none;"   valign="top">
                                    <b>Nama</b>
                                </td>
                                <td colspan=2  style="height:30px;padding:5px;width:10px;border: none;"  valign="top">
                                    : {{ $ptsp->nama }}
                                </td>
                                <td rowspan=9 style="height:30px;padding:5px;width:140px;border: none;" valign="top">
                                    @if($ptsp->foto == null)
                                        <img src="/img/default.png" alt="" width="100%" style="background-color:#414141">
                                    @else
                                        <img src="{{ $ptsp->getFoto() }}" alt=""  width="100%">
                                    @endif
                                </td>
                            </tr>      
                            <tr>
                                <td style="height:30px;padding:5px;width:100px;border: none;"  valign="top">
                                    <b>Tanggal Layanan</b>
                                </td>
                                <td colspan=2 style="height:30px;padding:5px;width:10px;border: none;"  valign="top">
                                    :  {{ date("d - M - Y", strtotime($ptsp->tanggal_masuk)) }}
                                </td>
                            </tr>      
                            <tr>
                                <td style="height:30px;padding:5px;width:100px;border: none;"  valign="top">
                                    <b>NIK</b>
                                </td>
                                <td colspan=2  style="height:30px;padding:5px;width:10px;border: none;"  valign="top">
                                    : {{ $ptsp->nik }}
                                </td>
                            </tr>     
                            <tr>
                                <td style="height:30px;padding:5px;width:100px;border: none;"  valign="top">
                                    <b>No Telepon</b>
                                </td>
                                <td colspan=2  style="height:30px;padding:5px;width:10px;border: none;"  valign="top">
                                    : {{ $ptsp->telepon }}
                                </td>
                            </tr>   
                            <tr>
                                <td style="height:30px;padding:5px;width:100px;border: none;"  valign="top">
                                    <b>Email</b>
                                </td>
                                <td colspan=2  style="height:30px;padding:5px;width:10px;border: none;"  valign="top">
                                    : {{ $ptsp->email }}
                                </td>
                            </tr>     
                            <tr>
                                <td style="height:30px;padding:5px;width:100px;border: none;"  valign="top">
                                    <b>Pribadi/Instansi</b>
                                </td>
                                <td colspan=2  style="height:30px;padding:5px;width:10px;border: none;"  valign="top">
                                    : {{ $ptsp->instansi }}
                                </td>
                            </tr>    
                            <tr>
                                <td style="height:30px;padding:5px;width:100px;border: none;"  valign="top">
                                    <b>Alamat</b>
                                </td>
                                <td colspan=2  style="height:30px;padding:5px;width:10px;border: none;"  valign="top">
                                    : {{ $ptsp->alamat }}
                                </td>
                            </tr>     
                            <tr>
                                <td style="height:30px;padding:5px;width:100px;border: none;"  valign="top">
                                    <b>Tujuan Bidang</b>
                                </td>
                                <td colspan=2  style="height:30px;padding:5px;width:10px;border: none;"  valign="top">
                                    : {{ $ptsp->tujuan }}
                                </td>
                            </tr>      
                            <tr>
                                <td style="height:30px;padding:5px;width:100px;border: none;"  valign="top">
                                    <b>Keperluan</b>
                                </td>
                                <td colspan=2  style="height:30px;padding:5px;width:10px;border: none;"  valign="top">
                                    : {{ $ptsp->keperluan }}
                                </td>  
                            </tr>      
                        
                            <tr>
                                <td colspan=2 style="height:50px;padding:15px;width:180px">
                                    <center>
                                        Pemohon
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        (.............................)
                                    </center>
                                </td>                
                                <td colspan=2  style="height:50px;padding:15px;width:180px">
                                    <center>
                                        Petugas PTSP
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        (.............................)
                                    </center>
                                </td>
                            </tr>   
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End card -->
@endsection