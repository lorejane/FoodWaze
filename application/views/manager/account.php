			           
<!-- header -->	
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>FoodWaze</span>Manager</a>
						</div>
						</div>
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Manager</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li  class="active"><a href="<?php echo base_url('manager/dashboard');?>"><em class="fa fa-dashboard">&nbsp;</em>DASHBOARD</a></li>
			<li><a href="<?php echo base_url('manager/menu');?>"><i class="glyphicon glyphicon-comment"></i> MENU</a></li>
			<li><a href="<?php echo base_url('manager/account');?>"><i class="glyphicon glyphicon-list-alt"></i> ACCOUNTS</a></li>
			<li><a href="<?php echo base_url('manager/account');?>"><i class="glyphicon glyphicon-list-alt"></i> SALES</a></li>
			<li><a href="<?php echo base_url('manager/logout');?>"><em class="fa fa-power-off">&nbsp;</em> LOG OUT</a></li>
</ul>
	</div>



	<!--/.sidebar--> 

<!-- Latest Blog -->
<div class="container-fluid">
		<div class="col-md-2">
		</div>
		<div class="col-md-9" style="background-color: white; box-shadow: 0px 2px 50px black;border-radius: 15px; height: 530px; margin-top: 15px">											
			<div id="contentsreservation">
				<div id = "bodyreservation"> 
			<?php echo anchor("manager/new_employee",'Create',['class' => 'btn btn-primary']); ?>
		</div>
	
	<div class="table-responsive">
					<th>Employee ID</th>
					<th>Position</th>
				</tr>
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
	</div>
	</div>
	</div>