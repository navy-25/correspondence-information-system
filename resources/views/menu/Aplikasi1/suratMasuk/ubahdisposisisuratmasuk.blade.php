@extends('layouts.master')
@section('tittle')
    Disposisi Surat Masuk
@endsection 
@section('sidebar-surat-masuk')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Ubah Disposisi Surat Masuk</a>       
@endsection
@section('content')
<!-- card -->
<div class="card">
    <div class="card-body">       
        <form method="POST" action="/disposisi_surat_masuk/{{$dsm->id}}/update">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">Harap
                        <select class="form-control @error('harap') is-invalid @enderror" required autocomplete="harap"  id="exampleFormControlSelect1" name="harap">   
                            <option>{{$dsm->harap}}</option>
                            @foreach($mh as $x)    
                                <option >{{$x->nama_harap}}</option>                            
                            @endforeach
                        </select>
                        @error('harap')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">Pegawai Yang Ditunjuk
                        <select class="form-control" name="pegawai_yang_tunjuk" id="exampleFormControlSelect1" >                    
                            <option >{{$dsm->pegawai_yang_tunjuk}}</option>
                            <option value="Pidum">Pidum (Pegawai)</option>
                            <option value="Pidsus">Pidsus (Pegawai)</option>
                            <option value="Datun">Datun (Pegawai)</option>
                            <option value="Intel">Intel (Pegawai)</option>
                            <option value="Kasubbagbin">Kasubbagbin (Pegawai)</option>
                            <option value="Bendahara">Bendahara (Pegawai)</option>
                            <option value="BB & Barang Rampasan">BB & Barang Rampasan (Pegawai)</option>
                        </select>
                        @error('pegawai_yang_tunjuk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>       
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">Verifikasi
                        <select class="form-control @error('verifikasi') is-invalid @enderror" required autocomplete="verifikasi"  id="exampleFormControlSelect1" name="verifikasi">   
                            <option >{{$dsm->verifikasi}}</option>
                            <option >Sudah</option>                            
                            <option >Belum</option>  
                        </select>
                        @error('verifikasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">Tanggal Verifikasi
                    <input class="form-control datepicker @error('tanggal_verifikasi') is-invalid @enderror" value="{{$dsm->tanggal_verifikasi}}"  required autocomplete="tanggal_verifikasi" placeholder="Select date" type="date"  name="tanggal_verifikasi">
                        @error('tanggal_verifikasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>       
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">Catatan Kasi/Kasubbag
                        <textarea class="form-control" rows="3" placeholder=" " name="catatan_admin_tu">{{$dsm->catatan_admin_tu}}</textarea>
                    </div>
                </div>           
                <div class="col-md-12">
                    <div class="form-group">Catatan Admin Kepala
                        <textarea class="form-control" rows="3" placeholder=" " name="catatan_admin_kepala">{{$dsm->catatan_admin_kepala}}</textarea>
                    </div>
                </div>           
            </div>       
            <button type="submit" class="btn btn-warning btn-sm">
                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>             
                <span class="btn-inner--text">Simpan</span>
            </button>
        </form>
    </div>
</div>
@endsection
