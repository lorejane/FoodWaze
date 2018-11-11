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
                <button type="button" class="btn btn-info" onclick="Stall_Modal.save()">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var Stall_Modal = {
        data: function () {
            return {
                StallId: $('#StallId').val(),                
                Name: $('#Name').val()
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

        edit: function (id) {            
            $('.modal-title').text('Edit Stall');  
            $('#rowActive').removeClass('invisible');          
            Stall_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Admin/GetStall/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log(i);
                    $('#StallId').val(i.StallId);
                    $('#Name').val(i.Name);
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
                        url:'<?php echo base_url('Admin/SaveStall'); ?>',
                        type: "POST",
                        data: {"stall": Stall_Modal.data()},
                        success: function(i){
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