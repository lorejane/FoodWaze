<div class="col-sm-12">
	<div class="card">
		<div class="card-body">
					<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Employee_Modal.new();"
	data-toggle="modal" data-target="#modal-employee" data-provide="tooltip" data-original-title="Add Employee">
		<i class="ti-plus"></i>
		</a>
			<div class="table-responsive">
						<table class="table table-responsive table-bordered display nowrap" style="width:100%; overflow-x:auto;" 
						cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("manager/GenerateTableEmployee") ?>">
							<thead>
								<tr>
									<th>EmployeeId</th>
									<th>Account</th>
									<th>Name</th>			
									<th>Position</th>
									<th>Stall</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>            			
			</div>
		</div>
	</div>