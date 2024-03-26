  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('dashboard') }}" class="brand-link">
          <img src="{{ asset('assets/img/logoft.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">SISTEM POS</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  @if (Auth()->user()->image)
                      <img src="{{ Storage::url(Auth()->user()->image) }}" class="img-circle elevation-2"
                          alt="User Image">
                  @else
                      <img src="{{ asset('assets/img/user_default.png') }}" class="img-circle elevation-2"
                          alt="User Image">
                  @endif
              </div>
              <div class="info">
                  <a href="{{ route('profile.index', encrypt(auth()->user()->id)) }}"
                      class="d-block">{{ Auth()->user()->name }}</a>
                  <span class="text-white text-xs"><i class="fa fa-circle text-success"></i> Online</span>
              </div>
          </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="{{ route('dashboard') }}" class="nav-link @yield('dashboard')">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p> Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Admin</li>
            <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link @yield('admin')">
                    <i class="nav-icon ion ion-person-add"></i>
                    <p>Admin
                    </p>
                </a>
            <li class="nav-header">Jobs Description</li>
            <li class="nav-item">
                <a href="#" class="nav-link @yield('job')">
                    <i class="nav-icon ion ion-edit"></i>
                    <p>Main Jobs
                    </p>
                </a>

            <li class="nav-item">
                <a href="#" class="nav-link @yield('job')">
                    <i class="nav-icon ion ion-document-text"></i>
                    <p>Relate Jobs
                    </p>
                </a>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->

  </aside>
