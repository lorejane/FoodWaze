<div class="modal modal-center fade" id="modal-Receipt" tabindex="-1">
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
                    <form id="modal-Receipt-form" action="#" class="form-group mt-2">
                        <input type="hidden" id="OrderId" name="OrderId" />   
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Name</label>
                                <input id="MenuId" name="MenuId" type="text" class="form-control" placeholder="Name" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Name</label>
                                <input id="Quantity" name="Quantity" type="text" class="form-control" placeholder="Name" />
                            </div>
                        </div> 
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Name</label>
                                <input id="Total" name="Total" type="text" class="form-control" placeholder="Name" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Name</label>
                                <input id="Cash" name="Cash" type="text" class="form-control" placeholder="Name" />
                            </div>
                        </div> 
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Price</label>
                                <input id="Discount" name="Discount" type="text" class="form-control" placeholder="Price" />
                            </div>
                        </div>   
                        <div class="row mb-2">
                            <div class="col-12">
                                <label>Price</label>
                                <input id="Change" name="Change" type="text" class="form-control" placeholder="Price" />
                            </div>
                        </div>                                                                                                   
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button id="pdf" type="button" class="btn btn-info" >Save</button>
            </div>
        </div>
    </div>
</div>

<script>

    var Receipt_Modal = {
        data: function () {
            return {
                OrderId: $('#OrderId').val(),                
                Total: $('#Total').val(),              
                Cash: $('#Cash').val(), 
                Discount: $('#Discount').val(), 
                Change: $('#Change').val(),
                MenuId: $('#MenuId').val(), 
                Quantity: $('#Quantity').val()
            }
        },

        init: function () {        
            $('#modal-Receipt-form')[0].reset();
            $('input').removeClass('is-invalid').addClass('');
            $('.invalid-feedback').remove();
            $('#modal-Receipt').modal('show');
        },
        
        edit: function (id) {            
            $('.modal-title').text('Edit Menu');  
            $('#rowActive').removeClass('invisible');          
            Receipt_Modal.init();
            $.ajax({
                url: "<?php echo base_url('Customer/GetReceipt/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log("edit"); 
                    console.log(i);
                    $('#OrderId').val(i.OrderId);
                    $('#Total').val(i.Total);
                    $('#Cash').val(i.Cash);
                    $('#Discount').val(i.Discount);
                    $('#Change').val(i.Change);
                }
            });
              $.ajax({
                url: "<?php echo base_url('Customer/GetReceipts/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log("edit"); 
                    console.log(i);
                    $('#MenuId').val(i.MenuId);
                    $('#Quantity').val(i.Quantity);
                }
            });     
        }
      }
</script>
<script>
$('#pdf').click(function () {
  var menu = '';
 // $.ajax({
 //  url: '<?php echo base_url("Cashier/DisplayCart/"); ?>',
 //  success: function(i){
 //    i=JSON.parse(i);
 //    console.log(i);
 //    $.each(i, function(index, data){
 //      menu += data.qty + ' ' + data.name + " - " + (data.qty * data.price) + '\n';

 //    });
  var date = $('#date').val();
  var day = $('#day').val();
  var time = $('#time').val();
  var Change = $('form#smdiv input[name="change"]').val();
  var discount = $('form#smdiv select[name="discount"]').val();
  var puretotal = $('form#smdiv input[name="puretotal"]').val();
  var Cash = $('form#smdiv input[name="ReceivedAmnt"]').val();
  var Change = $('form#smdiv input[name="change"]').val();
  var VAT = parseFloat(puretotal * 0.12);
  var VATable = parseFloat(puretotal - VAT);
  var VATExempt;
  var TotalDue;

  if(discount == 0){
      VATExempt = 0;
  }
  else{
    VATExempt = parseFloat(VATable);
  }

  if(VATExempt == 0){
    TotalDue = parseFloat(puretotal);
  }
  else{
    TotalDue = parseFloat(VATExempt * .8);
  }


  var pdf = new jsPDF('p', 'mm', [400, 330]);
  pdf.text(40, 5, 'FOODWAZE');
  pdf.text(35, 10, 'Receipt# '+' 312312');
  pdf.text(15, 15, time +' | '+date);
  pdf.text(5, 25, menu);
  pdf.text(5, 80, '------------------------------------------------------');
  pdf.text(5, 85, 'VATable:                                  '+ VATable);
  pdf.text(5, 90, 'VAT Exempt:                            '+ VATExempt);
  pdf.text(5, 95, 'VAT:                                        '+ VAT);
  pdf.text(5, 100, '-----------------------------------------------------');
  pdf.text(5, 105, 'Total Amount Due:                    '+ TotalDue );
  pdf.text(5, 110, 'Cash:                                         '+ Cash+'.00');
  pdf.text(5, 115, 'Change:                                     '+ Change);
  pdf.save('Receipt.pdf');
  console.log(menu);
  }); 

// });

</script>