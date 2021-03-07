@extends('layouts.master')
@section('tittle')
    Surat Masuk
@endsection 
@section('sidebar-surat-masuk')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{route('sm')}}">Surat Masuk</a>       
@endsection

@section('content')
@if (session('status'))            
<div class="alert alert-success" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> 
    <script>
        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
</div> 
@endif     
<!-- card -->
<h1 style="margin-bottom:20px;color:white"> <i class="ni ni-email-83" style="margin-right:10px"></i> <b>Daftar Surat Masuk</b> </h1>                       
<div class="card" style="margin-bottom:10px">
    <div class="card-body">
        <!-- <h1 class="card-title">Daftar Surat Masuk</h1> -->
        <div class="row">
            <div class="col-xl-7 col-md-6 col-sm-12" style="margin-bottom:10px">
                @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin=='user')
                    <a href="/buatsuratmasuk" class="btn btn-icon btn-3 btn-primary" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                        <span class="btn-inner--text">Tambah Data</span>                    
                    </a>    
                @endif
            </div>
            <div class="col-xl-5 col-md-6 col-sm-12">
                <form >
                    <div class="form-group">
                        <input class="form-control" style="width:100%" placeholder="Cari Surat" type="text" name="cari">
                    </div>
                </form>
            </div>
        </div>    
    </div>
    <div class="table-responsive" style="margin-top:-30px">
        <div>
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="5%">No</th>
                        <th scope="col" width="15%">Dari</th>
                        <th scope="col" width="20%">No Surat</th>
                        <th scope="col" width="20%">Tanggal Masuk</th>
                        <th scope="col" width="10%">Verifikasi</th>
                        <th scope="col" width="20%">Perihal</th>
                        <th scope="col" width="10%">
                        <center>
                        Sifat
                        </center>
                        </th>
                        <th scope="col" width="10%">
                        <center>
                        Klasifikasi
                        </center>
                        </th>
                        <th scope="col" width="10%">
                        <center>
                        Action
                        </center>
                        </th>
                    </tr>
                </thead>
                <tbody class="list">     
                <tr>
                <?php
                    $no = count($sm)
                ?>
                @foreach($sm as $x)       
                        <td  style=" font-size:12px;">{{$no--}}</th>
                        <td  style=" font-size:12px;">{{$x->dari}}</th>
                        <td  style=" font-size:12px;">{{$x->no_surat}}</td>
                        <td  style=" font-size:12px;"> {{ date("d F Y", strtotime($x->tanggal_masuk)) }}</td>
                        <td  style=" font-size:12px;"> 
                        @if($x->status==null)
                            Belum
                        @else
                            {{$x->status}}
                        @endif    
                        </td>
                        <td  style=" font-size:12px;">{{$x->perihal}}</td>    
                        <td  style=" font-size:12px;">
                        <center>                            
                                {{$x->sifat_surat}}                                
                        </center>
                        </td> 
                        <td style=" font-size:12px;">
                        <center>
                                {{$x->klasifikasi_surat}}                                
                        </center>
                        </td>     
                        <td >
                        <center>
                            <div class="d-flex align-items-center">
                                @if(auth()->user()->is_admin == 'pegawai')
                                    @if($x->status == null)
                                    <form method="POST" action="/suratmasuk/{{$x->id}}/verifikasi">
                                        @csrf
                                        <button style="font-size:10px;margin-right:10px" type="submit" class="btn btn-icon btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="verifikasi">
                                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>         Verifikasi   
                                        </button> 
                                    </form>
                                    @endif
                                @endif
                                <a style="font-size:10px;"href="/suratmasuk/{{$x->id}}/lihat" class="btn btn-icon btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="lihat data">
                                    <span class="btn-inner--icon"><i class="ni ni-zoom-split-in"></i></span>       Lihat     
                                </a>                 
                                @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin=='user')
                                <a style="font-size:10px;"href="/suratmasuk/{{$x->id}}/edit" class="btn btn-icon btn-warning btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="ubah data">
                                    <span class="btn-inner--icon"><i class="ni ni-settings"></i></span>         Ubah   
                                </a> 
                                <a style="font-size:10px;"href="/suratmasuk/{{$x->id}}/hapus_sm" class="btn btn-icon btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="hapus data" onclick="return confirm('Apakah anda yakin ?')">
                                    <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>            Hapus
                                </a> 
                                @endif
                                <a style="font-size:10px;"href="/suratmasuk/{{$x->id}}/disposisi" class="btn btn-icon btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="lampiran">
                                    <span class="btn-inner--icon"><i class="ni ni-collection"></i></span>            Disposisi
                                </a> 
                            </div>
                        </center>
                        </td>                           
                    </tr>   
                    @endforeach         
                </tbody>
                {{$sm->links()}}
            </table>
        </div>
    </div>    
</div>


<!-- End card -->
@endsection