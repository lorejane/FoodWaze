<main clas="main-container">

<header class="header">
<div style="background-color: #fd2951" class="container">
  <div class="header-info">
  <div class="left">
    <br>
    <h2 class="header-title fs-60 text-white"><strong>Personal Profile</strong></h2>
  </div>
  </div>
</header>

<div class="col-md-8">
              <form class="card">
              <h4 class="card-title"><strong>Edit Profile</strong></h4>

              <div class="card-body row">
                <form id="modal-Employee-form" action="#" class="form-group mt-2">
                       <input type="hidden" id="EmployeeId" name="EmployeeId" />   
                            <div class="col-6">
                                <label>Account</label>
                                <input id="EmployeeAccount" name="EmployeeAccount" type="text" class="form-control" placeholder="Account" value="<?php echo $profile->EmployeeAccount ?>" />
                            </div>
                      
                            <div class="col-6">
                                <label>Password</label>
                                <input id="Password" name="Password" type="password" class="form-control" placeholder="Password" value="<?php echo $profile->Password ?>" />
                            </div>
                       
                            <div class="col-6">
                                <label>First Name</label>
                                <input id="Firstname" name="Lastname" type="text" class="form-control" placeholder="First Name" value="<?php echo $profile->Firstname ?>"/>
                            </div>
                                                                       
              
                            <div class="col-6">
                                <label>Last Name</label>
                                <input id="Lastname" name="Lastname" type="text" class="form-control" placeholder="Last Name" value="<?php echo $profile->Lastname ?>"/>
                            </div>
                </form>    
                </div>
              <footer class="card-footer text-right">
                <button class="btn btn-secondary" type="reset">Cancel</button>
                <button class="btn btn-primary" type="submit">Submit</button>
              </footer>
           </form>
          </div>

<div class="col-md-3 bg-pale-danger b-2 border-danger">
  <div class="sidebar-profile">
            <input id="image" name="image" type="file" data-provide="dropify" data-show-remove="false" data-default-file="<?php echo base_url("pics/default.png"); ?>" style="border: solid black 1px;">
          <div class="profile-info">
            <h4>Maryam Amiri</h4>
            <p>Web developer</p>
          </div>
</div>
</main>


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
       edit: function (id) {            
            $('.modal-title').text('Edit Employee');  
            $('#rowActive').removeClass('invisible');          
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
                    $('#image').parent().find('.dropify-preview .dropify-render img').attr('src', "<?php echo base_url('pics/'); ?>" + i.Image);
                    imageChanged = false;
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

         upload: function(){         
            var formData = new FormData($('#modal-Employee-form')[0]);            
            $.ajax({
                url: "<?php echo base_url("Admin/UploadProfile"); ?>",
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
                        url:'<?php echo base_url('Admin/Save'); ?>',
                        type: "POST",
                        data: {"employee": Employee_Modal.data()},
                        success: function(i){
                             if(imageChanged){                               
                            Employee_Modal.upload();
                            }
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