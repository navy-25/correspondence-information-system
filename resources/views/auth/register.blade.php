@extends('layouts.applogin')
@section('tittle')
    Register Account
@endsection 
@section('header')
<div class="container">
    <div class="header-body text-center mb-6" style="height:50px">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
                <h1 class="text-white">Register Account<br> to 
                    <b>Si Apel Batu</b>
                    <br>
                    <h4 style="color:white;margin-top:-10px;">
                        Sistem Aplikasi Pelayanan Kejaksaan Negeri Batu
                    </h4>
                </h1>             
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row justify-content-center" style="margin-top:20px">
    <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">              
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                            </div>
                            <input id="name" type="text" placeholder="Nama Lengkap" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-satisfied"></i></span>
                            </div>
                            <input id="username" type="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>              
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input id="password-confirm" type="password" placeholder="Konfirmasi Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>               
                    <div class="text-center" >
                      <button type="submit" style="width:100%;margin-bottom:20px" class="btn btn-primary"> {{ __('Register') }}</button>
                      <a href="{{ route('login') }}" style="width:100%" class="btn btn-light"> {{ __('Sudah Punya Akun') }}</a>
                    </div>
                </form>
            </div>
        </div>                
    </div>
</div>
@endsection