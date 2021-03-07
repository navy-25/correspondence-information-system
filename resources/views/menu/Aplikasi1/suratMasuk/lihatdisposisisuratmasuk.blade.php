@extends('layouts.master')
@section('tittle')
    Lihat Disposisi Surat Masuk
@endsection 
@section('sidebar-surat-masuk')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Lihat Disposisi Surat Masuk</a>       
@endsection
@section('content')
<style>
    td,th{
        font-size:11px;
    }

</style>
<!-- card -->
<div class="card">
    <div class="card-body">    
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div style="margin-bottom:10px;width:100%;height:50px;padding-top:15px;padding:10px">
                    <span>
                       <b> Hasil Generate Disposisi</b>
                    </span>
                </div>    
                <a href="/disposisi_surat_masuk/{{$dsm->id}}/lihat/exportDisposisi" style="margin-bottom:10px;width:245px;height:50px;padding-top:15px" class="btn btn-success btn-sm">
                    <span>
                        <i class="ni ni-folder-17" style="margin-right:8px"></i>
                        Unduh Disposisi (PDF)
                    </span>
                </a>    
                <a href="/suratmasuk/{{$dsm->id}}/disposisi" style="margin-bottom:10px;width:245px;height:50px;padding-top:15px" class="btn btn-primary btn-sm">
                    <span>
                        <i class="ni ni-bold-left" style="margin-right:8px"></i>
                        Kembali
                    </span>
                </a>    
            </div>   
            <div class="col-xl-12 col-md-12 col-sm-12">
                <table border=1>
                    <tr>
                        <td colspan=4 style="width:500px;padding:5px">
                            <H1 style="margin:0px;margin-top:10px;margin-bottom:10px"> 
                            <CENTER>
                                <b>
                                    KEJAKSAAN NEGERI BATU
                                </b>
                            </CENTER>
                            </H1>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=4 style="width:400px;padding:5px">
                            <H3 style="margin:5px"> 
                            <CENTER>
                                <b>
                                    KARTU PENERUSAN DISPOSISI
                                </b>
                            </CENTER>
                            </H3>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:50px;padding:5px;width:100px">
                            <b> No. Agenda/Registrasi</b>
                        </td>
                        <td  style="height:50px;padding:5px;width:180px">
                            : {{$sm->indeks}}
                        </td>
                        <td   colspan=2 style="height:50px;padding:5px">
                            <b> Tingkat Keamanan </b> : <br>  {{$sm->sifat_surat}}
                        </td>
                    </tr>
                    <tr>
                        <td style="height:50px;padding:5px;width:100px">
                            <b> Perihal </b>
                        </td>
                        <td colspan=3 style="height:50px;padding:5px;width:180px">
                            : {{$sm->perihal}}
                        </td>                
                    </tr>
                    <tr>
                        <td style="height:50px;padding:5px;width:100px">
                            <b> Asal Surat </b>
                        </td>
                        <td colspan=3 style="height:50px;padding:5px;width:180px">
                            :  {{$sm->dari}}
                        </td>                
                    </tr>
                    <tr>
                        <td style="height:50px;padding:5px;width:100px">
                            <b>Isi Ringkasan </b>
                        </td>
                        <td colspan=3 style="height:50px;padding:5px;width:180px">
                            :  {{$sm->isi_ringkas}}
                        </td>                
                    </tr>
                    <tr>
                        <td style="height:50px;padding:5px;width:100px">
                            <b> Tanggal Surat </b>
                        </td>
                        <td colspan=3 style="height:50px;padding:5px;width:180px">
                            :  {{ date("d F Y", strtotime($sm->tanggal_masuk)) }}
                        </td>                
                    </tr>
                        <tr>
                        <td style="height:50px;padding:5px;width:100px">
                            <b> Diterima Tanggal </b>
                        </td>
                        <td colspan=3 style="height:50px;padding:5px;width:180px">
                            : {{ date("d F Y", strtotime($sm->tanggal_diteruskan)) }} &nbsp;&nbsp;&nbsp; <b>No. Surat</b> : {{$sm->no_surat}}
                        </td>                
                    </tr>
                    <tr>
                        <td colspan=4 style="width:400px;padding:5px">
                            <CENTER>
                                <b>
                                    Tanggal Penyelesaian &nbsp;&nbsp;&nbsp; 
                                </b>
                                : {{ date("d F Y", strtotime($dsm->tanggal_verifikasi)) }}
                            </CENTER>
                            <!-- <small style="margin:0px"> BATU </small> -->
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td colspan=2  style="height:50px;padding:5px;width:180px;border-right:none">
                            <b> Intruksi / Disposisi Kajari :  </b> <br>
                            <i>{{$dsm->catatan_admin_kepala}} </i> <br>
                         
                        </td>     
                              
                        <td style="border-left:none">
                            <center>
                            @if($dsm->ttd == 'Disetujui')
                                <img src="/img/ttd.png" alt="" width="80px" height="80px" >
                            @endif    
                            </center>
                        </td>
                        <td style="height:50px;padding:5px;width:100px">
                            Diteruskan kepada :
                            <br><br>
                            <br><br>
                            {{$sm->diteruskan}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan=3 style="height:70px;padding:5px;width:180px">
                            <b>CATATAN KASI/KASUBAG :  </b> <br>
                            
                                <i>{{$dsm->catatan_admin_tu}} </i> <br>
                        </td>                
                        <td style="height:50px;padding:5px;width:100px;">
                            Paraf : 
                            <br><br> <br><br> 
                            KAUR. TU
                        </td>
                    </tr>
                </table>
            </div>   
        </div>   
    </div>
</div>
<!-- End card -->
@endsection