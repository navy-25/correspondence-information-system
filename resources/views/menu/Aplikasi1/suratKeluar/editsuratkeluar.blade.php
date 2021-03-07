@extends('layouts.master')
@section('tittle')
    Surat Keluar
@endsection 
@section('sidebar-surat-keluar')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Surat Keluar</a>       
@endsection

@section('content')
<!-- card -->
<div class="card">
    <div class="card-body">
        <h1 class="card-title">Ubah Surat Keluar</h1>
		<form method="POST" action="/suratkeluar/{{$sk->id}}/update">
            @csrf
        
        <div class="row">
                <div class="col-md-6">
                <div class="form-group">Tujuan :
                    <input type="text" class="form-control" placeholder="Tujuan" name="tujuan" value="{{$sk->tujuan}}">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">Nomor Surat :
                    <input type="text" class="form-control" placeholder="Nomor Surat" name="no_surat" value="{{$sk->no_surat}}">
                </div>
                </div>
        </div>

        <div class="row">
                <div class="col-md-6">
                <div class="form-group">No. Agenda/Register :
                    <input type="text" class="form-control" placeholder="Indeks" name="indeks" value="{{$sk->indeks}}">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">Klasifikasi Surat :
						<!-- <input type="text" class="form-control" placeholder="Klasifikasi Surat" name="klasifikasi_surat" value="{{$sk->klasifikasi_surat}}"> -->
                        <select class="form-control" id="exampleFormControlSelect1" name="klasifikasi_surat">   
                            <option >{{$sk->klasifikasi_surat}}</option>                  
                            @foreach($ks as $x)    
                                <option >{{$x->nama_klasifikasi}}</option>                            
                            @endforeach
                        </select>
					</div>
                </div>
        </div>
        <div class="row">
                
                <div class="col-md-12">
                <div class="form-group">Perihal :
                    <input type="text" class="form-control" placeholder="Perihal" name="perihal" value="{{$sk->perihal}}">
                </div>
                </div>
        </div>
        <div class="row">
                <div class="col-md-6">
                <div class="form-group">Tanggal Surat Keluar :
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control datepicker" placeholder="Select date" type="date" name="tanggal_keluar" value="{{$sk->tanggal_keluar}}">
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">Tanggal Diteruskan :
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control datepicker" placeholder="Select date" type="date" name="tanggal_diteruskan" value="{{$sk->tanggal_diteruskan}}">
                    </div>
                </div>
                </div>
        </div>

			Isi Ringkas :
				<br><textarea class="form-control" rows="7" placeholder="Isi Ringkas" name="isi_ringkas">{{$sk->isi_ringkas}}</textarea></br>
        
			Catatan :
				<br><textarea class="form-control" rows="7" placeholder="Catatan" name="catatan">{{$sk->catatan}}</textarea></br>

			<a href="{{route('sk')}}" button type="button" class="btn btn-danger">
				<span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
				<span class="btn-inner--text">BATAL</span>
			</a>
			
			<button type="submit" class="btn btn-success">
				<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>             
				<span class="btn-inner--text">SIMPAN</span>
			</a>
			</form>
    </div>
</div>


<!-- End card -->

@endsection