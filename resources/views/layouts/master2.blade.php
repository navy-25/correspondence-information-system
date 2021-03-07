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
      <a class="navbar-brand pt-0" href="{{route('aplikasi2')}}">
        <!-- <img src="{{asset('argon/img/brand/blue.png')}}" class="navbar-brand-img" alt="..."> -->
        <h2 style="color:#7366e4;font-size:25px"> <b>PTSP</b></h2>
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
        <h6 class="navbar-heading text-muted">PTSP</h6>
        <ul class="navbar-nav ">
            <li class="nav-item @yield('sidebar-beranda')">
                <a class="nav-link @yield('sidebar-beranda')" href="{{route('aplikasi2')}}">
                    <i class="ni ni-paper-diploma text-primary"></i> PTSP
                </a>
            </li>      
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