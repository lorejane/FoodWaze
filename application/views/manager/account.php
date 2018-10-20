<div class="col-sm-10">
	<div class="row">
		<div class="col-sm-12">
			<?php echo anchor("manager/new_employee",'Create',['class' => 'btn btn-primary']); ?>
		</div>
	</div>
	<div class="table-responsive">
	  <table class="table table-hover">
			<thead>
				<th>ID</th>
				<th>Account</th>
				<th>Options</th>
			</thead>
		<tbody>	
		<?php foreach($employees as $_key => $_value): ?>
		<tr>
			<td><?=$_value->EmployeeId?></td>
			<td><?=$_value->EmployeeAccount?></td>
			<td><?php echo anchor("manager/edit_employee/{$_value->EmployeeId}",'Update',['class' => 'btn btn-success']); ?>
			&nbsp;&nbsp;&nbsp;<?php echo anchor("manager/delete_employee/{$_value->EmployeeId}",'Delete',['class' => 'btn btn-danger']); ?>
		</tr>
		<?php endforeach;?>
		</tbody>
	  </table>
	</div>