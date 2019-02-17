
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
            <a id="<?php echo $this->session->userdata('StallId'); ?> " href="<?php echo base_url('manager/Profile'); ?>"><img class="avatar" src="../pics/logo.png" alt="..."></a>
          <div class="profile-info">
            <h4><?php echo $this->session->userdata('Em'); ?></h4>
            <p>Manager</p>
            
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
               <span class="icon fa fa-sign-out"></span>      
               <span class="title">Logout</span>
             
            </a>
          </li>

        </ul>
      </nav>

    </aside>
    <!-- END Sidebar -->



  
   

     
