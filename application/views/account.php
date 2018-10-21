<div class="col-sm-10">
	<h3>UPDATE EMPLOYEE ACCOUNT</h3>

	<form class="form" role="form" action="<?php echo base_url('home/view')?>" method="post">
	<div class="form-group">
	    <input type="text" class="form-control" placeholder="Employee ID" style="width:30%;" readonly value="<?php echo $details->EmployeeId; ?>"  >
	</div>
	<div class="form-group">
	    <input type="text" class="form-control" placeholder="Position" style="width:30%;" readonly value="<?php echo $detailpos->Name; ?>">
	</div>	
	<div class="form-group">		
	    <input type="text" class="form-control" placeholder="Stall Number" style="width:30%;" readonly value="<?php echo $details->StallId; ?>">
	</div>
	<div class="form-group">
	    <input type="text" class="form-control" placeholder="First Name" style="width:30%;" value="<?php echo $details->Firstname; ?>" >
	</div>
	<div class="form-group">
	    <input type="text" class="form-control" placeholder="Last Name" style="width:30%;" value="<?php echo $details->Lastname; ?>">
	</div>
	<div class="form-group">
	    <input type="text" class="form-control" name="EmployeeAccount" placeholder="Account" style="width:30%;" value="<?php echo $details->EmployeeAccount; ?>">
	</div>
	<div class="form-group">		
	    <input type="password" class="form-control" placeholder="Password" style="width:30%;" name="password">
	</div>
	<div class="form-group">		
	    <input type="password" class="form-control" placeholder="New Password" style="width:30%;" name="password">
	</div>	
	  	<button name="cancel" type="cancel" class="btn btn-warning" >Cancel</button>
	  	<button name="submit" type="submit" class="btn btn-primary">Submit</button>
	</form>