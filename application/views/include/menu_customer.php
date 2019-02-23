
<header style="background-color: #d02020" class="topbar">
    <div class="topbar-left">
        <a onclick="toggleFullScreen()" class="topbar-btn d-md-block">
          <button class="btn btn-square btn-outline btn-yellow "> <i class="ti-fullscreen"></i></button>
        </a>
        <a  href="<?php echo base_url('Customer/Homepage'); ?>"><img src="../pics/foodwazelogoo.png" alt="logo icon"></a>       
    </div>

    <div class="topbar-right">        
       <div class="dropdown">
                <span class="topbar-btn" data-toggle="dropdown"><img class="avatar avatar-sm" src="../pics/logo.png" alt="..."></span>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="<?php echo base_url('Customer/Profile'); ?>"><i class="ti-user"></i> Profile</a>
                  <a class="dropdown-item" href="<?php echo base_url('Customer/Receipt'); ?>"><i class="ti-user"></i> Profile</a>
                  <a class="dropdown-item" href="<?php echo base_url('Home/Logout'); ?>"><i class="ti-power-off"></i> Logout</a>
                </div>
              </div>
    </div>
</header>

<script>
</script>