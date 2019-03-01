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
	<h1>LOGIN</h1>
		<form role="form" action="<?php echo base_url('Home/Login/submit')?>" method="post">
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
			<span for="password">Password</span>
		    <input type="password" class="form-control" style="width:80%;" name="password">
			</div>

			<div class="form-group">
			<div style="color:red;"><?php echo $errror;?></div>
			<button name="submit" type="submit" class="btn btn-bold btn-primary">Submit</button>
			</div>
			<br/>
			<div class="form-group">
			<span>Go back to&nbsp;<a href="<?php echo base_url("Home/Login"); ?>">FoodWaze</a></span>
			</div>
		
		</form>
	</div>

</center>


</main>

<!-- Scripts -->
<script src = "<?php echo base_url('assets/js/core.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/js/app.min.js'); ?>"></script>
<script src = "<?php echo base_url('assets/js/script.min.js'); ?>"></script>

</body>
</html>
