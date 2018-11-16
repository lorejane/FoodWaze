<header class="header">
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>Menu</strong></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Menu_Modal.new();"
		data-toggle="modal" data-target="#modal-Menu" data-provide="tooltip" data-original-title="Add Account">
		<i class="ti-plus"></i>
		</a>
	</div>
	</div>
</div>
</header><!--/.header -->
	<div class="card">
		<div class="card-body">
			<div class="table-responsive" style="padding-top:20px;">
						<table class="table table-responsive table-bordered display nowrap" id = "Menu-table" style="width:100%; overflow-x:auto;" 
						cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Manager/generateTableMenus") ?>">
							<thead>
								<tr>
									<th>Category ID</th>
									<th>Name</th>
									<th>Price</th>	
									<th>Action</th>			
								</tr>
							</thead>
						</table>            			
			</div>
		</div>
	</div>

<?php include("MenuModal.php");?>

<script>
	$(document).ready(function () {
		Menu.init();
	});

	var Menu = {
		init: function () {
			$('.modal').on('hidden.bs.modal', function () {
				Menu.reset();
			});

		},

		reset: function () {
			$('#Menu-table').DataTable().ajax.reload();
		}
	}
</script>