 <!-- NAVIGATION
    ================================================== -->
        <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-dark" id="sidebar">
          <div class="container-fluid">

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="index.html">
              <img src="/images/icon-gbook.png" class="navbar-brand-img 
              mx-auto" alt="...">
            </a>

            <!-- User (xs) -->
            <div class="navbar-user d-md-none">

              <!-- Dropdown -->
              <div class="dropdown">
        
                <!-- Toggle -->
                <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-sm avatar-online">
                    <img src="/assets-bootstrap/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                  </div>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                  <a href="profile-posts.html" class="dropdown-item">Profile</a>
                  <a href="settings.html" class="dropdown-item">Settings</a>
                  <hr class="dropdown-divider">
                  <a href="#" data-toggle="modal" data-target="#logoutmodal" class="dropdown-item">Logout</a>
                </div>

              </div>

            </div>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">

              <!-- Form -->
              <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                  <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fe fe-search"></span>
                    </div>
                  </div>
                </div>
              </form>
              {{-- <hr class="navbar-divider my-3"> --}}
              <!-- Navigation -->
              <ul class="navbar-nav">
                  
                <li class="nav-item">
                    <a class="nav-link {{Request::segment(2) == 'dashboard' ? 'active' : ''}}" href="{{route('admin.dashboard')}}">
                        <i class="fe fe-grid"></i> Dashboard
                    </a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link">
                    <i class="fe fe-file-text"></i> Report
                  </a>
                </li> --}}
              </ul>

              <hr class="navbar-divider my-3">

              <!-- Heading -->
              <h6 class="navbar-heading">
                Register Management
              </h6>

              <!-- Navigation -->
              <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link {{Request::segment(2) == 'bukutamu' ? 'active' : ''}}" href="{{route('guest.index')}}">
                            <i class="fe fe-archive"></i> Buku Tamu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::segment(2) == 'kategori' ? 'active' : ''}}" href="{{route('category.index')}}">
                            <i class="fe fe-layers"></i> Kategori
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                      <a class="nav-link {{Request::segment(2) == 'promo' ? 'active' : ''}}" href="{{route(Request::segment(1) == 'admin' ? 'promo.index' : Request::segment(1).'.promo.index')}}">
                          <i class="fe fe-scissors "></i> Promo
                      </a>
                  </li> --}}
              </ul>
              
              <!-- Divider -->
              <hr class="navbar-divider my-3">

              <!-- Heading -->
              <h6 class="navbar-heading">
                Website Management
              </h6>
              <ul class="navbar-nav ">
                  <li class="nav-item ">
                      <a class="nav-link">
                          <i class="fe fe-home"></i> Pengaturan
                      </a>
                  </li>
                    
              </ul>
              <hr class="navbar-divider my-3">

              <!-- Heading -->
              <h6 class="navbar-heading">
                Staff Management
              </h6>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link">
                      <i class="fe fe-users "></i> Staff
                  </a>
              </li>
              </ul>


              <div class="mt-auto"></div>
      
              
              
        </nav>