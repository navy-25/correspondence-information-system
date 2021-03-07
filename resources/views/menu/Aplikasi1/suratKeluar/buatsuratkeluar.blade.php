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
        <h1 class="card-title">Buat Data Surat Keluar</h1>
		<form method="POST" action="{{route('store_sk')}}">
			@csrf
        
			<div class="row">
					<div class="col-md-6">
					<div class="form-group">Tujuan :
                    <input type="text" class="form-control @error('tujuan') is-invalid @enderror" required autocomplete="tujuan" placeholder="Tujuan" name="tujuan">
					</div>
					</div>
					@error('tujuan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					<div class="col-md-6">
					<div class="form-group">Nomor Surat :
                    <input type="text" class="form-control @error('no_surat') is-invalid @enderror" required autocomplete="no_surat" placeholder="Nomor Surat" name="no_surat">
					</div>
					</div>
					@error('no_surat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
			</div>

			<div class="row">
					<div class="col-md-6">
					<div class="form-group">No. Agenda/Register :
						<input type="text" class="form-control  @error('indeks') is-invalid @enderror" required autocomplete="indeks" placeholder="Indeks" name="indeks">
					</div>
					</div>
					@error('indeks')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					<div class="col-md-6">
					<div class="form-group">Klasifikasi Surat :
						<select class="form-control @error('tujuan') is-invalid @enderror" required autocomplete="tujuan" id="exampleFormControlSelect1" name="klasifikasi_surat">   
                            @foreach($ks as $x)    
                                <option >{{$x->nama_klasifikasi}}</option>                            
                            @endforeach
                        </select>
					</div>
					</div>
					@error('klasifikasi_surat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
			</div>
			<div class="row">
					
					<div class="col-md-12">
					<div class="form-group">Perihal :
						<input type="text" class="form-control  @error('perihal') is-invalid @enderror" required autocomplete="perihal" placeholder="Perihal" name="perihal" />
					</div>
					</div>
					@error('perihal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
			</div>

			<div class="row">
					<div class="col-md-6">
					<div class="form-group">Tanggal Surat Keluar :
						<div class="input-group input-group-alternative">
							<div class="input-group-prepend">
							<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							</div>
							<input class="form-control datepicker  @error('tanggal_keluar') is-invalid @enderror" required autocomplete="tanggal_keluar" placeholder="Select date" type="date" name="tanggal_keluar" >
						</div>
					</div>
					</div>
					@error('tanggal_keluar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					<div class="col-md-6">
					<div class="form-group">Tanggal Diteruskan :
						<div class="input-group input-group-alternative">
							<div class="input-group-prepend">
							<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							</div>
							<input class="form-control datepicker  @error('tanggal_diteruskan') is-invalid @enderror" required autocomplete="tanggal_diteruskan" placeholder="Select date" type="date" name="tanggal_diteruskan" >
						</div>
					</div>
					</div>
					@error('tanggal_diteruskan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
			</div>

Isi Ringkas :
				<br><textarea class="form-control" rows="7" placeholder="Isi Ringkas" name="isi_ringkas"></textarea></br>
        
Catatan :
				<br><textarea class="form-control" rows="7" placeholder="Catatan" name="catatan"></textarea></br>

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