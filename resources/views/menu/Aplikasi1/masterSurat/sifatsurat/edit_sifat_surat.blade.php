@extends('layouts.master')
@section('tittle')
    Edit Sifat Surat
@endsection 
@section('sidebar-master-surat')
    active
@endsection 
@section('brand')
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Edit Sifat Surat</a>       
@endsection

@section('content')
   <!-- card -->
<div class="card" style="margin-bottom:25px">
    <div class="card-body">       
        <!-- form  -->
        <form method="POST" action="/sifatsurat/{{$ss->id}}/update">
			@csrf
            <div class="row">
               
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="">Nama Sifat Surat : </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Sifat Surat" name="nama_sifat_surat" value="{{$ss->nama_sifat_surat}}">
                    </div>
                </div>
            </div>
        
        <button type="submit" class="btn btn-warning btn-sm">Save</button>
        <a href="{{route('ss')}}" class="btn btn-secondary btn-sm">Cancel</a>
       
        </form>
    </div>
</div>
@endsection
