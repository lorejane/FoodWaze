<div class="modal modal-center fade" id="modal-Categories" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-Categories-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="CategoryId" name="CategoryId" />                                
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Category Name</label>
                                <input id="CategoryName" name="CategoryName" type="text" class="form-control" placeholder="Category Name" />
                            </div>
                        </div>                                                                                                
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" onclick="Categories_Modal.validate()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Categories_Modal = {
        data: function () {
            return {
                CategoryId: $('#CategoryId').val(),                           
                CategoryName: $('#CategoryName').val()
            }
        },

        init: function () {            
            $('#modal-Categories-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-Categories').modal('show');
        },

        new: function () {
            $('#CategoriesId').val('0');            
            $('.modal-title').text('Add Category');            
            $('#rowActive').addClass('invisible');
            Categories_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Categories');  
            $('#rowActive').removeClass('invisible');          
            Categories_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Manager/GetCategory/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log(i);
                    $('#CategoryId').val(i.CategoryId);
                    $('#CategoryName').val(i.CategoryName);
                }
            });           
        },

        validate: function(){
            $('.invalid-feedback').remove();
            $('.is-invalid').removeClass('is-invalid');
            $.ajax({
                url:'<?php echo base_url('Manager/ValidateCategories'); ?>',
                type: "POST",
                data: {"category": Categories_Modal.data()},
                success: function(i){
                    i = JSON.parse(i);                    
                    if(i.status == 1){
                        Categories_Modal.save();
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
            if ($('#CategoryId').val() == 0) {
                message = "Great Job! New Categories has been created";
            } else {
                message = "Nice! Categories has been updated";
            }

            swal({
                title: 'Confirm Submission',
                text: 'Save changes for Category',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No! Cancel',
                cancelButtonClass: 'btn btn-default',
                confirmButtonText: 'Yes! Go for it',
                confirmButtonClass: 'btn btn-info'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url:'<?php echo base_url('Manager/SaveCategory'); ?>',
                        type: "POST",
                        data: {"category": Categories_Modal.data()},
                        success: function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-Categories').modal('hide');
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
