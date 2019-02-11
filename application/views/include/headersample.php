
    <!-- Preloader -->
    <div class="preloader">
      <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
      </div>
    </div>


    <!-- Sidebar style="background-color: #881A18;"  -->
    <aside style="background-color: #1b1919 ;" class="sidebar sidebar-icons-right sidebar-icons-boxed text-lightest sidebar-color-yellow">
      <header class="sidebar-header bg-lightest b-3 border-dark">
        <span class="logo">
          <a><img src="../pics/logo.png" alt="logo"></a>
        </span>
        <a><img src="../pics/foodwazelogoo.png" alt="logo icon"></a>
        <span class="sidebar-toggle-fold"></span>
      </header>

      <nav class="sidebar-navigation">

        <div class="sidebar-profile">
          <div class="dropdown">
            <span class="dropdown-toggle no-caret" data-toggle="dropdown"><img class="avatar" src="../assets/img/avatar/1.jpg" alt="..."></span>
            <div class="dropdown-menu open-top-center">
              <a class="dropdown-item" href="<?php echo base_url('Admin/Stalls'); ?>"><i class="ti-user"></i> Profile</a>
              <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
              <a class="dropdown-item" href="#"><i class="ti-help"></i> Help</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><i class="ti-power-off"></i> Logout</a>
            </div>
          </div>
          <div class="profile-info">
            <h4>Maryam Amiri</h4>
            <p>Web developer</p>
          </div>
        </div>

        <ul class="menu menu-lg menu-bordery">

          <li class="menu-item">
            <a class="menu-link hover-yellow" href="#">
              <span class="icon ti-home"></span>
              <span class="title">
                <span>Dashboard</span>
              </span>
            </a>
          </li>

          <li class="menu-item">
            <a class="menu-link hover-yellow" href="<?php echo base_url('Admin/Categories'); ?>">
              <span class="icon ti-briefcase"></span>
              <span class="title">Category</span>
            </a>
          </li>

          <li class="menu-item">
            <a class="menu-link hover-yellow" href="<?php echo base_url('Admin/Stalls'); ?>">
              <span class="icon ti-user"></span>
              <span class="title">Stall</span>
            </a>
          </li>

          <li class="menu-item">
            <a class="menu-link hover-yellow" href="<?php echo base_url('Admin/Accounts'); ?>">
              <span class="icon ti-user"></span>
              <span class="title">Account</span>
            </a>
          </li>

          <li class="menu-item">
            <a class="menu-link hover-yellow" href="<?php echo base_url('home/login'); ?>">
              <span class="title">Logout</span>
              <span class="icon ti-logout"></span>
            </a>
          </li>

        </ul>
      </nav>

    </aside>
    <!-- END Sidebar -->


    <!-- Topbar -->
    <header style="background-color: #cf1b1b"class="topbar topbar">
          <div class="topbar-left">
            <button class="topbar-btn sidebar-toggler">&#9776;</button>
            <h3 class="topbar-title text-white">FOODWAZE</h3>

            <div class="topbar-divider d-none d-md-block"></div>

            <div class="dropdown d-none d-md-block">
              <div class="dropdown-menu dropdown-grid">
                <a class="dropdown-item" href="#">
                  <span data-i8-icon="compact_camera"></span>
                  <span class="title">Camera</span>
                </a>
                <a class="dropdown-item" href="#">
                  <span data-i8-icon="stack_of_photos"></span>
                  <span class="title">Gallery</span>
                </a>
                <a class="dropdown-item" href="#">
                  <span data-i8-icon="folder"></span>
                  <span class="title">Files</span>
                </a>
                <a class="dropdown-item" href="#">
                  <span data-i8-icon="start"></span>
                  <span class="title">Video</span>
                </a>
                <a class="dropdown-item" href="#">
                  <span data-i8-icon="music"></span>
                  <span class="title">Music</span>
                </a>
                <a class="dropdown-item" href="#">
                  <span data-i8-icon="news"></span>
                  <span class="title">News</span>
                </a>
                <a class="dropdown-item" href="#">
                  <span data-i8-icon="contacts"></span>
                  <span class="title">Contacts</span>
                </a>
                <a class="dropdown-item" href="#">
                  <span data-i8-icon="download"></span>
                  <span class="title">Download</span>
                </a>
                <a class="dropdown-item" href="#">
                  <span data-i8-icon="settings"></span>
                  <span class="title">Settings</span>
                </a>
              </div>
            </div>
          </div>

          <div class="topbar-right">
            <ul class="topbar-btns">
              <li class="dropdown">
                <span class="topbar-btn" data-toggle="dropdown"><img class="avatar avatar-sm" src="../assets/img/avatar/1.jpg" alt="..."></span>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="<?php echo base_url('Admin/Profile'); ?>"><i class="ti-user"></i> Profile</a>
                  <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                  <a class="dropdown-item" href="#"><i class="ti-help"></i> Help</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="ti-power-off"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>

              <!-- Notifications -->
            <!-- Main container -->
    
        </header>
    <!-- END Topbar -->


   

     
