<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Si Apel Batu | @yield('tittle')   
  </title>
  <!-- Favicon -->
  <!-- <link href="{{asset('argon/img/brand/favicon.png')}}" rel="icon" type="image/png"> -->
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('argon/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
  <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('argon/css/argon-dashboard.css?v=1.1.1')}}" rel="stylesheet" />
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <!-- @yield('brand') -->
      <a class="navbar-brand pt-0" href="{{route('aplikasi1')}}">
        <!-- <img src="{{asset('argon/img/brand/blue.png')}}" class="navbar-brand-img" alt="..."> -->
        <h2 style="color:#7366e4;font-size:25px"> <b> Persuratan</b></h2>
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">       
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <!-- <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{asset('img/default.png')}}">
              </span> -->
              <i class="ni ni-single-02" style="margin-right:10px"></i>
            </div>
          </a>
          @include('includes.master.navbar-collab')        
          
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="">
                <!-- <img src="{{asset('argon/img/brand/blue.png')}}"> -->
                <h2 style="color:#7366e4;font-size:25px"> <b> Si Apel Batu</b></h2>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>       
        <!-- sidebar -->
        <h6 class="navbar-heading text-muted">Master Surat</h6>
        <ul class="navbar-nav ">
            <li class="nav-item @yield('sidebar-db')">
                <a class="nav-link @yield('sidebar-db')" href="{{route('dashboard')}}">
                    <i class="ni ni-chart-bar-32 text-primary"></i> Main Menu
                </a>
            </li>      
            @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin=='user')
            <li class="nav-item  @yield('sidebar-master-surat')">
                <a class="nav-link  @yield('sidebar-master-surat')" href="{{route('ks')}}">
                    <i class="ni ni-box-2 text-primary"></i> Master Surat
                </a>
            </li>   
            @endif
            @if(auth()->user()->is_admin == 'admin')
            <li class="nav-item  @yield('sidebar-master-pegawai')">
                <a class="nav-link  @yield('sidebar-master-pegawai')" href="{{route('mp')}}">
                    <i class="ni ni-single-02 text-primary"></i> Master Pegawai
                </a>
            </li>   
            @endif
        </ul>
        <hr class="my-3">     
        <h6 class="navbar-heading text-muted">Data Surat</h6>
        <ul  class="navbar-nav">            
            <li class="nav-item  @yield('sidebar-surat-masuk')">
                <a class="nav-link  @yield('sidebar-surat-masuk')" href="{{route('sm')}}">
                    <i class="ni ni-email-83 text-primary"></i> Surat Masuk
                </a>
            </li>       
            @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin == 'user' || auth()->user()->is_admin == 'kajari')   
            <li class="nav-item  @yield('sidebar-surat-keluar')">
                <a class="nav-link  @yield('sidebar-surat-keluar')" href="{{route('sk')}}">
                    <i class="ni ni-send text-primary"></i> Surat Keluar
                </a>
            </li>       
            <li class="nav-item  @yield('sidebar-surat-perintah')">
                <a class="nav-link  @yield('sidebar-surat-perintah')" href="{{route('sr')}}">
                    <i class="ni ni-notification-70 text-primary"></i> Surat perintah
                </a>
            </li>    
            <li class="nav-item  @yield('sidebar-surat-pengantar')">
                <a class="nav-link  @yield('sidebar-surat-pengantar')" href="{{route('sp')}}">
                    <i class="ni ni-paper-diploma text-primary"></i> Surat Pengantar
                </a>
            </li>   
            @endif
            @if(auth()->user()->is_admin == 'admin' || auth()->user()->is_admin == 'user')    
            <li class="nav-item  @yield('sidebar-agenda-surat')">
                <a class="nav-link  @yield('sidebar-agenda-surat')" href="{{route('ag_sm')}}">
                    <i class="ni ni-single-copy-04 text-primary"></i> Agenda Surat
                </a>
            </li>       
            @endif
            <!-- <li class="nav-item  @yield('sidebar-contoh')">
                <a class="nav-link  @yield('sidebar-contoh')" href="{{route('contoh')}}">
                    <i class="ni ni-bulb-61 text-primary"></i> Contoh
                </a>
            </li>    -->
        </ul>
        <hr class="my-3">     
        <ul  class="navbar-nav">            
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="ni ni-bold-left text-primary"></i> Kembali Ke Menu
                </a>
            </li>    
        </ul>   
        <!-- end sidebar -->
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        @yield('brand')   
        <!-- User -->
        @include('includes.master.navbar')         
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Content -->    
    <!-- End Content -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-7 pt-5 pt-md-7">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          @yield('content')         
        </div>
      </div>
    </div>    
  </div>
  <!--   Core   -->
  <script src="{{asset('/js/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!--   Optional JS   -->
  <script src="{{asset('/js/plugins/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('/js/plugins/chart.js/dist/Chart.extension.js')}}"></script>
  <!--   Argon JS   -->
  <script src="{{asset('/js/argon-dashboard.min.js?v=1.1.1')}}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="{{asset('bootsrap/js/bootstrap.min.js')}}" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>