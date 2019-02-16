<main class="main-container bg-pale-purple">

<header class="header">
<div class="container bg-img h-250px" style="background-image: url(../pics/menu.png)" >
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
		<a class="btn btn-float btn-lg btn-lightest float-md-right text-danger" onclick="Menu_Modal.new();"
				data-toggle="modal" data-target="#modal-Menu" data-provide="tooltip" data-original-title="Add Menu">
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
								<tr style="background-color: #0f0a0a;" class="text-yellow">
									<th>Category ID</th>
									<th>Image</th>
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