<div class="modal modal-center fade" id="modal-Menu" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-Menu-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="MenuId" name="MenuId" />          
                        <div class="row mb-2">
                            <div id="imgDisplay" class="col-12">
                                <img src = "" />
                                <input id="image" name="image" type="file" data-provide="dropify" data-show-remove="false" data-default-file="<?php echo base_url("pics/default.png"); ?>" style="border: solid black 1px;">
                            </div>
                        </div> 
                        <div class="row mb-2">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12" style="margin: auto;">
                                <label>Category</label>
                                <select id="CategoryId" name="CategoryId" data-provide="selectpicker" title="Choose Category" data-live-search="true" class="form-control show-tick"></select>
                            </div>
                        </div>                        
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Name</label>
                                <input id="Name" name="Name" type="text" class="form-control" placeholder="Name" />
                            </div>
                        </div> 
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Price</label>
                                <input id="Price" name="Price" type="text" class="form-control" placeholder="Price" />
                            </div>
                        </div>                                                                                                  
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Menu_Modal.validate()">Save</button>
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

    var Menu_Modal = {
        data: function () {
            return {
                MenuId: $('#MenuId').val(),                
                CategoryId: $('#CategoryId').selectpicker('val'),
                Name: $('#Name').val(),              
                Price: $('#Price').val()
            }
        },

        init: function () {  
         $.ajax({
                url: "<?php echo base_url('Manager/GetAll'); ?>",
                async: false,
                success: function(i){
                    i = JSON.parse(i);          
                    $('#CategoryId').empty();          
                    $.each(i, function(index, data){                        
                        $('#CategoryId').append('<option value = "' + data.CategoryId + '">' + data.CategoryName + '</option>');
                    })
                    $('#CategoryId').selectpicker('refresh');
                }
            })         

            $('#modal-Menu-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-Menu').modal('show');
        },
        
        new: function () {
            $('#MenuId').val('0');            
            $('.modal-title').text('Add Menu');            
            $('#rowActive').addClass('invisible');
            Menu_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Menu');  
            $('#rowActive').removeClass('invisible');          
            Menu_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Manager/GetMenu/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log("edit"); 
                    console.log(i);
                    $('#MenuId').val(i.MenuId);
                    $('#CategoryId').selectpicker('val',i.CategoryId);
                    $('#Name').val(i.Name);
                    $('#Price').val(i.Price);
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
                        url:"<?php echo base_url('Manager/DeleteMenu/'); ?>" +id,
                            success: function(i){
                                swal('Deleted!', 'success');
                                $('#Menu-table').DataTable().ajax.reload();
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
                url:'<?php echo base_url('Manager/ValidateMenus'); ?>',
                type: "POST",
                data: {"menu": Menu_Modal.data()},
                success: function(i){
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        Menu_Modal.save();
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
            var formData = new FormData($('#modal-Menu-form')[0]);            
            $.ajax({
                url: "<?php echo base_url("Manager/UploadImage"); ?>",
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
            if ($('#MenuId').val() == 0) {
                message = "Great Job! New Menu has been created";
            } else {
                message = "Nice! Menu has been updated";
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
                        url:'<?php echo base_url('Manager/SaveMenu'); ?>',
                        type: "POST",
                        data: {"menu": Menu_Modal.data()},
                        success: function(i){
                          if(imageChanged){                               
                            Menu_Modal.upload();
                            }
                            swal('Good Job!', message, 'success');
                            $('#modal-Menu').modal('hide');
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