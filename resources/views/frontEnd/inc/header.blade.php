<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/Rajit-logo.jpg') }}" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/Rajit.png') }}" alt="" height="24"> <span class="logo-txt"></span>
                    </span>
                </a>
            </div>
  
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

            <div class="header-menu ">
                <nav>
                    @if (Auth::check() && Auth::user()->adminSection())

                    <a href="{{ url('/admin/dashboard') }}" class="d-flex"> <i class="dripicons-alarm dripicons-store ms-2"></i><h5 class="me-3">Admin Page</h5></a>   

                    @else
                        
                    <div class="ltn__main-menu d-flex">
                        <a href="{{ url('/') }}" class="d-flex"> <i class="dripicons-alarm dripicons-store ms-2"></i><h5 class="me-3">Home</h5></a>   
                        <a href="{{ route('voucher.form') }}" class="d-flex"> <i class="bx bx-detail ms-2"></i><h5 class="me-3">Fill Up</h5></a>   
                        <a href="{{ url('/billing-details') }}" class="d-flex "><i class="fas fa-ad  fas fa-address-card"></i><h5>Details</h5></a>   
                    </div>
                    
                    @endif
                </nav> 
            </div>
  
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                        alt="Header Avatar"> --}}
                        <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->name ?? 'guest'}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="apps-contacts-profile.html"><i class="mdi mdi mdi-face-man font-size-16 align-middle me-1"></i> {{ Auth::user()->name ?? 'guest' }}</a>
                    <div class="dropdown-divider"></div>
  
                    <div class="logout_panel">
                      @auth

                      <a class="dropdown-item" href=""
                      onclick="
                              event.preventDefault();
                              document.getElementById('logout_user').submit(); "
                  ><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout </a>

                  <form action="{{ route('employee.logout') }}" method="post" class="d-none" id="logout_user">
                  @csrf
                   </form>

                   @else

                   <a class="dropdown-item" href="{{ route('login') }}"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Login </a>
                   <a class="dropdown-item" href="{{ route('register') }}"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Register </a>

                   @endauth
                    </div>
  
                </div>
            </div>
  
        </div>
    </div>
  </header>