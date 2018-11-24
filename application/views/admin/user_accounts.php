<div class="main-content">
	<div class="col-sm-10">
		<div class="row">
			<div class="col-sm-12">
				<a class="btn btn-float btn-lg btn-info float-md-right text-white"
				data-toggle="modal" data-target="#modal-Account" data-provide="tooltip" data-original-title="Add Account">
		<i class="ti-plus"></i>
		</a>
		</div>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Account</th>
					<th>Name</th>
					<th>Position</th>
					<th>Store</th>
					<th>Options</th>
				</thead>
			<tbody>	
			<?php foreach($employees as $_key => $_value): ?>
			<tr>
				<td><?=$_value->EmployeeId?></td>
				<td><?=$_value->EmployeeAccount?></td>
				<td><?=$_value->EmployeeAccount?></td>
				<td><?=$_value->PositionId?></td>
				<td><?=$_value->StallId?></td>
				<td><?php echo anchor("admin/edit_user/{$_value->EmployeeId}",'Update',['class' => 'btn btn-success']); ?>
				<?php echo anchor("admin/delete_user/{$_value->EmployeeId}",'Delete',['class' => 'btn btn-danger']); ?>
				</td>
			</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>

<?php include("create_account.php");?>
