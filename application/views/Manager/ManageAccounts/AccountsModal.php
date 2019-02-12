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
                                <input id="image" name="image" type="file" data-provide="dropify" data-show-remove="false" data-default-file="<?php echo base_url("pics/default.png"); ?>" style="border: solid black 1px;">
                            </div>
                        </div>    
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

<script>
    var imageChanged = false;

    $(document).ready(function(){
        $("#image").change(function(event){                     
            var tgt = event.target || window.event.srcElement, files = tgt.files;       
            var fr = new FileReader();
            fr.onload = function(){
                $("#imgDisplay").children('img').attr('src', fr.result);
                imageChanged = true;
            }
            fr.readAsDataURL(files[0]);
        });
    });

    var Employee_Modal = {
        
        data: function () {
            return {
                EmployeeId: $('#EmployeeId').val(),                
                EmployeeAccount: $('#EmployeeAccount').val(),              
                Firstname: $('#Firstname').val(),
                Lastname: $('#Lastname').val(),
                Password: $('#Password').val()
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
                url: "<?php echo base_url('Manager/GetEmployee/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log(i);
                    $('#EmployeeId').val(i.EmployeeId);
                    $('#EmployeeAccount').val(i.EmployeeAccount);
                    $('#Firstname').val(i.Firstname);
                    $('#Lastname').val(i.Lastname);
                    $('#Password').val(i.Password);
                    $('#image').parent().find('.dropify-preview .dropify-render img').attr('src', "<?php echo base_url('pics/'); ?>" + i.Image);
                    imageChanged = false;
                }
            });           
        },

        delete: function (id) {             
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
                        url:"<?php echo base_url('Manager/DeleteAccount/'); ?>" +id,
                            success: function(i){
                                swal('Deleted!', 'success');
                                $('#Employee-table').DataTable().ajax.reload();
                                console.log(i);
                            }, 
                            error: function(i){
                                swal('Oops!', "Something went wrong", 'error');
                            }
                    })                                     
                }
            })

        },

        validate: function(){
            $('.invalid-feedback').remove();
            $('.is-invalid').removeClass('is-invalid');
            $.ajax({
                url:'<?php echo base_url('Manager/ValidateEmployee'); ?>',
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

        upload: function(){         
            var formData = new FormData($('#modal-Employee-form')[0]);            
            $.ajax({
                url: "<?php echo base_url("Admin/UploadImage"); ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    console.log('upload: ' + data);                 
                },
                error: function(data){
                    console.log('upload: ' + data);
                }
            });
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
                        url:'<?php echo base_url('Manager/Save'); ?>',
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
        }   
    }

</script>