<center>
	<div>
	<h1>LOGIN</h1>
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