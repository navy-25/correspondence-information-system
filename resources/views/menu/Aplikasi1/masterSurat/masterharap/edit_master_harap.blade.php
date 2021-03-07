@extends('layouts.master')
@section('tittle')
    Edit Master Harap
@endsection 
@section('sidebar-master-surat')
    active
@endsection 
@section('brand')
    <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Edit Master Harap</a>       
@endsection

@section('content')
   <!-- card -->
<div class="card" style="margin-bottom:25px">
<div class="card-body">       
        <!-- form  -->
        <form method="POST" action="/masterharap/{{$mh->id}}/update">
			@csrf
            <div class="row">
              
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="">Instruksi : </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$mh->nama_harap}}" placeholder="Nama Harap" name="nama_harap">
                    </div>
                </div>
            </div>
        
        <button type="submit" class="btn btn-primary btn-sm">Save</button>
        <a href="{{route('mh')}}" class="btn btn-secondary btn-sm">Cancel</a>
       
        </form>
    </div>
</div>
@endsection
