<header class="header">
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>Dessert</strong></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<a class="btn btn-float btn-lg btn-info float-md-right text-white"
				data-toggle="modal" data-target="#modal-Dessert" data-provide="tooltip" data-original-title="Add Account">
				<i class="ti-plus"></i>
		</a>
	</div>
	</div>
</div>
</header><!--/.header -->
	<div class="card">
		<div class="card-body">
			<div class="table-responsive" style="padding-top:20px;">
						<table class="table table-responsive table-bordered display nowrap" id = "Dessert-table" style="width:100%; overflow-x:auto;" 
						cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Menu/getDessert") ?>">
							<thead>
								<tr>
									<th>Menu ID</th>
									<th>Name</th>
									<th>Price</th>	
									<th>Action</th>			
								</tr>
							</thead>
						</table>            			
			</div>
		</div>
	</div>

<?php include("DessertModal.php");?>

<script>
	$(document).ready(function () {
		Dessert.init();
	});

	var Dessert = {
		init: function () {
			$('.modal').on('hidden.bs.modal', function () {
				Dessert.reset();
			});

		},

		reset: function () {
			$('#Dessert-table').DataTable().ajax.reload();
		}
	}
</script>