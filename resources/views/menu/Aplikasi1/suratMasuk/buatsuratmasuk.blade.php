@extends('layouts.master')
@section('tittle')
    Buat Surat Masuk
@endsection 
@section('sidebar-surat-masuk')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Surat Masuk</a>       
@endsection

@section('content')
<!-- card -->
<div class="card">
    <div class="card-body">
        <h1 class="card-title">Buat Data Surat Masuk</h1>
        <form method="POST" action="{{ route('store_sm') }}">
            @csrf
                        
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">Dari :
                        <input type="text" class="form-control @error('dari') is-invalid @enderror" required autocomplete="dari"  placeholder="Dari"  name="dari">
                        @error('dari')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">Diteruskan
                        <select class="form-control" name="diteruskan" id="exampleFormControlSelect1" >                    
                            <option value="Pidum">Pidum (Pegawai)</option>
                            <option value="Pidsus">Pidsus (Pegawai)</option>
                            <option value="Datun">Datun (Pegawai)</option>
                            <option value="Intel">Intel (Pegawai)</option>
                            <option value="Kasubbagbin">Kasubbagbin (Pegawai)</option>
                            <option value="Bendahara">Bendahara (Pegawai)</option>
                            <option value="BB & Barang Rampasan">BB & Barang Rampasan (Pegawai)</option>
                        </select>
                        @error('diteruskan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                  
            </div>

            <div class="row">
                   
                    <div class="col-md-6">
                    <div class="form-group">No. Agenda/Registrasi :
                        <input type="text" class="form-control @error('indeks') is-invalid @enderror"  required autocomplete="indeks"  placeholder="Indeks" name="indeks"/>
                        @error('indeks')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">No Surat Masuk :
                        <input type="text" class="form-control @error('no_surat') is-invalid @enderror" required autocomplete="no_surat"  placeholder="Nomor Surat Masuk" name="no_surat" />
                        @error('no_surat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">Tanggal Surat Masuk :
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control datepicker @error('tanggal_masuk') is-invalid @enderror"  required autocomplete="tanggal_masuk" placeholder="Select date" type="date"  name="tanggal_masuk">
                            @error('tanggal_masuk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">Tanggal Diteruskan :
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control datepicker @error('tanggal_diteruskan') is-invalid @enderror" required autocomplete="tanggal_diteruskan"  placeholder="Select date" type="date" name="tanggal_diteruskan">
                            @error('tanggal_diteruskan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    
                    <div class="form-group">Klasifikasi Surat :
                        <!-- <input type="text" class="form-control" placeholder="Klasifikasi Surat" name="klasifikasi_surat"/> -->
                        <select class="form-control @error('klasifikasi_surat') is-invalid @enderror" required autocomplete="klasifikasi_surat"  id="exampleFormControlSelect1" name="klasifikasi_surat">   
                            @foreach($ks as $x)    
                                <option >{{$x->nama_klasifikasi}}</option>                            
                            @endforeach
                        </select>
                        @error('klasifikasi_surat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">Sifat Surat :
                        <!-- <input type="text" class="form-control" placeholder="Sifat Surat" name="sifat_surat"> -->
                        <select class="form-control @error('sifat_surat') is-invalid @enderror" required autocomplete="sifat_surat"  id="exampleFormControlSelect1" name="sifat_surat">   
                            @foreach($ss as $x)    
                                <option >{{$x->nama_sifat_surat}}</option>                            
                            @endforeach
                        </select>
                        @error('sifat_surat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
            </div> 

            <div class="row">
                <div class="col-md-12">
                <div class="form-group">Perihal :
                        <input type="text" class="form-control @error('perihal') is-invalid @enderror" required autocomplete="perihal"  placeholder="Perihal" name="perihal"> 
                        @error('perihal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
            </div>
            
            Isi Ringkas :
            <br><textarea class="form-control" rows="7" placeholder=" " name="isi_ringkas"></textarea></br>
            
            
            Catatan :
            <br><textarea class="form-control" rows="7" placeholder=" " name="catatan"></textarea></br>
             
            <a href="{{route('sm')}}" button type="button" class="btn btn-danger">
                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                <span class="btn-inner--text">BATAL</span>
            </a>

            <button type="submit" class="btn btn-success">
                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>             
                <span class="btn-inner--text">SIMPAN</span>
            </button>

            
        </form>
    </div>
</div>
<!-- End card -->
@endsection