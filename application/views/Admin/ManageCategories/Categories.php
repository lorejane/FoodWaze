<header class="header">
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>Categories</strong></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
		<a class="btn btn-float btn-lg btn-info float-md-right text-white" onclick="Categories_Modal.new();"
				data-toggle="modal" data-target="#modal-Categories" data-provide="tooltip" data-original-title="Add Category">
				<i class="ti-plus"></i>
		</a>
	</div>
	</div>
</div>
</header><!--/.header -->
	<div class="card">
		<div class="card-body">
			<div class="table-responsive" style="padding-top:20px;">
						<table class="table table-responsive table-bordered display nowrap" id = "Categories-table" style="width:100%; overflow-x:auto;" 
						cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Admin/GenerateTableCategories") ?>">
							<thead>
								<tr>
									<th>Category ID</th>
									<th>Category Name</th>
									<th>Action</th>			
								</tr>
							</thead>
						</table>            			
			</div>
		</div>
	</div>

<?php include("CategoriesModal.php");?>

<script>
	$(document).ready(function () {
		Categories.init();
	});

	var Categories = {
		init: function () {
			$('.modal').on('hidden.bs.modal', function () {
				Categories.reset();
			});

		},

		reset: function () {
			$('#Categories-table').DataTable().ajax.reload();
		}
	}
</script>