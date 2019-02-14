
    <!-- Preloader -->
    <div class="preloader">
      <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
      </div>
    </div>


    <!-- Sidebar style="background-color: #881A18;"  -->
    <aside style="background-color: #0f0a0a;" class="sidebar sidebar-icons-right sidebar-expand-lg sidebar-icons-boxed text-lightest sidebar-color-yellow">
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
              <a class="dropdown-item" href="<?php echo base_url('manager/Profile'); ?>"><i class="ti-user"></i> Profile</a>
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
            <a class="menu-link hover-yellow" href="<?php echo base_url('manager/Menu'); ?>">
              <span class="icon ti-briefcase"></span>
              <span class="title">Menu</span>
            </a>
          </li>

          <li class="menu-item">
            <a class="menu-link hover-yellow" href="<?php echo base_url('manager/Sales'); ?>">
              <span class="icon ti-user"></span>
              <span class="title">Sales</span>
            </a>
          </li>

          <li class="menu-item">
            <a class="menu-link hover-yellow" href="<?php echo base_url('manager/Accounts'); ?>">
              <span class="icon ti-user"></span>
              <span class="title">Account</span>
            </a>
          </li>

          <li class="menu-item">
            <a class="menu-link hover-yellow" href="<?php echo base_url('Home/Logout'); ?>">
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
          </div>

          <div class="topbar-right">
            <ul class="topbar-btns">
              <li class="dropdown">
                <span class="topbar-btn" data-toggle="dropdown"><img class="avatar avatar-sm" src="../assets/img/avatar/1.jpg" alt="..."></span>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="<?php echo base_url('manager/Profile'); ?>"><i class="ti-user"></i> Profile</a>
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


   

     
