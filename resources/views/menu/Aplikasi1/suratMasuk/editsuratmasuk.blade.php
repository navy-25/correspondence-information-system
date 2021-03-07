@extends('layouts.master')
@section('tittle')
    Surat Masuk
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
        <h1 class="card-title">Ubah Surat Masuk</h1>
        <form method="POST" action="/suratmasuk/{{$sm->id}}/update">
            @csrf
                        
            <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">Dari :
                        <input type="text" class="form-control" placeholder="Dari"  name="dari" value="{{$sm->dari}}">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">Diteruskan
                        <select class="form-control" name="diteruskan" id="exampleFormControlSelect1" >                    
                            <option>{{$sm->diteruskan}}</option>
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
                        <input type="text" class="form-control" placeholder="Indeks" name="indeks" value="{{$sm->indeks}}">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">No Surat Masuk :
                        <input type="text" class="form-control" placeholder="Nomor Surat Masuk" name="no_surat" value="{{$sm->no_surat}}">
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
                            <input class="form-control datepicker" placeholder="Select date" type="date"  name="tanggal_masuk" value="{{$sm->tanggal_masuk}}">
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">Tanggal Diteruskan :
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control datepicker" placeholder="Select date" type="date" name="tanggal_diteruskan" value="{{$sm->tanggal_diteruskan}}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    
                    <div class="form-group">Klasifikasi Surat :
                        <!-- <input type="text" class="form-control" placeholder="Klasifikasi Surat" name="klasifikasi_surat"/> -->
                        <select class="form-control" id="exampleFormControlSelect1" name="klasifikasi_surat">   
                            <option >{{$sm->klasifikasi_surat}}</option>                            
                            @foreach($ks as $x)    
                                <option >{{$x->nama_klasifikasi}}</option>                            
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">Sifat Surat :
                        <!-- <input type="text" class="form-control" placeholder="Sifat Surat" name="sifat_surat"> -->
                        <select class="form-control" id="exampleFormControlSelect1" name="sifat_surat">   
                        <option >{{$sm->sifat_surat}}</option>                      
                            @foreach($ss as $x)    
                                <option >{{$x->nama_sifat_surat}}</option>                            
                            @endforeach
                        </select>
                    </div>
                </div>
            </div> 

            <div class="row">
                <div class="col-md-12">
                <div class="form-group">Perihal :
                        <input type="text" class="form-control" placeholder="Perihal" name="perihal" value="{{$sm->perihal}}"> 
                    </div>
                </div>
            </div>
            Isi Ringkas :
            <br><textarea class="form-control" rows="7" placeholder=" " name="isi_ringkas">{{$sm->isi_ringkas}}</textarea></br>
            
            
            Catatan :
            <br><textarea class="form-control" rows="7" placeholder=" " name="catatan">{{$sm->catatan}}</textarea></br>
             
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