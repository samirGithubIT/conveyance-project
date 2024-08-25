<header id="page-topbar">
  <div class="navbar-header">
      <div class="d-flex">
          <!-- LOGO -->
          <div class="navbar-brand-box">
              <div href="" class="logo logo-dark">
                  <span class="logo-sm">
                      <img src="{{ asset('assets/images/Rajit-logo.jpg') }}" alt="" height="24">
                  </span>
                  <span class="logo-lg">
                      <img src="{{ asset('assets/images/Rajit.png') }}" alt="" height="24"> <span class="logo-txt"></span>
                  </span>
              </div>
          </div>

          <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
              <i class="fa fa-fw fa-bars"></i>
          </button>
      </div>

      <div class="d-flex">
          <div class="dropdown d-none d-sm-inline-block">
              <button type="button" class="btn header-item" id="mode-setting-btn">
                  <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                  <i data-feather="sun" class="icon-lg layout-mode-light"></i>
              </button>
          </div>
          <div class="dropdown d-inline-block">
              <button type="button" class="btn header-item right-bar-toggle me-2">
                  <i data-feather="settings" class="icon-lg"></i>
              </button>
          </div>

          <div class="dropdown d-inline-block">
              <button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{-- <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                      alt="Header Avatar"> --}}
                  <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->name }}</span>
                  <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                  <!-- item-->
                  <a class="dropdown-item" href="#"><i class="mdi mdi mdi-face-man font-size-16 align-middle me-1"></i> Profile</a>
                  <div class="dropdown-divider"></div>

                  <div class="logout_panel">
                    <a class="dropdown-item" href="#"
                        onclick="
                                event.preventDefault();
                                document.getElementById('logout_user').submit(); "
                    ><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout </a>

                    <form action="{{ route('logout') }}" method="post" class="d-none" id="logout_user">
                    @csrf
                     </form>
                  </div>

              </div>
          </div>

      </div>
  </div>
</header>