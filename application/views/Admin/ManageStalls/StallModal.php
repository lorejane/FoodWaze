<div class="modal modal-center fade" id="modal-Stall" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Stall</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-Stall-form" action="#" class="form-group mt-2">
                        <div class="row mb-2">
                            <div class="col-12">
                                <input id="image" name="image" type="file" data-provide="dropify" data-show-remove="false" data-default-file="<?php echo base_url("pics/default.png"); ?>" style="border: solid black 1px;">
                            </div>
                        </div> 
                        <input type="hidden" id="StallId" name="StallId" />                              
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Stall Name</label>
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="Stall Name" />
                            </div>
                        </div>                                           
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Stall_Modal.validate()">Save</button>
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

    var Stall_Modal = {
        data: function () {
            return {
                StallId: $('#StallId').val(),                
                Name: $('#Name').val(),
            }
        },

        init: function () {            
            $('#modal-Stall-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-Stall').modal('show');
        },

        new: function () {
            $('#StallId').val('0');            
            $('.modal-title').text('Add Stall');            
            $('#rowActive').addClass('invisible');
            Stall_Modal.init();
        },

        edit: function (val) {            
            $('.modal-title').text('Edit Stall');  
            $('#rowActive').removeClass('invisible');          
            Stall_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Admin/GetStall/'); ?>" + val,
                success: function(i){
                    i = JSON.parse(i);
                    console.log(i);
                    $('#StallId').val(i.StallId);
                    $('#Name').val(i.Name);
                    $('#image').parent().find('.dropify-preview .dropify-render img').attr('src', "<?php echo base_url('pics/'); ?>" + i.Image);
                    imageChanged = false;
                }
            });           
        },

        delete: function (id) {             
            swal({
                title: 'Confirm Submission',
                text: 'Save changes for Stall',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No! Cancel',
                cancelButtonClass: 'btn btn-default',
                confirmButtonText: 'Yes! Go for it',
                confirmButtonClass: 'btn btn-info'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url:"<?php echo base_url('Admin/DeleteStall/'); ?>" +id,
                            success: function(i){
                                swal('Deleted!', 'success');
                                $('#Stall-table').DataTable().ajax.reload();
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
                url:'<?php echo base_url('Admin/ValidStall'); ?>',
                type: "POST",
                data: {"stall": Stall_Modal.data()},
                success: function(i){
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        Stall_Modal.save();
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
            var formData = new FormData($('#modal-Stall-form')[0]);            
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
            if ($('#StallId').val() == 0) {
                message = "Great Job! New Stall has been created";
            } else {
                message = "Nice! Stall has been updated";
            }

            swal({
                title: 'Confirm Submission',
                text: 'Save changes for Menu',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No! Cancel',
                cancelButtonClass: 'btn btn-default',
                confirmButtonText: 'Yes! Go for it',
                confirmButtonClass: 'btn btn-info'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url:'<?php echo base_url('Admin/SaveStall'); ?>',
                        type: "POST",
                        data: {"stall": Stall_Modal.data()},
                        success: function(i){
                            if(imageChanged){                               
                            Stall_Modal.upload();
                            }
                            swal('Good Job!', message, 'success');
                            $('#modal-Stall').modal('hide');
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