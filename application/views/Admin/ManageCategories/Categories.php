<main class="main-container bg-pale-purple">

<header class="header">
<div class="container bg-img h-250px" style="background-image: url(../pics/categories.png)" >
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
		<a class="btn btn-float btn-lg btn-lightest float-md-right text-danger" onclick="Categories_Modal.new();"
				data-toggle="modal" data-target="#modal-Categories" data-provide="tooltip" data-original-title="Add Categories">
				<i class="ti-plus"></i>
		</a>
	</div>
	</div>
</div>
</header>
	
	<div class="card col-11	">	
		<div style="center" class="card-body card-shadowed bl-3 border-yellow">
			<div class="table-responsive" style="padding-top:10px;">
						<table class="table table-bordered display nowrap" id = "Categories-table" style="width:100%; overflow-x:auto;" 
						cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Admin/generateTableCategories") ?>">
							<thead>
								<tr style="background-color: #0f0a0a;">
									<th class="text-yellow">Category ID</th>
									<th class="text-yellow">Category Name</th>
									<th class="text-yellow">Action</th>			
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