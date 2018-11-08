<!---

<div class="modal modal-center fade" id="modal-Account" tabindex="-1">
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
                    <form id="modal-Account-form" action="<?php echo base_url('admin/create_user')?>" method="post" class="form-group mt-2">
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

-->

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
                    <form id="modal-Employee-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="EmployeeId"/>          
                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Employee Name</label>
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="Employee Name" />
                            </div>
                        </div>                          
                        <div class="row" id="rowActive">
                            <div class="col-sm-12 col-md-12">
                                <label>Status:</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="switch switch-lg switch-info">
                                        <input type="checkbox" id="IsActive" name="IsActive" checked />
                                        <span class="switch-indicator"></span>
                                        <label>Active</label>
                                    </label>
                                </div>
                            </div>
                        </div> 

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Employee_Modal.validate()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Employee_Modal = {
        data: function () {
            return {
                EmployeeId: $('#EmployeeId').val(),                
                Name: $('#Name').val(),        
                IsActive: ($('#IsActive').prop("checked") ? 1 : 0)        
            }
        },

        init: function () {            
            $('#modal-Employee-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-Employee').modal('show');
        },

        new: function () {
            $('#EmployeeId').val('0');            
            $('.modal-title').text('Add Employee');            
            $('#rowActive').addClass('invisible');
            Employee_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Employee');  
            $('#rowActive').removeClass('invisible');          
            Employee_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Employee/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    $('#EmployeeId').val(i.EmployeeId);
                    $('#Name').val(i.Name);
                    $('#IsActive').prop("checked", (i.IsActive == 1));
                }
            });           
        },
        <!--
        validate: function(){
            $('.invalid-feedback').remove();
            $('.is-invalid').removeClass('is-invalid');
            $.ajax({
                url:'<?php echo base_url('Employee/Validate'); ?>',
                type: "POST",
                data: {"Employee": Employee_Modal.data()},
                success: function(i){
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        Employee_Modal.save();
                    }else{
                        $.each(i, function(element, message){
                            if(element != 'status'){
                                $('#' + element).addClass('is-invalid').parent().append(message);
                            }
                        });
                    }
                }, 
                error: function(i){
                    swal('Oops!', "Something went wrong", 'error');
                }
            })      
        },
        -->

        save: function () {
            var message;            
            if ($('#EmployeeId').val() == 0) {
                message = "Great Job! New Employee has been created";
            } else {
                message = "Nice! Employee has been updated";
            }

            swal({
                title: 'Confirm Submission',
                text: 'Save changes for Employee',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No! Cancel',
                cancelButtonClass: 'btn btn-default',
                confirmButtonText: 'Yes! Go for it',
                confirmButtonClass: 'btn btn-info'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url:'<?php echo base_url('Employee/Save'); ?>',
                        type: "POST",
                        data: {"Employee": Employee_Modal.data()},
                        success: function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-Employee').modal('hide');
                            console.log(i);
                        }, 
                        error: function(i){
                            swal('Oops!', "Something went wrong", 'error');
                        }
                    })                                     
                }
            })
        }
    }

</script>