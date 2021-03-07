@extends('layouts.master')
@section('tittle')
    Surat Pengantar
@endsection 
@section('sidebar-surat-pengantar')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Surat Pengantar</a>       
@endsection

@section('content')
<!-- card -->
@if (session('status'))            
<div class="alert alert-success" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>   
</div> 
@endif    
<div class="card">
    <div class="card-body">
        <h1 class="card-title">Lihat Surat Pengantar</h1>
        
        <h3></h3>Tujuan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$sp->tujuan}}


        <h3></h3>Tujuan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$sp->no_surat}}

        <h3></h3>Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$sp->perihal}}

        <h3></h3>Tanggal Surat Keluar : {{ date("d F Y", strtotime($sp->tanggal_keluar)) }}

        <h3></h3>Tanggal Diteruskan &nbsp;&nbsp; : {{ date("d F Y", strtotime($sp->tanggal_diteruskan)) }}
        <h3></h3>Klasifikasi Surat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$sp->klasifikasi_surat}}
        <br> <br>
        <h3></h3>Isi Ringkas : <br> {{$sp->isi_ringkas}}
        <br> <br>
        <h3></h3>Catatan : <br> {{$sp->catatan}}

        <br>
        <br>
        <b><h3>Lampiran</h3> </b>
        <!-- Button trigger modal -->
        @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin=='user')
        <button type="button" style="margin-bottom:10px" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
            Tambah Lampiran
        </button>
        @endif
        <div class="table-responsive">
        <div>
        <table  class="table align-items-center">
                <thead class="thead-light">
                <tr>
                    <th>id lampiran</th>
                    <th>lampiran</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach($lp as $x)       
                <tbody>
                <tr>
                    <td>{{$x->id}}</td>
                    <td>{{$x->lampiran}}</td>
                    <td>
                        <a href="{{ $x->getLampiran() }}"  target="_blank" class="btn btn-icon btn-success btn-sm" type="button"  title="Attach/Download">
                            <span class="btn-inner--icon"><i class="ni ni-folder-17" style="margin-right:8px"></i></span>Unduh
                        </a>
                        @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin=='user')
                        <a href="/lampiran_surat_pengantar/{{$x->id}}/hapus" class="btn btn-icon btn-danger btn-sm" type="button"  title="Attach/Download"onclick="return confirm('Apakah anda yakin ?')">
                            <span class="btn-inner--icon"><i class="ni ni-fat-remove" style="margin-right:8px"></i></span>Hapus
                        </a>
                        @endif
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>
            </div>
            </div>
        <br><br> <a style="font-size:10px;"href="{{route('sp')}}" button class="btn btn-icon btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="lihat data">
            Kembali
        </a>   
    </div>
</div>


<!-- End card -->

@endsection


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Lampiran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <form method="POST" action="{{ route('store_lsp',$sp->id) }}" enctype="multipart/form-data">
            @csrf
            <input class="input-file" name="lampiran" id="my-file" type="file">
            <br>
            <button style="margin-top:10px" type="submit" class="btn btn-success btn-sm">
                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>             
                <span class="btn-inner--text">TAMBAH</span>
            </button>           
        </form>
      </div>      
    </div>
  </div>
</div>

