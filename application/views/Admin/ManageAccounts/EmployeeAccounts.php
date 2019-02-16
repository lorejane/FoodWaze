<main class="main-container">
      
<header class="header  bg-purple">
<div class="container bg-img h-200px" style="background-image: url(../pics/employee.png)" >
	<div class="header-info">

	</div>
	</div>

	 <div class="preloader">
       <svg class="spinner-circle-material-svg" viewBox="0 0 50 50">
                  <circle class="circle" cx="25" cy="25" r="25"></circle>
                </svg>
                </div>
    </div>

	<div class="header-action">
	<div class="buttons">
		<a class="btn btn-float btn-lg btn-lightest float-md-right text-danger" onclick="Employee_Modal.new();"
				data-toggle="modal" data-target="#modal-Employee" data-provide="tooltip" data-original-title="Add Employee">
				<i class="ti-plus"></i>
		</a>
	</div>
	</div>
</div>
</header><!--/.<!--/.header -->
	<div class="col-12">
		<div class="card-body bg-lightest card-shadowed bl-3 border-yellow">
			<div class="table-responsive" style="padding-top:20px;">
						<table class="table table-responsive table-bordered display nowrap" id = "Employee-table" style="width:100%; overflow-x:auto;" 
						cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("admin/GenerateTableEmployee") ?>">
							<thead>
								<tr style="background-color: #0f0a0a;">
									<th class="text-yellow">Employee ID</th>
									<th class="text-yellow">Images</th>
									<th class="text-yellow">Account</th>
									<th class="text-yellow">Name</th>			
									<th class="text-yellow">Position</th>
									<th class="text-yellow">Stall</th>
									<th class="text-yellow">Action</th>
								</tr>
							</thead>
						</table>            			
			</div>
		</div>
	</div>
</div>

<?php include("EmployeesModal.php");?>

<script>
	$(document).ready(function () {
		Employee.init();
	});

	var Employee = {
		init: function () {
			$('.modal').on('hidden.bs.modal', function () {
				Employee.reset();
			});

		},

		reset: function () {
			$('#Employee-table').DataTable().ajax.reload();
		}
	}
</script>