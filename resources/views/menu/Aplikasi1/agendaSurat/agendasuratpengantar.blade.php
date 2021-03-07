@extends('layouts.master')
@section('tittle')
    Agenda Surat Pengantar
@endsection 
@section('sidebar-agenda-surat')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Agenda Surat Pengantar</a>       
@endsection

@section('content')
<div class="row" style="margin-bottom:10px">
    <div class="col-xl-3 col-md-6 col-sm-12">
        <a href="{{route('ag_sm')}}" class="btn btn-light" style="margin-bottom:10px;padding:2px;width:100%">
        <i style="margin-right:10px" class="ni ni-email-83"></i>SURAT MASUK
        </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-12">
        <a  href="{{route('ag_sk')}}" class="btn btn-light" style=";margin-bottom:10px;padding:2px;width:100%">
             <i style="margin-right:10px" class="ni ni-send"></i>SURAT KELUAR
        </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-12">
        <a   href="{{route('ag_sr')}}" class="btn btn-light" style=";margin-bottom:10px;padding:2px;width:100%">
             <i style="margin-right:10px" class="ni ni-notification-70"></i>SURAT PERINTAH
        </a>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-12">
        <a   href="{{route('ag_sp')}}" class="btn btn-success" style=";margin-bottom:10px;padding:2px;width:100%">
             <i style="margin-right:10px" class="ni ni-paper-diploma "></i>SURAT PENGANTAR
        </a>
    </div>
</div>
<div class="card"  style="margin-bottom:15px">
    <div class="card-body">
        <form method="GET" action="{{route('exportDokumen_sp')}}">
            <!-- @csrf -->
            <div class="row">
                <div class="col-xl-3 col-md-4 col-sm-12">
                    <div class="form-group">Dari Tanggal :
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control datepicker @error('cari') is-invalid @enderror" required autocomplete="cari"  placeholder="Select date" type="date"  name="cari">
                            @error('cari')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-12">
                    <div class="form-group">Sampai Tanggal :
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control datepicker @error('cari2') is-invalid @enderror" required autocomplete="cari2"  placeholder="Select date" type="date"  name="cari2">
                            @error('cari2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-12">
                    <div class="form-group">Format :
						<select class="form-control @error('type') is-invalid @enderror" required autocomplete="type" id="exampleFormControlSelect1" name="type">   
                            <option >Excel</option>                            
                            <option >PDF</option>                            
                        </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
                </div>
                
                <div class="col-xl-12 col-md-12 col-sm-12" style="margin-bottom:10px">
                    <button class="btn btn-primary btn-sm">
                        <i class="ni ni-single-copy-04" style="margin-right:8px"></i>Cetak Dokumen
                    </button>
                    
                </div>
            </div>    
        </form>
    </div>
</div>
<div class="card"  style="margin-bottom:25px">
    <div class="card-body">
        <div class="row">
            <div class="col-xl-7 col-md-6 col-sm-12" style="margin-bottom:10px">
                <h1 class="card-title"> <i class="ni ni-paper-diploma" style="margin-right:10px"></i>Agenda Surat Pengantar</h1>              
            </div>
            <div class="col-xl-5 col-md-6 col-sm-12">
                <form >
                    <div class="form-group">
                        <input class="form-control" style="width:100%" placeholder="Cari Surat" type="text" name="cari">
                    </div>
                </form>
            </div>
        </div>    
    </div>
    <div class="table-responsive" style="margin-top:-30px">
        <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col" style="width:10%">Nomor</th>
                    <th scope="col" style="width:15%">Tujuan  </th>
                    <th scope="col" style="width:15%">No Surat  </th>
                    <th scope="col" style="width:10%">Tanggal Keluar</th>
                    <th scope="col" style="width:35%">Perihal</th>
                    <!-- <th scope="col" style="width:10%">Action</th> -->
                </tr>
            </thead>
            <tbody class="list">        
                <?php
                    $no = count($ag_sp)
                ?>
                @foreach($ag_sp as $x)       
                <tr>
                    <th scope="row">{{$no--}}</th>
                    <td>{{$x->tujuan}}</td>     
                    <td>{{$x->no_surat}}</td>  
                    <td>{{ date("d F Y", strtotime($x->tanggal_keluar)) }}</td>
                    <td >{{$x->perihal}}</td>
                    <!-- <td >
                    <center>
                        <div class="d-flex align-items-center">
                            <a href="" button class="btn btn-icon btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="disposisi">
                                <span class="btn-inner--icon"><i class="ni ni-box-2"></i></i></span>            
                            </a>                                             
                        </div>
                    </center>
                    </td>                            -->
                </tr>   
                @endforeach         
            </tbody>
        </table>              
    </div>
</div>
@endsection