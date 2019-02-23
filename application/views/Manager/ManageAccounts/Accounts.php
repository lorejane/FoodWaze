<main class="main-container bg-pale-purple">


<!--NAME NUNG STALLS-->
<header class="header">
<div class="container bg-img h-250px" style="" >
	<div class="header-info">
		<?php echo $stall->Name; ?>
	</div>
	</div>

	 <div class="preloader">
       <svg class="spinner-circle-material-svg" viewBox="0 0 50 50">
            <circle class="circle" cx="25" cy="25" r="25"></circle>
     	</svg>
    </div>
</header>
<!--end nung name ng stalls-->

<header class="header bg-pale-purple">
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
</header><!--/.header -->
	<div class="card">
		<div class="card-body">
			<div class="table-responsive" style="padding-top:20px;">
						<table class="table table-responsive table-bordered display nowrap" id = "Employee-table" style="width:100%; overflow-x:auto;" 
						cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("manager/GenerateTableEmployee") ?>">
							<thead>
								<tr style="background-color: #0f0a0a;" class="text-yellow">
									<th>Employee ID</th>
									<th>Images</th>
									<th>Account</th>
									<th>Name</th>			
									<th>Position</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>            			
			</div>
		</div>
	</div>

<?php include("AccountsModal.php");?>

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