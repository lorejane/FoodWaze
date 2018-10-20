<!-- <div class="container-fluid">
<div class="row">
	<div class="col-sm-2">
		<div class="btn-group-vertical" role="group" aria-label="">
			<a href="<?=base_url('admin/dashboard')?>" class="btn btn-default" role="button">Home</a>
			<a href="<?=base_url('admin/account')?>" class="btn btn-default" role="button">Manage Account</a>
			<a href="<?=base_url('home/logout')?>" class="btn btn-default" role="button">Logout</a>	
		</div>
	</div> -->
<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
    <header class="sidebar-header">
        <a class="logo-icon" href="../index.html"><img <?php echo base_url('../assets/img/logo-icon-light.png'); ?> alt="logo icon"></a>
        <span class="logo">
            <a href="../index.html"><img <?php echo base_url('../assets/img/logo-light.png'); ?> alt="logo"></a>
        </span>
        <span class="sidebar-toggle-fold"></span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">

            <li class="menu-item active">
                <a class="menu-link" href="<?php echo base_url('admin/dashboard'); ?>">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Home</span>
                </a>
            </li>            
            <li class="menu-item active">
                <a class="menu-link" href="<?php echo base_url('admin/account'); ?>">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Manage Account</span>
                </a>
            </li>            

            <li class="menu-item">
                <a class="menu-link" href="<?php echo base_url('Home/Logout'); ?>">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Logout</span>
                </a>
            </li>    

        </ul>
    </nav>

</aside>

