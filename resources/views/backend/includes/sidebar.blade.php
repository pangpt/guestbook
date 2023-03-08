<nav
      class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light"
      id="sidebar"
    >
      <div class="container-fluid">
        <!-- Toggler -->
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#sidebarCollapse"
          aria-controls="sidebarCollapse"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="./index.html">
          <img
            src="./assets/img/logo.svg"
            class="navbar-brand-img mx-auto"
            alt="..."
          />
        </a>

        <!-- User (xs) -->
        <div class="navbar-user d-md-none">
          <!-- Dropdown -->
          <div class="dropdown">
            <!-- Toggle -->
            <a
              href="#"
              id="sidebarIcon"
              class="dropdown-toggle"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <div class="avatar avatar-sm avatar-online">
                <img
                  src="./assets/img/avatars/profiles/avatar-1.jpg"
                  class="avatar-img rounded-circle"
                  alt="..."
                />
              </div>
            </a>

            <!-- Menu -->
            <div
              class="dropdown-menu dropdown-menu-right"
              aria-labelledby="sidebarIcon"
            >
              <a href="./profile-posts.html" class="dropdown-item">Profile</a>
              <a href="./account-general.html" class="dropdown-item"
                >Settings</a
              >
              <hr class="dropdown-divider" />
              <a href="./sign-in.html" class="dropdown-item">Logout</a>
            </div>
          </div>
        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">
          <!-- Form -->
          <form class="mt-4 mb-3 d-md-none">
            <div class="input-group input-group-rounded input-group-merge">
              <input
                type="search"
                class="form-control form-control-rounded form-control-prepended"
                placeholder="Search"
                aria-label="Search"
              />
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <span class="fe fe-search"></span>
                </div>
              </div>
            </div>
          </form>

          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="./widgets.html">
                <i class="fe fe-home"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./widgets.html">
                <i class="fe fe-book"></i> Buku Tamu
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./widgets.html">
                <i class="fe fe-file"></i> Laporan
              </a>
            </li>
          </ul>
          <hr class="navbar-divider" />
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="./widgets.html">
                <i class="fe fe-users"></i> Manajemen Akun
              </a>
            </li>
          </ul>
          <hr class="navbar-divider" />
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="./widgets.html">
                <i class="fe fe-settings"></i> Pengaturan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./widgets.html">
                <i class="fe fe-log-out"></i> Logout
              </a>
            </li>
          </ul>
        </div>
        <!-- / .navbar-collapse -->
      </div>
    </nav>