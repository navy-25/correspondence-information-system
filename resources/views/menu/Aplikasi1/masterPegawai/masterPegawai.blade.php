@extends('layouts.master')
@section('tittle')
    Master Pegawai
@endsection 
@section('sidebar-master-pegawai')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Master Pegawai</a>       
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
<h1 style="margin-bottom:20px;color:white"> <i class="ni ni-single-02" style="margin-right:10px"></i> <b>Data Akun Pegawai</b> </h1>                       
<div class="card">
    <div class="card-body">
        <div class="row" style="margin-bottom:10px">                               
            <div  class="col-xl-3 col-md-5 col-sm-12 ">      
                <a href="" class="btn btn-primary" style="width:100%;margin-bottom:10px" data-toggle="modal" data-target="#exampleModal">
                    <i class="ni ni-fat-add"></i> 
                    Tambah Akun
                </a>            
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
        <div class="table-responsive">
            <div>
                <table class="table align-items-center">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="width:5%">
                                <center>
                                    No
                                </center>
                            </th>
                            <th scope="col" style="width:20%">Nama</th>
                            <th scope="col" style="width:20%">Username</th>
                            <th scope="col" style="width:10%">Status</th>
                            <th scope="col" style="width:20%">Jabatan</th>
                            <th scope="col" style="width:10%">Hak Akses</th>
                            <th scope="col" style="width:15%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php
                            $no = count($mp);
                        ?>
                        @foreach($mp as $x)                
                        <tr>
                            <th scope="row" class="name">
                                <div class="media align-items-center">                                  
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">
                                            <center>
                                                {{$no--}}
                                            </center>
                                        </span>
                                    </div>
                                </div>
                            </th>
                            <td >
                                {{$x->name}}
                            </td>
                            <td >
                                {{$x->username}}
                            </td>                           
                            <td >
                                <span class="badge badge-dot mr-4">
                                    <i class="bg-warning"></i>{{$x->is_admin}}
                                </span>
                            </td>  
                            <td >
                                <?php
                                    $ha = $x->hak_akses;
                                    ?>
                                <span class="badge badge-dot mr-4">
                                    @if($ha=='Sekretariatan')
                                        {{$x->hak_akses}}         
                                    @elseif($ha=='Kaur TU')
                                        {{$x->hak_akses}}                                 
                                    @elseif($ha=='Kajari')
                                        {{$x->hak_akses}}     
                                    @elseif($ha=='Pegawai')
                                        {{$x->hak_akses}}     
                                    @else
                                        {{$x->hak_akses}}     
                                    @endif
                                </span>
                            </td>      
                            <td >
                                {{$x->jabatan}}
                            </td>
                            <td >
                                <div class="d-flex align-items-center">
                                    <a href="/masterpegawai/{{$x->id}}/hapus" class="btn btn-icon btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')">   
                                        <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>            Hapus
                                    </a> 
                                </div>
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
                {{$mp->links()}}                    
            </div>
            <div  class="col-xl-3 col-md-2 col-sm-1">      
            </div>
        </div>
    <!-- </div> -->
</div>
<!-- End card -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('store_pegawai') }}">
            @csrf
            <label for="">Identitas</label>
            <div class="form-group mb-2">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input id="name" type="text" placeholder="Nama Lengkap" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-briefcase-24"></i></span>
                    </div>
                    <input id="jabatan" type="text" placeholder="Jabatan" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" required autocomplete="jabatan" autofocus>
                    @error('jabatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>           
            <label for="">Akses</label>
            <div class="form-group mb-2">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                    </div>
                    <select class="form-control" name="hak_akses" id="exampleFormControlSelect1" >                    
                        <option value="Kosong">Hak Akses</option>
                        <option value="Sekretariatan">Sekretariatan</option>
                        <option value="Kaur TU">Kaur TU</option>
                        <option value="Kajari">Kajari</option>
                        <option value="Pidum">Pidum (Pegawai)</option>
                        <option value="Pidsus">Pidsus (Pegawai)</option>
                        <option value="Datun">Datun (Pegawai)</option>
                        <option value="Intel">Intel (Pegawai)</option>
                        <option value="Kasubbagbin">Kasubbagbin (Pegawai)</option>
                        <option value="Bendahara">Bendahara (Pegawai)</option>
                        <option value="BB & Barang Rampasan">BB & Barang Rampasan (Pegawai)</option>
                    </select>
                    @error('hak_akses')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <label for="">Akun</label>
            <div class="form-group mb-2">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-satisfied"></i></span>
                    </div>
                    <input id="username" type="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>              
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password-confirm" type="password" placeholder="Konfirmasi Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>               
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
@endsection