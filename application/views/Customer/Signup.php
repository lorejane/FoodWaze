<html>
	<head>
		<title>FOODWAZE</title>
			<link rel="shortcut icon" type="image/png" href="../pics/iconadd.png">
			<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
			<link href="<?php echo base_url('assets/css/core.min.css' ); ?>" rel="stylesheet">
			<link href="<?php echo base_url('assets/css/app.min.css'); ?>" rel="stylesheet">
			<link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet">
	</head>
    
<div class="preloader">
      <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
      </div>
    </div><body>
	

<main class="main-container"><div class="min-h-fullscreen bg-img center-vh" style="background-image: url(../images_foodwaze/bg_fw.jpg);" data-overlay="5">

<center> 

    <div class="card card-round card-shadowed px-50 py-30 w-400px mb-0" style="max-width: 100%;">
      <h5 class="text-uppercase">Sign up</h5>
      <br>

      <form class="form-type-material" role="form" action="<?php echo base_url('Home/Login/submit')?>" method="post">
	<?php if($errror = $this->session->flashdata('login_fail')):?>
	<?php endif; ?>	

		<div class="form-group">
          <span for="username">Username</span>
          <input type="text" class="form-control" style="width:80%;" name="EmployeeAccount">
        </div>


        <div class="form-group">
         <span for="username">First Name</span> 
         <input type="text" class="form-control" style="width:80%;" name="EmployeeAccount">	
        </div>

        <div class="form-group">
			<span for="username">Last Name</span>
		    <input type="text" class="form-control" style="width:80%;" name="EmployeeAccount">
		</div>

         <div class="form-group">
      <span for="contact">Contact Number</span>
        <input type="number" class="form-control" style="width:80%;" name="ContactNumber" minlength="11" maxlength="11">
    </div>

        <div class="form-group">
			<span for="password">Password</span>
		    <input type="password" class="form-control" style="width:80%;" name="password">
		</div>


        <br>
        <div style="color:red;"><?php echo $errror;?></div>
		<button name="submit"class="btn btn-bold btn-block btn-primary" type="submit">Register</button>
    

      <hr class="w-30px">
      <p class="text-center text-muted fs-13 mt-20">Already have an account? <a class="text-primary fw-500" href="<?php echo base_url("Home/Login"); ?>">Sign in</a></p>
    </div>
     </form>

</center>

</main>

<!-- Scripts -->
<script src = "<?php echo base_url('assets/js/core.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/js/app.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/js/script.min.js'); ?>"></script>

</body>
</html>
