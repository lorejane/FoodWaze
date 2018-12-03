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
                        <input type="hidden" id="EmployeeId" name="EmployeeId" />          
                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Account</label>
                                <input id="EmployeeAccount" name="EmployeeAccount" type="text" class="form-control" placeholder="Account" />
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
                            <div class="col-12">
                                <label>Password</label>
                                <input id="Password" name="Password" type="password" class="form-control" placeholder="Password" />
                                <span class="icon fa fa-eye" onclick="changePwdView()"></span>
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
<div class="modal modal-center fade" id="modal-Remove" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <center>
                    <form id="modal-Remove-form" action="#" class="form-group mt-2">                                           
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" onclick="Employee_Modal.delete()">Yes</button>
                    </form>
                </center>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var Employee_Modal = {
        data: function () {
            return {
                EmployeeId: $('#EmployeeId').val(),                
                EmployeeAccount: $('#EmployeeAccount').val(),              
                Firstname: $('#Firstname').val(),
                Lastname: $('#Lastname').val(),
                PositionId: $('#PositionId').selectpicker('val'),
                StallId: $('#StallId').selectpicker('val'),
                Password: $('#Password').val()
            }
        }, 

        id: function () {
                EmployeeId: $('#EmployeeId').val()                 
        },         

        init: function () {  
            $.ajax({
            url: "<?php echo base_url('Admin/GetAll'); ?>",
            async: false,
            success: function(i){
                i = JSON.parse(i);          
                $('#StallId').empty();          
                $.each(i, function(index, data){                        
                    $('#StallId').append('<option value = "' + data.StallId + '">' + data.Name + '</option>');
                })
                $('#StallId').selectpicker('refresh');
            }
        })   

            $.ajax({
            url: "<?php echo base_url('Admin/GetAllPos'); ?>",
            async: false,
            success: function(i){
                i = JSON.parse(i);          
                $('#PositionId').empty();          
                $.each(i, function(index, data){                        
                    $('#PositionId').append('<option value = "' + data.PositionId + '">' + data.PositionName + '</option>');
                })
                $('#PositionId').selectpicker('refresh');
            }
        })     
            $('#modal-Employee-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-Employee').modal('show');
        },

        hot: function () {            
            $('#modal-Remove-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-Remove').modal('show');
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
                url: "<?php echo base_url('Admin/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log(i);
                    $('#EmployeeId').val(i.EmployeeId);
                    $('#EmployeeAccount').val(i.EmployeeAccount);
                    $('#Firstname').val(i.Firstname);
                    $('#Lastname').val(i.Lastname);
                    $('#PositionId').selectpicker('val',i.PositionId);
                    $('#StallId').selectpicker('val',i.StallId);
                    $('#Password').val(i.Password);
                }
            });           
        },

        validate: function(){
            $('.invalid-feedback').remove();
            $('.is-invalid').removeClass('is-invalid');
            $.ajax({
                url:'<?php echo base_url('Admin/Validate'); ?>',
                type: "POST",
                data: {"employee": Employee_Modal.data()},
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
                        url:'<?php echo base_url('Admin/Save'); ?>',
                        type: "POST",
                        data: {"employee": Employee_Modal.data()},
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
        },

        remove: function () {            
            $('.modal-title').text('Delete Employee');  
            $('#rowActive').removeClass('invisible');          
            Employee_Modal.hot();   
        },

        delete: function () {
                $.ajax({  
                     url:'<?php echo base_url('Admin/Delete'); ?>', 
                     method:"POST",  
                     data:{"employee": Employee_Modal.data()},  
                    success: function(i){
                        swal('Deleted!', 'success');
                        $('#modal-Remove').modal('hide');
                        console.log(i);
                        }, 
                    error: function(i){
                            swal('Oops!', "Something went wrong", 'error');
                        }
           }) 
        }        

}

</script>