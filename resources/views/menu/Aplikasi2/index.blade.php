@extends('layouts.master2')
@section('tittle')
    Pengajuan PTSP
@endsection 
@section('sidebar-beranda')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Data Pengajuan PTSP</a>       
@endsection

@section('content')
<!-- alert -->
@if (session('status'))            
<script> 
    window.setTimeout(function() { 
        $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ 
            $(this).remove(); 
        }); 
    }, 3000); 
</script> 

<div class="alert alert-success" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> 
</div> 
@endif 
<!-- end alert        -->
<!-- card -->
<h1 style="margin-bottom:20px;color:white"> <i class="ni ni-ni ni-paper-diploma" style="margin-right:10px"></i> <b>Data Pengajuan PTSP</b> </h1>                       
<div class="card">
    <div class="card-body">
        <div class="row" style="margin-bottom:10px">                               
            <div  class="col-xl-3 col-md-5 col-sm-12 ">      
            @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin == 'user' || auth()->user()->is_admin == 'kajari')
                <a href="{{route('ajukan_ptsp')}}" class="btn btn-primary" style="width:100%;margin-bottom:10px">
                    <i class="ni ni-fat-add"></i> 
                    Ajukan PTSP
                </a>            
            @endif
            </div>
            <div class="col-xl-5 col-md-1 col-sm-0">
            
            </div>
            <form class="col-xl-4 col-md-6  col-sm-12">
                <div class="input-group mb-2" >
                    <input type="text" style="font-size:12px" name="cari"  class="form-control" placeholder="Cari Berdasarkan Nama"> 
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
        <div class="table-responsive table-hover">
            <div>
                <table class="table align-items-center">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="width:5%">
                                <center>
                                    No
                                </center>
                            </th>
                            <!-- <th scope="col" style="width:15%">
                                <center>
                                    Foto
                                </center>
                            </th> -->
                            <th scope="col" style="width:15%">Nama</th>
                            <th scope="col" style="width:15%">Tgl. Layanan</th>
                            <!-- <th scope="col" style="width:15%">NIK</th> -->
                            <th scope="col" style="width:15%">Instansi</th>
                            <!-- <th scope="col" style="width:20%">Telepon</th> -->
                            <th scope="col" style="width:15%">Tujuan</th>
                            <th scope="col" style="width:10%">Blangko PTSP</th>
                            <th scope="col" style="width:10%">T.L Bidang</th>
                                <th scope="col" style="width:10%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php
                            $no = count($ptsp);
                        ?>
                        @foreach($ptsp as $x)          
                            <tr>    
                                <td>
                                    <center>
                                        {{$no--}}
                                    </center>
                                </td>         
                                <!-- <td> 
                                    <center>
                                        @if($x->foto!=null)
                                            <img src="{{ $x->getFoto() }}" alt="" width="60px" height="75px">
                                        @else
                                            <img src="/img/default.png" alt="" width="60px" height="75px" style="background-color:#414141">
                                        @endif
                                    </center>
                                </td>          -->
                                <td> 
                                    <a href="/ptsp/{{$x->id}}/toblangko" style="color:black" title="lihat data" >
                                        <b>
                                        {{$x->nama}}
                                        </b>
                                    </a>
                                </td>         
                                <td> {{ date("d M Y", strtotime($x->tanggal_masuk)) }}</td>   
                                <!-- <td> {{$x->nik}}</td>          -->
                                <td> {{$x->instansi}}</td>         
                                <!-- <td> {{$x->telepon}}</td>          -->
                                <td> {{$x->tujuan}}</td>         
                                <td>
                                    <a href="/blangko/{{$x->id}}/downloadblangko" class="btn btn-icon btn-success btn-sm" type="button"  title="Attach/Download">
                                        <span class="btn-inner--icon"><i class="ni ni-folder-17" style="margin-right:8px"></i></span>Unduh
                                    </a>
                                </td>   
                                <td>
                                    @if($x->tindak_lanjut_bidang==null)
                                        <button  target="_blank" class="btn btn-icon btn-danger btn-sm" type="button"  title="Attach/Download">
                                            <span class="btn-inner--icon"><i class="ni ni-folder-17" style="margin-right:8px"></i></span>Kosong
                                        </button>
                                    @else
                                        <a href="{{ $x->getTLB() }}"  target="_blank" class="btn btn-icon btn-success btn-sm" type="button"  title="Attach/Download">
                                            <span class="btn-inner--icon"><i class="ni ni-folder-17" style="margin-right:8px"></i></span>Unduh
                                        </a>
                                    @endif
                                </td>   
                                <td>                                   
                                    @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin == 'user' || auth()->user()->is_admin == 'kajari')
                                    <div class="d-flex align-items-center">
                                        <a style="font-size:11px;"href="/ptsp/{{$x->id}}/edit" class="btn btn-icon btn-warning btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="ubah data">
                                            <span class="btn-inner--icon"><i class="ni ni-settings" style="margin-right:8px"></i></span>         Ubah   
                                        </a> 
                                        <br>
                                        <a style="font-size:11px;"href="/ptsp/{{$x->id}}/hapus" class="btn btn-icon btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="hapus data" onclick="return confirm('Apakah anda yakin ?')">
                                            <span class="btn-inner--icon"><i class="ni ni-fat-remove" style="margin-right:8px"></i></span>            Hapus
                                        </a> 
                                    </div>
                                    @endif
                                    @if(auth()->user()->is_admin == 'pegawai' )
                                    <div class="d-flex align-items-center">
                                        <a style="font-size:11px;"href="/ptsp/{{$x->id}}/edit" class="btn btn-icon btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="ubah data">
                                            @if($x->tindak_lanjut_bidang == null )
                                                <span class="btn-inner--icon"><i class="ni ni-folder-17" style="margin-right:8px"></i></span>         Upload Tindak Lanjut Bidang
                                            @else
                                                <span class="btn-inner--icon"><i class="ni ni-folder-17" style="margin-right:8px"></i></span>         Revisi Tindak Lanjut Bidang   
                                            @endif
                                        </a> 
                                        <br>                                      
                                    </div>
                                    @endif
                                </td>       
                            </tr>        
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>      
        <div class="row" style="margin-top:10px">
            <div class="col-xl-5 col-md-4 col-sm-3">
            </div>                       
            <div class="col-xl-4 col-md-6  col-sm-8">            
                {{$ptsp->links()}}
            </div>
            <div  class="col-xl-3 col-md-2 col-sm-1">      
            </div>
        </div>
    <!-- </div> -->
</div>
<!-- End card -->
@endsection