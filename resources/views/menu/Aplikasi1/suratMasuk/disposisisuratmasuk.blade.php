@extends('layouts.master')
@section('tittle')
    Disposisi Surat Masuk
@endsection 
@section('sidebar-surat-masuk')
    active
@endsection 
@section('brand')
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Disposisi Surat Masuk</a>       
@endsection
@section('content')
@if (session('status'))            
<div class="alert alert-success" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> 
    <script>
        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
</div> 
@endif     
<!-- card -->
<div class="card">
    <div class="card-body">       
        <b><h3>Disposisi</h3> </b>
        @if(auth()->user()->is_admin == 'kajari' || auth()->user()->is_admin=='admin')
            <button type="button" style="margin-bottom:20px" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                Tambah Disposisi
            </button>
        @endif
    </div>
    <div class="table-responsive" style="margin-top:-30px">
        <div>
            <table  class="table align-items-center">
                <thead class="thead-light">
                <tr>
                    <th style="5%">No</th>
                    <th style="5%%">Harap</th>
                    <th style="15%">Pegawai yg ditunjuk</th>
                    <th style="10%">
                    <center>
                    Status
                    </center>
                    </th>
                    <th style="10%">Verifikasi</th>
                    <th style="10%%">Tgl. Verifikasi</th>
                    <th style="20%">Catatan TU</th>
                    <th style="20%">Catatan Kepala</th>
                    <th style="15%">
                    <center>
                        Action
                    </center>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = count($dp)
                ?>
                @foreach($dp as $x)       
                <tr>
                    <td>{{$no--}}</th>
                    <td>{{$x->harap}}</td>
                    <td>{{$x->pegawai_yang_tunjuk}}</td>
                    <td>
                    <center>
                    @if($x->ttd == 'Disetujui')
                    <button class="btn btn-icon btn-success btn-sm" style="font-size:10px;">
                        <!-- <i class="ni ni-check-bold" style="margin-right:8px"></i>  -->
                        {{$x->ttd}}</td>
                    </button>                    
                    @elseif($x->ttd != 'Disetujui' && auth()->user()->is_admin != 'kajari' )
                    <button class="btn btn-icon btn-danger btn-sm" style="font-size:10px;">
                        Belum dikonfirmasi</td>
                    </button>       
                    @else
                        @if(auth()->user()->is_admin == 'kajari')
                            @if($x->ttd != 'Disetujui')
                                <form action="/suratmasuk/{{$x->id}}/disposisi/konfirmasi" method="post">
                                @csrf
                                    <button  style="font-size:10px;" class="btn btn-icon btn-danger btn-sm" type="submit"  title="lihat">
                                        <span class="btn-inner--icon"><i class="ni ni-check-bold" style="margin-right:8px"></i></span>Konfirmasi Sekarang
                                    </button>
                                </form>
                            @endif
                        @endif
                    @endif
                    </center>
                    <td>{{$x->verifikasi}}</td>
                    <td> {{ date("d M Y", strtotime($x->tanggal_verifikasi)) }}</td>
                    <td>{{$x->catatan_admin_tu}}</td>
                    <td>{{$x->catatan_admin_kepala}}</td>
                    <td>
                        <center>
                           
                            <a  style="font-size:10px;" href="/disposisi_surat_masuk/{{$x->id}}/lihat"  class="btn btn-icon btn-primary btn-sm" type="button"  title="lihat">
                                <span class="btn-inner--icon"><i class="ni ni-folder-17" style="margin-right:8px"></i></span>Lihat
                            </a>                    
                            @if(auth()->user()->is_admin == 'kajari' || auth()->user()->is_admin=='admin')
                                <a  style="font-size:10px;" href="/disposisi_surat_masuk/{{$x->id}}/edit" class="btn btn-icon btn-warning btn-sm" type="button"  title="Ubah">
                                    <span class="btn-inner--icon"><i class="ni ni-settings" style="margin-right:8px"></i></span>Ubah
                                </a>               
                                <a  style="font-size:10px;" href="/disposisi_surat_masuk/{{$x->id}}/hapus"  class="btn btn-icon btn-danger btn-sm" type="button"  title="Hapus" onclick="return confirm('Apakah anda yakin ?')">
                                    <span class="btn-inner--icon"><i class="ni ni-fat-remove" style="margin-right:8px"></i></span>Hapus
                                </a>
                            @endif
                        </center>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<a style="font-size:10px;"href="{{route('sm')}}" button class="btn btn-icon btn-default btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="lihat data">
    Kembali
</a>       
<!-- End card -->

@endsection


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">    
      <div class="modal-body">
        <form method="POST" action="{{ route('store_dpsm',$sm->id) }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">Harap
                        <select class="form-control @error('harap') is-invalid @enderror" required autocomplete="harap"  id="exampleFormControlSelect1" name="harap">   
                            @foreach($mh as $x)    
                                <option >{{$x->nama_harap}}</option>                            
                            @endforeach
                        </select>
                        @error('harap')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">Pegawai Yang Ditunjuk
                        <select class="form-control" name="pegawai_yang_tunjuk" id="exampleFormControlSelect1" >                    
                            <option value="Pidum">Pidum (Pegawai)</option>
                            <option value="Pidsus">Pidsus (Pegawai)</option>
                            <option value="Datun">Datun (Pegawai)</option>
                            <option value="Intel">Intel (Pegawai)</option>
                            <option value="Kasubbagbin">Kasubbagbin (Pegawai)</option>
                            <option value="Bendahara">Bendahara (Pegawai)</option>
                            <option value="BB & Barang Rampasan">BB & Barang Rampasan (Pegawai)</option>
                        </select>
                        @error('pegawai_yang_tunjuk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>       
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">Verifikasi
                        <select class="form-control @error('verifikasi') is-invalid @enderror" required autocomplete="verifikasi"  id="exampleFormControlSelect1" name="verifikasi">   
                            <option >Sudah</option>                            
                            <option >Belum</option>  
                        </select>
                        @error('verifikasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">Tanggal Verifikasi
                    <input class="form-control datepicker @error('tanggal_verifikasi') is-invalid @enderror"  required autocomplete="tanggal_verifikasi" placeholder="Select date" type="date"  name="tanggal_verifikasi">
                        @error('tanggal_verifikasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>       
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">Catatan Kasi/Kasubbag
                        <textarea class="form-control" rows="3" placeholder=" " name="catatan_admin_tu"></textarea>
                    </div>
                </div>           
                <div class="col-md-12">
                    <div class="form-group">Catatan Admin Kepala
                        <textarea class="form-control" rows="3" placeholder=" " name="catatan_admin_kepala"></textarea>
                    </div>
                </div>           
            </div>       
            <button type="submit" class="btn btn-success btn-sm">
                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>             
                <span class="btn-inner--text">Tambahkan</span>
            </button>
        </form>
      </div>      
    </div>
  </div>
</div>
