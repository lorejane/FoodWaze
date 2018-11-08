<div class="main-content">
	<div class="col-sm-10">
		<div class="row">
			<div class="col-sm-12">
				<a class="btn btn-float btn-lg btn-info float-md-right text-white"
				data-toggle="modal" data-target="#modal-Employee" data-provide="tooltip" data-original-title="Add Account">
				<i class="ti-plus"></i>
				</a>
			</div>

	<div class="card">
		<div class="card-body">
			<div class="table-responsive" style="padding-top:20px;">
						<table class="table table-responsive table-bordered display nowrap" id = "Employee-table" style="width:100%; overflow-x:auto;" 
						cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("admin/GenerateTableEmployeeAdmin") ?>">
							<thead>
								<tr>
									<th style="width:10px;">Employee ID</th>
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

<?php include("create_account.php");?>

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