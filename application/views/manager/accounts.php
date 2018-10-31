

<header class="header"> <!--header-inverse para madilim bg-ui-general-->
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title">List of Accounts</h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
			<a class="btn btn-float btn-lg btn-info float-md-left text-white"
			data-toggle="modal" data-target="#modal-Employee" data-provide="tooltip" data-original-title="Add Account">
			<i class="ti-plus"></i>
			</a>
	</div>
	</div>
</div>
</header><!--/.header -->

<div class="col-sm-12">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive" style="padding-top:20px;">
						<table class="table table-responsive table-bordered display nowrap" style="width:100%; overflow-x:auto;" 
						cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("manager/GenerateTableEmployee") ?>">
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
<?php include("newemployee.php");?>	