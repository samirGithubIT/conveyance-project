use App\Models\Department;


<div class="vertical-menu">
  <div data-simplebar class="h-100">
      <!--- Sidemenu -->
      <div id="sidebar-menu">
          <!-- Left Menu Start -->
          <ul class="metismenu list-unstyled" id="side-menu">
              <li class="menu-title" data-key="t-menu">Menu</li>

              <li>
                  <a href="{{ url('/admin/dashboard') }}">
                      <i data-feather="home"></i>
                      <span data-key="t-dashboard">Dashboard</span>
                  </a>
              </li>

              <li>
                <a href="{{ route('admin.department.index') }}">
                    <i class=" bx bx-building-house"></i>
                    <span data-key="t-calendar">Department</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.designation.index') }}">
                    <i class=" bx bx-windows"></i>
                    <span data-key="t-calendar">Designation</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.conveyance.index') }}">
                    <i class=" bx bx-taxi"></i>
                    <span data-key="t-calendar">Conveyance</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.employee.index') }}">
                    <i class="bx bx-user"></i>
                    <span data-key="t-calendar">Employee</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.conveyance-voucher.index') }}">
                    <i class="bx bx-detail"></i>
                    <span data-key="t-calendar">Voucher</span>
                </a>
            </li>

              <li class="menu-title mt-2" data-key="t-components">Elements</li>
              
          </ul>
      </div>
      <!-- Sidebar -->
  </div>
</div>