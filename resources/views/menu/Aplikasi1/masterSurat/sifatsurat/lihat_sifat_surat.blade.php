@extends('layouts.master')
@section('tittle')
   Lihat Sifat  Surat
@endsection 
@section('sidebar-master-surat')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Lihat Sifat Surat</a>       
@endsection

@section('content')
<!-- card -->
<div class="card"  style="margin-bottom:25px">
    <div class="card-body"> 
        <h4> <b> Id : </b> 4 </h4>
        <h4> <b> Nama Sifat Surat : </b> BIASA </h4>
        <h4> <b> Created at : </b> 2019-10-29 04:11:36 </h4>
        <h4> <b> Updated at : </b> 2019-10-29 04:11:36 </h4>
    </div>
</div>
<button type="button" class="btn btn-secondary btn-sm">Back</button>
<!-- End card -->

@endsection