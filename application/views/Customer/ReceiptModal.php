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
                        <input type="hidden" data-id="MenuId" name="MenuId" />   
                        <div class="row mb-2">
                            <div class="col-12" style="height:50%;" >
                              <table class="col-sm-12">
                              <thead style=" border: 1px solid rgba(0, 0, 0, .2); background-color:#FFE694;"> <tr>  <th width="10%">Qty</th>  <th width="50%">Name</th> <th width="20%">Price</th> <th width="20%">Total</th> </tr> </thead> 
                              </table>
                                <div id="mycart">
                                </div>
                              </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Total Amount Due</label>
                            </div>
                            <div class="col-6">
                                <input id="Total" name="Total" type="text" class="form-control" style="text-align:center;" placeholder="Name" readonly/>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Cash</label>
                            </div>
                            <div class="col-6">    
                                <input id="Cash" name="Cash" type="text" class="form-control" style="text-align:center;" placeholder="Name" readonly/>
                            </div>
                        </div> 
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Discount</label>
                            </div>
                            <div class="col-6">    
                                <input id="Discount" name="Discount" type="text" class="form-control" style="text-align:center;" placeholder="Price"  readonly/>
                            </div>
                        </div>   
                        <div class="row mb-2">
                            <div class="col-6">
                                <label>Change</label>
                            </div>
                            <div class="col-6">
                                <input id="Change" name="Change" type="text" class="form-control" style="text-align:center;" placeholder="Price"  readonly/>
                            </div>
                        </div>                                                                                                   
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
                <button id="pdf" type="button" class="btn btn-info" >Save Receipt</button>
            </div>
        </div>
    </div>
</div>

<script>
var globalNaSinigang;
    var Receipt_Modal = {
        data: function () {
            return {
                OrderId: $('#OrderId').val(),                
                Total: $('#Total').val(),              
                Cash: $('#Cash').val(), 
                Discount: $('#Discount').val(), 
                Change: $('#Change').val(),
                MenuId: $('#MenuId').val(), 
                Name: $('#Name').val(), 
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
            $('#mycart').empty();            
            $('.modal-title').text('Receipt');  
            $('#rowActive').removeClass('invisible');          
            Receipt_Modal.init();
            globalNaSinigang = id;
            $.ajax({
                url: "<?php echo base_url('Customer/GetReceipts/'); ?>" + id,
                success: function(i){
                i= JSON.parse(i);
                console.log(i);
                var sinigang = '<table class="table">';
                $.each(i, function(index, data){
                  sinigang += "<tr><td  width=\"150\">" + data.Quantity + "</td><td width=\"50%\">" + data.Name + "</td><td  width=\"20%\">" + data.Total + "</td> <td  width=\"20%\">" + (data.Quantity * data.Total) + "</td></tr>" ;
                  
                })
                sinigang += '</table>';
                $('#mycart').html(sinigang);
                console.table(sinigang);
                }
              })            
            $.ajax({
                url: "<?php echo base_url('Customer/GetReceipt/'); ?>" + id,
                success: function(i){
                    i = JSON.parse(i);
                    console.log("edit"); 
                    console.log(i);
                    $('#OrderId').val(i.OrderId);
                     $('#MenuId').val(i.MenuId);
                    $('#Total').val(i.Total);
                    $('#Cash').val(i.Cash);
                    $('#Discount').val(i.Discount);
                    $('#Change').val(i.Change);
                }
            });    
        }
      }
</script>
<script>
$('#pdf').click(function () {
  var sinigang ='';
  var date = $('#date').val();
  var day = $('#day').val();
  var time = $('#time').val();
  var discount = $('#Discount').val();
  var puretotal = $('#Total').val();
  var Cash = $('#Cash').val();
  var Change = $('#Change').val();
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


  var pdf = new jsPDF('p', 'mm', [730, 350]);
  pdf.text(45, 5, 'FOODWAZE Inc.');
  pdf.text(40, 10, 'Jollibe Gen. Luna');
  pdf.text(10, 15, 'Gen.Luna cor. UN-Taft Ave.,Metro Manila');
  pdf.text(25, 20, 'VAT reg TIN:'+'005-571-216-002');
  pdf.text(25, 25, 'MIN:'+'17101118105743142');
  pdf.text(1, 30, '-----------------------------------------------------------------');
  $.ajax({
    url: "<?php echo base_url('Customer/GetReceipts/'); ?>" + globalNaSinigang,
    async: false,
    success: function(i){
    i= JSON.parse(i);
    console.log(i);
    // var sinigang = '<table class="table">';
    $.each(i, function(index, data){
      sinigang +=  data.Name + data.Quantity + " x " + data.Total + " = " + (data.Quantity * data.Total) + "\n";
      
    })
    pdf.text(5, 35, sinigang);
    // sinigang += '</table>';
    // $('#mycart').html(sinigang);
    // console.table(sinigang);
    }
  });
  // pdf.text(5, 50, sinigang);
  pdf.text(1, 90, '----------------------------------------------------------------');
  pdf.text(10, 95, 'VATable:                                   '+ VATable);
  pdf.text(10, 100, 'VAT Exempt:                             '+ VATExempt);
  pdf.text(10, 105, 'VAT:                                           '+ VAT);
  pdf.text(10, 110, 'Total Amount Due:                    '+ TotalDue+'.00');
  pdf.text(10, 115, 'Cash:                                         '+ Cash+'.00');
  pdf.text(10, 120, 'Change:                                     '+ Change+'.00');
  pdf.text(1, 125, '----------------------------------------------------------------');
  pdf.text(5, 130, 'OR Number: 0600072035');
  pdf.text(5, 135, 'Cashier: Rere Mariano');
  pdf.text(5, 140, 'Date:'+'Time:');
  pdf.text(1, 145, '----------------------------------------------------------------');
  pdf.text(17, 150, 'This serves as your Official Receipt.');
  pdf.text(20, 155, 'We love to hear your feedback...');
  pdf.text(20, 160, 'Thank you, and please come again.');
  pdf.text(35, 165, 'Call: (02) 898-777');
  pdf.text(25, 170, 'Text only: (0917) 131-8000');
  pdf.text(15, 175, 'Email: feedback@foodwaze.com.ph');
  pdf.text(20, 180, 'Website: www.foodwaze.ga.ph');
  pdf.text(1, 185, '----------------------------------------------------------------');
  pdf.text(1, 190, 'Customer Name:________________________');
  pdf.text(1, 195, 'Address:______________________________');
  pdf.text(1, 200, 'TIN#:_________________________________');
  pdf.text(1, 205, 'Bus Style:_____________________________');
  pdf.text(20, 210, 'Sweda Systems Philippines, Inc.');
  pdf.text(25, 215, '27f Rufino Tower, Makati City');
  pdf.text(23, 220, 'Vat Reg TIN: 003-510-344-000');
  pdf.text(22, 226, 'Accr No: 047-003510344-000003');
  pdf.text(35, 231, 'Date Issued 03/10/2010');
  pdf.text(32, 236, 'and Valid until 07/31/2020');
  pdf.text(5, 241, 'THIS INVOICE/RECEIPT SHALL BE VALID');
  pdf.text(10, 246, 'FIVE (5) YEARS FROM THE DATE OF');
  pdf.text(35, 251, 'THE PERMIT TO USE');
  pdf.save('Receipt.pdf');
  console.log(sinigang);
  }); 

// });

</script>