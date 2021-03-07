<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <!-- <div class=" dropdown-header noti-title">
        <h6 class="text-overflow m-0">Welcome!</h6>
    </div>  
    <div class="dropdown-divider"></div> -->
    <a href="{{ route('logout') }}" class="dropdown-item"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <!-- <i class="ni ni-user-run"></i> -->
    <span> {{ __('Logout') }}</span>
    
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>      
</div>