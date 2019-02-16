<main class="main-container">

<header class="header bg-purple">
<div class="container bg-img h-200px" style="background-image: url(../pics/stalls.png)" >
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
		<a class="btn btn-float btn-lg btn-lightest float-md-right text-danger" onclick="Stall_Modal.new();"
				data-toggle="modal" data-target="#modal-Stall" data-provide="tooltip" data-original-title="Add Stall">
				<i class="ti-plus"></i>
		</a>
	</div>
	</div>
</div>
</header><!--/.header -->
	<div class="col-12">	
		<div class="card-body bg-lightest card-shadowed bl-3 border-yellow">
			<div class="table-responsive" style="padding-top:20px; ">
						<table class="table table-bordered display nowrap fs-20 text-dark" id = "Stall-table" style="width:100%; overflow-x:auto;" 
						cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("admin/GenerateStall") ?>">
							<thead>
								<tr style="background-color: #0f0a0a;">
									<th class="text-yellow">Stall Number</th>
									<th class="text-yellow">Image</th>
									<th class="text-yellow">Name</th>
									<th class="text-yellow">Action</th>			
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