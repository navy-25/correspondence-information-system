@extends('layouts.master')
@section('tittle')
    Klasifikasi Surat
@endsection 
@section('sidebar-master-surat')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Klasifikasi Surat</a>       
@endsection

@section('content')
<div class="row" style="margin-bottom:10px">
    <div class="col-xl-4 col-md-6 col-sm-12">
        <a href="{{route('ks')}}" class="btn btn-success" style="margin-bottom:10px;padding:2px;width:100%">
            KLASIFIKASI SURAT
        </a>
    </div>
    <div class="col-xl-4 col-md-6 col-sm-12">
        <a  href="{{route('ss')}}" class="btn btn-light" style=";margin-bottom:10px;padding:2px;width:100%">
            SIFAT SURAT
        </a>
    </div>
    <div class="col-xl-4 col-md-6 col-sm-12">
        <a   href="{{route('mh')}}" class="btn btn-light" style=";margin-bottom:10px;padding:2px;width:100%">
            INSTRUKSI LAINNYA
        </a>
    </div>    
</div>
@if (session('status'))            
<div class="alert alert-success" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> 
</div> 
@endif  

<!-- card -->
<div class="card"  style="margin-bottom:25px">
    <div class="card-body"> 
        <div class="row">
            <div class="col-8">
                <a href="{{route('ks_tambah')}}" class="btn btn-primary btn-sm" style="margin-bottom:5px">Buat Baru</a>
            </div>
            <div class="col-4" >
                <div class="form-group"style="margin-bottom:10px">
                    <form>
                        <input type="text" placeholder="Search" class="form-control" name="cari"/>
                    </form>
                </div>
            </div>
        </div>    
    </div>
    <div class="table-responsive">
        <div>
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Klasifikasi</th>
                        <th scope="col">Nama Klasifikasi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="list">   
                <?php
                    $no = count($ks);
                ?>     
                @foreach($ks as $x)    
                    <tr>
                        <td scope="row" class="name" style=" font-size:12px;">
                            {{$no--}}
                        </td>
                        <td scope="row" class="name" style=" font-size:12px;">
                            {{$x->kode_klasifikasi}}
                        </td>
                        <td scope="row" class="name" style=" font-size:12px;">
                            {{$x->nama_klasifikasi}}
                        </td>      
                        <td class="completion">
                            <div class="d-flex align-items-center">                                             
                                <a href="/klasifikasisurat/{{$x->id}}/edit" style=" font-size:10px;" class="btn btn-icon btn-warning btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="ubah data">
                                    <span class="btn-inner--icon"><i class="ni ni-settings"></i></span> Ubah
                                </a> 
                                <a href="/klasifikasisurat/{{$x->id}}/hapus_ks" style=" font-size:10px;" class="btn btn-icon btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="hapus data" onclick="return confirm('Apakah anda yakin ?')">
                                    <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span> Hapus         
                                </a> 
                            </div>
                        </td>                           
                    </tr>     
                    @endforeach       
                </tbody>
            </table>
        </div>
    </div>
    
</div>
<!-- End card -->
@endsection