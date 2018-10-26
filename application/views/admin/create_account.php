<div class="col-sm-10">
	<h3>CREATE NEW EMPLOYEE ACCOUNT</h3>
	<form class="form" role="form" action="<?php echo base_url('admin/create_user')?>" method="post">
	<div class="form-group">
	    <input type="text" class="form-control" placeholder="First Name" style="width:30%;" name="Firstname">
	</div>
	<div class="form-group">
	    <input type="text" class="form-control" placeholder="Last Name" style="width:30%;" name="Lastname">
	</div>
	<div class="form-group">
	    <input type="text" class="form-control" placeholder="Account" style="width:30%;" name="EmployeeAccount">
	</div>
	<div class="form-group">
	    <input type="text" class="form-control" placeholder="Position" style="width:30%;" name="PositionId">
	</div>	
	<div class="form-group">		
	    <input type="text" class="form-control" placeholder="Stall Number" style="width:30%;" name="StallId">
	</div>
	<div class="form-group">		
	    <input type="password" class="form-control" placeholder="Password" style="width:30%;" name="Password">
	</div>
	  	<button name="cancel" type="reset" class="btn btn-danger">Cancel</button>
	  	<button name="submit" type="submit" class="btn btn-primary">Submit</button>
	</form>