<header class="header"> <!--header-inverse para madilim bg-ui-general-->
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>EMPLOYEES</strong></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Employee_Modal.new();"
		data-toggle="modal" data-target="#modal-Employee" data-provide="tooltip" data-original-title="Add Account">
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
								<tr>
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