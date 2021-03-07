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
<style>
                .it .btn-orange
                {
                    background-color: blue;
                    border-color: #777!important;
                    color: #777;
                    text-align: left;
                width:100%;
                }
                .it input.form-control
                {
                    
                    border:none;
                margin-bottom:0px;
                    border-radius: 0px;
                    border-bottom: 1px solid #ddd;
                    box-shadow: none;
                }
                .it .form-control:focus
                {
                    border-color: #ff4d0d;
                    box-shadow: none;
                    outline: none;
                }
                .fileUpload {
                    position: relative;
                    overflow: hidden;
                }
                .fileUpload input.upload {
                    position: absolute;
                    top: 0;
                    right: 0;
                    margin: 0;
                    padding: 0;
                    font-size: 20px;
                    cursor: pointer;
                    opacity: 0;
                    filter: alpha(opacity=0);
                }
            </style>    
@section('content')
<!-- card -->
<div class="card">
    <div class="card-body">
        <h1 class="card-title">Lihat Surat Masuk</h1>    
        <h3> </h3>Dari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$sm->dari}}
        <h3> </h3>No Surat Masuk &nbsp;&nbsp;  : {{$sm->no_surat}}
        <h3> </h3>Diteruskan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$sm->diteruskan}}
        <h3> </h3>No. Agenda/Registrasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : {{$sm->indeks}}
        <h3> </h3>Tgl. Surat Masuk &nbsp; : {{ date("d F Y", strtotime($sm->tanggal_masuk)) }}
        <h3> </h3>Tgl. Diteruskan &nbsp;&nbsp;&nbsp;&nbsp; :    {{ date("d F Y", strtotime($sm->tanggal_diteruskan)) }}
        <h3> </h3>Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$sm->perihal}}
        <h3> </h3>Sifat Surat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$sm->sifat_surat}}
        <h3> </h3>Klasifikasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$sm->klasifikasi_surat}}
        <br><br>
        <h3> </h3>Isi Ringkas : <br> {{$sm->isi_ringkas}}
        <br><br>
        <h3> </h3>Catatan :            <br> {{$sm->catatan}}

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
                        <a href="{{ $x->getLampiran() }}"   class="btn btn-icon btn-success btn-sm" type="button"  title="Attach/Download">
                            <span class="btn-inner--icon"><i class="ni ni-folder-17" style="margin-right:8px"></i></span>Unduh
                        </a>
                        @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin=='user')
                        <a href="/lampiran_surat_masuk/{{$x->id}}/hapus"   class="btn btn-icon btn-danger btn-sm" type="button"  title="Attach/Download" onclick="return confirm('Apakah anda yakin ?')">
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
        <br><br> <a style="font-size:10px;"href="{{route('sm')}}" button class="btn btn-icon btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="lihat data">
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
      <div class="modal-body">
        <form method="POST" action="{{ route('store_lsm',$sm->id) }}" enctype="multipart/form-data">
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

