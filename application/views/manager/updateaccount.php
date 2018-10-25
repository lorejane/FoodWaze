<div class="modal modal-center fade" id="modal-employee" tabindex="-1">
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
                    <form id="modal-employee-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="EmployeeId"/>
                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Position</label>
                                <select id="PositionId" name="PositionId" data-provide="selectpicker" title="Choose Employee Position" data-live-search="true" class="form-control form-type-combine show-tick"></select>
                            </div>
                            <div class="col-12">
                                <label>FirstName</label>
                                <input id="FirstName" name="Name" type="text" class="form-control" placeholder="Name" />
                            </div>
                            <div class="col-12">
                                <label>LastName</label>
                                <input id="LastName" name="Name" type="text" class="form-control" placeholder="Name" />
                            </div>
                       
                            <div class="col-12">
                                <label>Account</label>
                                <input id="EmployeeAccount" name="Username" type="text" class="form-control" placeholder="Username" />
                            </div>
                            <div class="col-12">
                                <label>Password</label>
                                <input id="Password" name="Password" type="password" class="form-control" placeholder="Password" />
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Employee_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>