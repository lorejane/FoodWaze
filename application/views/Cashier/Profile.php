<header class="header"> <!--header-inverse para madilim bg-ui-general-->
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>PROFILE</strong></h2>
	</div>
	</div>

</div>
</header><!--/.header -->
	<div class="card">
		<div class="card-body">
			<form id="modal-Employee-form" action="#" class="form-group mt-2">
                <input type="hidden" id="EmployeeId" name="EmployeeId" />          
                <div class="row mb-2">
                    <div class="col-12">
                        <input id="image" name="image" type="file" data-provide="dropify" data-show-remove="false" data-default-file="<?php echo base_url("pics/default.png"); ?>" style="border: solid black 1px;">
                    </div>
                </div>                         
                <div class="row mb-2">
                    <div class="col-12">
                        <label>Account</label>
                        <input id="EmployeeAccount" name="EmployeeAccount" type="text" class="form-control" placeholder="Account" <?php echo $arr['Account']; ?> />
                    </div>
                </div> 
                <div class="row mb-2">
                    <div class="col-12">
                        <label>First Name</label>
                        <input id="Firstname" name="Lastname" type="text" class="form-control" placeholder="First Name" />
                    </div>
                </div>                                                  
                <div class="row mb-2">
                    <div class="col-12">
                        <label>Last Name</label>
                        <input id="Lastname" name="Lastname" type="text" class="form-control" placeholder="Last Name" />
                    </div>
                </div>
            <!-- selectpicker -->
                <div class="row mb-2">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12" style="margin: auto;">
                        <label>Position</label>
                        <select id="PositionId" name="PositionId" data-provide="selectpicker" title="Choose Position" data-live-search="true" class="form-control show-tick"></select>
                    </div>
                </div>
            
                <div class="row mb-2">
                    <div class="col-12">
                        <label>Stall</label>
                        <select id="StallId" name="StallId" data-provide="selectpicker" title="Choose Stall" data-live-search="true" class="form-control show-tick"></select>
                    </div>
                </div> 
                <div class="row mb-2">
                    <div class="col-10">
                    <label>Password</label>
                </div>
                </div>

                <div class="row mb-2">
                    <div class="col-11">
                        <input id="Password" name="Password" type="password" class="form-control" placeholder="Password" />
                        </div>
                    <div class="col-1">
                        <span class="icon fa fa-eye" onclick="changePwdView()"></span>
                        </div>
                </div>                                                 
            </form>
		</div>
	</div>