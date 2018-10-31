
<div class="modal modal-center fade" id="modal-Employee" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-Employee-form" action="<?php echo base_url('manager/create_employee')?>" method="post" class="form-group mt-2">
                        <input type="hidden" id="EmployeeId"/>
                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Position</label>
                                <input name="PositionId" class="form-control form-type-combine show-tick"></input>
                            </div>
                            <div class="col-12">
                                <label>FirstName</label>
                                <input name="Firstname" type="text" class="form-control" placeholder="Firt name" />
                            </div>
                            <div class="col-12">
                                <label>LastName</label>
                                <input name="Lastname" type="text" class="form-control" placeholder="Last name" />
                            </div>
                            <div class="col-12">
                                <label>Account</label>
                                <input name="EmployeeAccount" type="text" class="form-control" placeholder="Username" />
                            </div>
                            <div class="col-12">
                                <label>Stall</label>
                                <input name="StallId" type="text" class="form-control" placeholder="Username" />
                            </div>
                            <div class="col-12">
                                <label>Password</label>
                                <input id="Password" name="Password" type="password" class="form-control" placeholder="Password" />
                            </div>
                        </div>  
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                            <button name="submit" type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
