@extends('layouts.master')
@section('tittle')
    Edit Klasifikasi Surat
@endsection 
@section('sidebar-master-surat')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Edit Klasifikasi Surat</a>       
@endsection

@section('content')
   <!-- card -->
<div class="card" style="margin-bottom:25px">
    <div class="card-body">       
        <!-- form  -->
        <form method="POST" action="/klasifikasisurat/{{$ks->id}}/update">
			@csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="">Kode Klasifikasi : </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kode Klasifikasi" name="kode_klasifikasi" value="{{$ks->kode_klasifikasi}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="">Nama Klasifikasi : </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Klasifikasi" name="nama_klasifikasi" value="{{$ks->nama_klasifikasi}}">
                    </div>
                </div>
            </div>
        
        <button type="submit" class="btn btn-warning btn-sm">Save</button>
        <a href="{{route('ks')}}" class="btn btn-secondary btn-sm">Cancel</a>
       
        </form>
    </div>
</div>
@endsection