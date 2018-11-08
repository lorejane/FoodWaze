<html>
	<head>
		<title>FOODWAZE</title>
			<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
			<link href="<?php echo base_url('assets/css/core.min.css' ); ?>" rel="stylesheet">
			<link href="<?php echo base_url('assets/css/app.min.css'); ?>" rel="stylesheet">
			<link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet">
	</head>
<body>
	
<main class="main-container">
<center>
	<div>
	<h1 style="padding-top: 50px;">LOGIN</h1>
		<form role="form" action="<?php echo base_url('home/login/submit')?>" method="post">
	<?php if($errror = $this->session->flashdata('login_fail')):?>
	<?php endif; ?>	
			<div class="form-group">
				
		    <input type="text" class="form-control" placeholder="Account" style="width:20%;" name="EmployeeAccount">
			</div>
			<div class="form-group">
		    <input type="password" class="form-control" placeholder="Password" style="width:20%;"name="password">
			</div>
			<div style="color:red;"><?php echo $errror;?></div>
		  	<button name="submit" type="submit" class="btn btn-primary">Submit</button>
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
