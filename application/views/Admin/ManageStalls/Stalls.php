<header class="header">
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>StallS</strong></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Stall_Modal.new();"
				data-toggle="modal" data-target="#modal-Stall" data-provide="tooltip" data-original-title="Add Stall">
				<i class="ti-plus"></i>
		</a>
	</div>
	</div>
</div>
</header><!--/.header -->
	<div class="card">
		<div class="card-body">
			<div class="table-responsive" style="padding-top:20px;">
						<table class="table table-responsive table-bordered display nowrap" id = "Stall-table" style="width:100%; overflow-x:auto;" 
						cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("admin/GenerateTableStall") ?>">
							<thead>
								<tr>
									<th>Stall Number</th>
									<th >Image</th>
									<th>Name</th>
									<th>Action</th>			
								</tr>
							</thead>
						</table>            			
			</div>
		</div>
	</div>

<?php include("StallModal.php");?>

<script>
	$(document).ready(function () {
		Stall.init();
	});

	var Stall = {
		init: function () {
			$('.modal').on('hidden.bs.modal', function () {
				Stall.reset();
			});

		},

		reset: function () {
			$('#Stall-table').DataTable().ajax.reload();
		}
	}
</script>