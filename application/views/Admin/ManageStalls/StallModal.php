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
                    <img style= "width:125px; height:125px;"  alt="" id="imgHERE"  class="img-rounded img-responsive" style="margin-top:25px;"/>
                    <form action = "<?php echo base_url('Admin/UploadPicture'); ?>" enctype= "multipart/form-data" method = "POST">
                    <input type="file" name="image" required accept = "image/*" id = "imageChooser" /><br />
                    <input type = "submit" name = "submit" value = "change dp" />
                    </form>
                    <form id="modal-Stall-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="StallId" name="StallId" />          
                            <div></div>                      
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
$(document).ready(function(){
    $("#imageChooser").change(function(event){      
        var tgt = event.target || window.event.srcElement, files = tgt.files;       
        var fr = new FileReader();
        fr.onload = function(){
            // $("#imgHERE").children().remove();
            $("#imgHERE").css('border', 'none').children('img').attr('src', fr.result);
        }
        fr.readAsDataURL(files[0]);
    });
});

var currentImage = 0;
var images = [
    'a.jpg',
    'b.jpg'
];
var imageElement = document.getElementById('yourImageTagId');

function nextImage(){
    currentImage = (currentImage + 1) % images.length;
    imageElement.src = images[currentImage];
}

var timeoutId = setTimeout(nextImage, 1000);

</script>
<script>
    var Stall_Modal = {
        data: function () {
            return {
                StallId: $('#StallId').val(),                
                Name: $('#Name').val(),
                Picture: $('#Picture').val()
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
                    $('#Picture').val(i.Picture);
                }
            });           
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