<a class="navbar-brand" href="{{ route('login') }}">
    <!-- <img src="{{asset('argon/img/brand/white.png')}}" /> -->
    <!-- <h2 style="color:white"> <b> ElatcoreAps</b> .com</h2> -->
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbar-collapse-main">
    <!-- Collapse header -->
    <div class="navbar-collapse-header d-md-none">
    <div class="row">
        <div class="col-6 collapse-brand">
        <a href="">
            <!-- <img src="{{asset('argon/img/brand/blue.png')}}"> -->
            <h2 style="color:#5e72e4">Menu</h2>
        </a>
        </div>
        <div class="col-6 collapse-close">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
            <span></span>
            <span></span>
        </button>
        </div>
    </div>
    </div>
    <!-- Navbar items -->
    <ul class="navbar-nav ml-auto">    
        @guest
            <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ route('login') }}">
                    <i class="ni ni-single-02" style="margin-right:10px"></i>
                    <span class="nav-link-inner--text">Masuk</span>
                </a>
            </li>           
            <!-- @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ __('register') }}">
                    <i class="ni ni-circle-08"></i>
                    <span class="nav-link-inner--text">Register</span>
                    </a>
                </li>
            @endif -->
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="ni ni-single-02" style="margin-right:10px"></i>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
             
            </li>          
        @endguest
    </ul>
</div>