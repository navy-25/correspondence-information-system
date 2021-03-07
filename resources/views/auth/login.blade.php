@extends('layouts.applogin')
@section('tittle')
    Login Account
@endsection 
@section('header')
<div class="container">
    <div class="header-body text-center mb-6" style="height:50px">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
                <h1 class="text-white">Login Account<br>
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
                @guest
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-satisfied"></i></span>
                                </div>
                                <input id="email" type="text" placeholder="Username" class="form-control @error('username') is-invalid @enderror" name="username"  value="{{ old('username') }}" required autocomplete="username" autofocus>
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
                                <input id="password"  placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                
                        <div class="text-center">
                        <button type="submit" style="width:100%" class="btn btn-primary"> {{ __('Login') }}</button>
                        </div>
                    </form>
                @else                    
                    <a href="{{route('home')}}" style="width:100%" class="btn btn-primary"> {{ __('Anda Sudah Login') }} <br> Pergi Ke Main menu ! </a>
                @endguest                
            </div>
        </div>                
    </div>
</div>
@endsection
@section('footer')
<div class="col-xl-6" >
    <div class="copyright text-center text-xl-left text-muted">
    © 2020 Created by <b>V</b>tim
    </div>
</div>
<div class="col-xl-6">
    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
        <li class="nav-item">
            <p>Kejaksaan Negeri Batu</p>
        </li>                   
    </ul>
</div>
@endsection