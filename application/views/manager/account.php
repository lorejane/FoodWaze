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
		<?php foreach($employees as $employee): ?>
		<tr>
			<td><?php echo $employee->EmployeeId; ?></td>
			<td><?php echo $employee->EmployeeAccount; ?></td>
			<td><?php echo anchor("manager/edit_employee/".$employee->EmployeeId,'Update',['class' => 'btn btn-success']); ?>
			&nbsp;&nbsp;&nbsp;<?php echo anchor("manager/delete_employee/".$employee->EmployeeId,'Delete',['class' => 'btn btn-danger']); ?>
			</td>
		</tr>
		<?php endforeach;?>
		</tbody>
	  </table>
	</div>