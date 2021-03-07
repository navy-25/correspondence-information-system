@extends('layouts.master2')
@section('tittle')
    Ajukan PTSP
@endsection 
@section('sidebar-beranda')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Ajukan PTSP</a>       
@endsection


@section('content')
<!-- card -->
<div class="card">
    <div class="card-body">
        @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin == 'user' || auth()->user()->is_admin == 'kajari' || auth()->user()->is_admin == 'kaurtu')
        <h1 class="card-title">Edit Pengajuan PTSP</h1>
        @endif
        <form method="POST" action="/ptsp/{{$ptsp->id}}/update"  enctype="multipart/form-data">
            @csrf
            @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin == 'user' || auth()->user()->is_admin == 'kajari' || auth()->user()->is_admin == 'kaurtu')          
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">Nama Pengaju
                        <input id="nama" type="text" placeholder="Nama Pengaju" value="{{$ptsp->nama}}" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus >
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">NIK
                    <input id="nik" type="text" placeholder="NIK (Sesuai KTP)" value="{{$ptsp->nik}}" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>
                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">Alamat
                    <input id="alamat" type="text" placeholder="Alamat Lengkap" value="{{$ptsp->alamat}}" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">Instansi
                        <input id="instansi" type="text" placeholder="Instansi" value="{{$ptsp->instansi}}" class="form-control @error('instansi') is-invalid @enderror" name="instansi" value="{{ old('instansi') }}" required autocomplete="instansi" autofocus>
                        @error('instansi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">No Telepon
                    <input id="telepon" type="text" placeholder="Nomor Telepon Aktif yang bisa dihubungi" value="{{$ptsp->telepon}}" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" required autocomplete="telepon" autofocus>
                        @error('telepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">Email (Boleh Kosong)
                    <input id="email" type="email" placeholder="Email Aktif" class="form-control" name="email" value="{{$ptsp->email}}" value="{{ old('email') }}" autofocus>                      
                    </div>
                </div>
                
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">Tanggal Layanan :
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control datepicker @error('tanggal_masuk') is-invalid @enderror"  value="{{$ptsp->tanggal_masuk}}"  required autocomplete="tanggal_masuk" placeholder="Select date" type="date"  name="tanggal_masuk">
                            @error('tanggal_masuk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">Tujuan
                        <select class="form-control" id="exampleFormControlSelect1"  class="form-control @error('tujuan') is-invalid @enderror" name="tujuan">   
                            <option >{{$ptsp->tujuan}}</option>         
                            <option >Pidum</option>                            
                            <option >Pidsus</option>                            
                            <option >Datun</option>                            
                            <option >Intel</option>                            
                            <option >BB & Rampasan</option>                            
                            <option >Pembinaan</option>                            
                        </select>
                        @error('tujuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                @if(auth()->user()->is_admin != 'pegawai' || auth()->user()->is_admin == 'admin' )
                <div class="col-xl-5 col-md-6 col-sm-12">
                    <div class="form-group">Foto Pengaju <br>
                        <input class="input-file" name="foto" id="my-file" type="file">
                    </div>
                </div>       
                @endif
                @if(auth()->user()->is_admin == 'pegawai' || auth()->user()->is_admin == 'admin' )
                <div class="col-xl-5 col-md-6 col-sm-12">
                    <div class="form-group">Tindak Lanjut Bidang
                        <input class="input-file" name="tindak_lanjut_bidang" id="my-file" type="file">
                    </div>
                </div>               
                @endif
            </div>
            @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin == 'user' || auth()->user()->is_admin == 'kajari' || auth()->user()->is_admin == 'kaurtu')
            Keperluan
            <br><textarea class="form-control" rows="4" placeholder=" " name="keperluan">{{$ptsp->keperluan}}</textarea></br>
            @endif
            <a href="{{route('aplikasi2')}}" button type="button" class="btn btn-danger">
                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                <span class="btn-inner--text">BATAL</span>
            </a>

            <button type="submit" class="btn btn-success">
                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>             
                <span class="btn-inner--text">AJUKAN</span>
            </button>

            
        </form>
    </div>
</div>
<!-- End card -->
@endsection