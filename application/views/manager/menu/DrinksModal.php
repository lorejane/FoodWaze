<div class="modal modal-center fade" id="modal-Drinks" tabindex="-1">
    <div class="modal-dialog modal-md ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Drinks</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-type-line">
                <div class="col-md-12 col-sm-12">
                    <form id="modal-Drinks-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="MenuId" name="MenuId" />          
                        
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
                <button type="button" class="btn btn-info" onclick="Drinks_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Drinks_Modal = {
        data: function () {
            return {
                MenuId: $('#MenuId').val(),                
                Name: $('#Name').val(),              
                Price: $('#Price').val()
            }
        },

        init: function () {            
            $('#modal-Drinks-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-Drinks').modal('show');
        },

        new: function () {
            $('#MenuId').val('0');            
            $('.modal-title').text('Add Drinks');            
            $('#rowActive').addClass('invisible');
            Drinks_Modal.init();
        },

        edit: function (id) {            
            $('.modal-title').text('Edit Drinks');  
            $('#rowActive').removeClass('invisible');          
            Drinks_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Menu/Get/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log(i);
                    $('#MenuId').val(i.MenuId);
                    $('#Name').val(i.Name);
                    $('#Price').val(i.Price);
                }
            });           
        },

        save: function () {
            var message;            
            if ($('#MenuId').val() == 0) {
                message = "Great Job! New Drinks has been created";
            } else {
                message = "Nice! Drinks has been updated";
            }

            swal({
                title: 'Confirm Submission',
                text: 'Save changes for Drinks',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No! Cancel',
                cancelButtonClass: 'btn btn-default',
                confirmButtonText: 'Yes! Go for it',
                confirmButtonClass: 'btn btn-info'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url:'<?php echo base_url('Menu/SaveDrinks'); ?>',
                        type: "POST",
                        data: {"drinks": Drinks_Modal.data()},
                        success: function(i){
                            swal('Good Job!', message, 'success');
                            $('#modal-Drinks').modal('hide');
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