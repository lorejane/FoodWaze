<style>
.int{
  width: 20%;
}
}
</style>
<form name="calcform" id="smdiv">
<div class="main-content" style="padding-top:5%;">
  <div class="row">
    <div class="col-sm-4">
      <div class="row">
        <div class="col-sm-12"  style="height:10%;" >
          <center>
            <H3><strong><?php echo $stall->Name?></strong></H3>
            <input type="hidden" value="<?php $timestamp = time(); echo date("h:i:s A", $timestamp) ?>" id="date" />
            <input type="hidden" value="<?php $timestamp = time(); echo date("D", $timestamp) ?>" id="day" />
            <input type="hidden" value="<?php $timestamp = time(); echo date("F d, Y", $timestamp) ?>" id="time" />
            <em><?php $timestamp = time(); echo date("h:i:s A", $timestamp) ?></em>&nbsp;|
            <em>Today is&nbsp;<?php $timestamp = time(); echo date("D", $timestamp) ?>,</em>
            <em>&nbsp;<?php $timestamp = time(); echo date("F d, Y", $timestamp) ?></em>
          </center>
        </div>
          <a href="<?php echo base_url('Cashier/RemoveAll'); ?>" >Empty Cart</a>
      </div>
      <div class="row" style="padding-top:5px; height:5%;" >
        <!-- <div class="col-sm-12"> -->
        <table class="col-sm-12">
         <thead style=" border: 1px solid rgba(0, 0, 0, .2); background-color:#FFE694;"> <tr>  <th width="10%">Qty</th>  <th width="35%">Name</th> <th width="15%">Price</th> <th width="15%">Total</th> <th width="25%">Action</th> </tr> </thead> 
       </table>
      </div>
      <div clas="row " style="padding-bottom:10px; height:40%; overflow-y:auto; " >
                <div id="mycart">
                <!-- <div>jc</div> -->
                </div>
      </div>
      <!-- <br/> -->
      <div class="row" id="customers" style="border: 3px dotted rgba(0, 0, 0, .2); margin-top:5%;">
        <div class="col-sm-8" >
        <div class="row" style="height:5%; padding:5%;">
        DISCOUNT 
          <select type="text" name="discount" id="discount">
            <option value="0" selected>Regular</option>
            <option value="20">Senior</option>
            <option value="20">PWD</option>
          </select>
        </div>
        <div class="row" style="height:5%; padding:5%;">
          TOTAL PRICE<input type="text" class="int input-value" id="puretotal" name="puretotal" readonly>
          </div>
        <div class="row" style="height:5%; padding:5%;">
          CASH<input type="text"  name="ReceivedAmnt" style="text-align:right;" class="int input-value" id="ReceivedAmnt" >
          </div>
        <div class="row" style="height:5%; padding:5%;">
          CHANGE<input type="text" class="int input-value" name="change" onclick="calculate()" id="change"  readonly/>
          </div>
        <div class="row" style="height:5%; padding:5%;">
          <input id="pdf" type="button" class="btn btn-info" onclick="SaveOrder()" value="Save"/>
          <!-- <input id="pdf" type="submit" value="hjkasdhs"/>  --> 
        </div>
      </div>
        <div class="col-sm-4" style="padding:1%;">
          <div class="row">
                <!-- <form name="calcform"> -->
                  <div class="row">
                    <button type="button" name="btn7" value="7" onclick="displaynum(btn7.value)" class="keypad btn btn-default">7</button>
                    <button type="button" name="btn8" value="8" onclick="displaynum(btn8.value)" class="keypad btn btn-default">8</button>
                    <button type="button" name="btn9" value="9" onclick="displaynum(btn9.value)" class="keypad btn btn-default">9</button>
                    </div>
                    <div class="row">
                    <button type="button" name="btn4" value="4" onclick="displaynum(btn4.value)" class="keypad btn btn-default">4</button>
                    <button type="button" name="btn5" value="5" onclick="displaynum(btn5.value)" class="keypad btn btn-default">5</button>
                    <button type="button" name="btn6" value="6" onclick="displaynum(btn6.value)" class="keypad btn btn-default">6</button>
                    </div>
                    <div class="row">
                    <button type="button" name="btn1" value="1" onclick="displaynum(btn1.value)" class="keypad btn btn-default">1</button>
                    <button type="button" name="btn2" value="2" onclick="displaynum(btn2.value)" class="keypad btn btn-default">2</button>
                    <button type="button" name="btn3" value="3" onclick="displaynum(btn3.value)" class="keypad btn btn-default">3</button>
                    </div>
                    <div class="row">
                    <button type="button" name="btn0" value="0" onclick="displaynum(btn0.value)" class="keypad btn btn-default">0</button>
                    <button type="reset" name="reset" class="keypad btn btn-danger">C</button>
                    <button type="button" id="idOfButtonToClick" class="keypad btn btn-danger">X</button>
                    </div>
          </div>
        </div>
         
      </div>
                
    </div>
</form>
    <div class="col-sm-8">
        <div class="card">
          <div class="card-body">
              <div id="menu-container" >
              </div>              
          </div>          
        </div>
    </div>
  </div>

 <script>
$(document).ready(function () {
    $('input[type="button"]').attr('disabled', true);
    $('input').on('focus', function () {
        var text_value = $('input[name="ReceivedAmnt"]').val();
        if (text_value != '') {
            $('input[type="button"]').attr('disabled', false);
        } else {
            $('input[type="button"]').attr('disabled', true);
        }
    });
});
</script>
 <script> 

  function SaveOrder() {
    var discount = document.getElementById('discount').value;                         
    var puretotal = document.getElementById('puretotal').value;
    var ReceivedAmnt = document.getElementById('ReceivedAmnt').value;
    var change = document.getElementById('change').value; 
    $.ajax({
        url:"<?php echo base_url('Cashier/SaveOrder'); ?>/"+discount+"/"+puretotal+"/"+ReceivedAmnt+"/"+change,
        type: "get",
        success: function(i){
              //alert('rere');
                $('#mycart').html("");
                Remove();
          }
    })    
  }

</script> 
<script>
  function displaynum(n1){
      calcform.ReceivedAmnt.value=calcform.ReceivedAmnt.value+n1;
    }
    $(document).ready(function(){
    $('.b').click(function(){
          $('#input').val(Number($('#input').val()) + Number($(this).val()));
      });

      $('#idOfButtonToClick').click(function(){
            var inputString = $('#ReceivedAmnt').val();
            var shortenedString = inputString.substr(0,(inputString.length -1));
            $('#ReceivedAmnt').val(shortenedString);
        });

    }); 
      
</script>
  <script>
function menu() {
	$.ajax({
        url: "<?php echo base_url('FoodWaze/GetCategory/'.$this->session->userdata('StallId')); ?>",        
        success: function(kat){
            kat = JSON.parse(kat);
            console.log('---------CATEGORY----------');
            console.log(kat);                                
            var element = '';
            element +=' <ul class="nav nav-tabs">';
            var first = true;
            $.each(kat, function(index, data){
                if(first){
                    first = false;
                    element +='<li class="nav-item active"><a class="nav nav-link nav-tabs-danger" data-toggle="tab" href="#cat-'+data.CategoryId+'"><h3>'+'<p class="text-center fs-12 text-muted">'+data.CategoryName+'</p>'+'</h3></a></li>';
                } else{
                    element +='<li class="nav-item"><a class="nav nav-link nav-tabs-danger" data-toggle="tab" href="#cat-'+data.CategoryId+'"><h3>'+'<p class="text-center fs-12 text-muted">'+data.CategoryName+'</p>'+'</h3></a></li>';
                }
            })

            element +='</ul>';
            element +='<div class="tab-content" style="scroll-y:auto;">';
            first = true;
            $.each(kat, function(index, data){
                if(first){
                    first = false;
                    element +='<div class="tab-pane fade active show" id="cat-' + data.CategoryId + '"></div>';                                     
                } else{
                    element +='<div class="tab-pane fade" id="cat-' + data.CategoryId + '"></div>';
                }
            })

            element +='</div>';
            $('#menu-container').html(element);

            $.ajax({
			    url: "<?php echo base_url('FoodWaze/GetMenu/'.$this->session->userdata('StallId')); ?>", 
			    success: function(menu){
			        menu=JSON.parse(menu);
			        console.log(menu);
			        // console.log(menu);
			        $.each(menu, function(index, data){
			            //console.log(data);
			            //data.Price
			            $('#cat-' + data.CategoryId).append('<div class="ordermenu col-sm-3 items" style="height:22%; padding:5px; border:1px solid #ccc;" align="center" data-Image="'+data.Image+'" data-id="'+data.MenuId+'" data-name="'+data.Name+'" data-price="'+data.Price+'" ><img style="width:100px;" src="<?php echo base_url("pics/'+data.Image+'"); ?>" > <h5 style="background-color:#FFE694;">'+data.Name+'</h5><input type="hidden" id="'+data.MenuId+'_name" value="'+data.Name+'"><input type="hidden" id="'+data.MenuId+'_price" value="'+data.Price+'"></div>'); 
			        });
	        	    $('.ordermenu').click(function(){
           				$.ajax({
           					url: "<?php echo base_url('Cashier/AddToCart'); ?>",
           					type: "POST",
           					data: {
           						Order: {
           							Image: $(this).data("Image"),
                        id: $(this).data("id"),
           							name: $(this).data("name"),
           							qty: 1, 
           							price: $(this).data("price")
           						}
           					},
           					success: function(j){
           						console.log(j);
                      refresh();
           					}
           				})             	
                    });
			    }
			})
        }
    })
	 
}

function mwuehehe(newQuantity,rowid)
{
  $.ajax({
      url:"<?php echo base_url('Cashier/UpdateCart/')?>"+rowid+"/"+newQuantity,
      success:function(){
    }
  })
}

function increment_quantity(id, price, rowid) {
    var inputQuantityElement = $("#input-quantity-"+id);
    var newQuantity = parseInt($(inputQuantityElement).val())+1;
    var newPrice = newQuantity * price;
    save_to_db(id, newQuantity, newPrice);
    mwuehehe(newQuantity,rowid);
    refresh();
}

function decrement_quantity(id, price, rowid) {
    var inputQuantityElement = $("#input-quantity-"+id);
    if($(inputQuantityElement).val() > 1) 
    {
    var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
    var newPrice = newQuantity * price;
    save_to_db(id, newQuantity, newPrice);
    mwuehehe(newQuantity,rowid);
    refresh();
    }
}

function save_to_db(id, new_quantity, newPrice) {
  var inputQuantityElement = $("#input-quantity-"+id);
  var priceElement = $("#cart-price-"+id);
    $.ajax({
    data : "id="+id+"&new_quantity="+new_quantity,
    type : 'post',
    success : function(response) {
      console.log(response);
            $(inputQuantityElement).val(new_quantity);
            $(priceElement).text(newPrice);
            $("input[id*='input-quantity-']").each(function() {
            });
            $("div[id*='cart-price-']").each(function() {
            });

        computeSubTotal();
    }
  });
}

function refresh(){
	$.ajax({
	   	url: "<?php echo base_url('Cashier/DisplayCartOrder'); ?>",
		success: function(i){
			i = JSON.parse(i);
			console.log(i);
			var element = '';
			total = 0;
      element +='<table class="table-hover"><tbody>';
      $.each(i, function(index, data){
                    element+=' <tr>  <td width="10%"><input class="input-quantity" id="input-quantity-'+data.id+'" value='+data.qty+'  readonly></td> <td width="35%">'+data.name+'</td> <td width="15%">'+data.price+'</td>  <td width="15%"><div class="subtotal" id="cart-price-'+data.id+'">'+(data.qty * data.price)+'</div></td> <td width="25%"><div class="btn-warning btn-increment-decrement" onClick="decrement_quantity('+data.id+', '+data.price+',\''+data.rowid+'\')">-</div>&nbsp;<div class="btn-warning btn-increment-decrement" onClick="increment_quantity('+data.id+', '+data.price+',\''+data.rowid+'\')">+</div>&nbsp;<i class="btn btn-danger btn-xs fa fa-trash right" onclick="DeleteCart(\''+data.rowid+'\')" id="'+data.id+'"></i></td></tr> ';
                    total = Number(total) + Number(data.qty * data.price);
            })
            element += '</table>';
            //element += '<p id="hehe">Total : </p>' ;
            $("#mycart").html(element);
      computeSubTotal();
	    }
	})
}
 
menu();  

function DeleteCart(id){
  console.log(id);
  $.ajax({
      url: "<?php echo base_url('Cashier/Remove/');?>" + id,
      success: function(i){
        refresh();
    }
  });
}

function Remove(){
  $.ajax({
      url: "<?php echo base_url('Cashier/RemoveAll'); ?>",
      success: function(i){
        // refresh();
    }
  });
}   

function computeSubTotal(){
  var total = 0;
  $(".subtotal").each(function(index,key){
    console.log($(key).html());
    total = total + parseInt($(key).html());
  });
  
  $("#puretotal").val(total);
  console.log(total);
}


function calculate()
{
    var total = document.getElementById('puretotal').value;
    var cash = document.getElementById('ReceivedAmnt').value; 
    var discount = document.getElementById('discount').value;
    var disc = discount / 100;    
    var totalValue = total - (total * disc);
    var change = total - cash ;
    var dischange = cash - totalValue ;

    if(discount = 0){
      if(cash > totalValue) {  
      document.getElementById("change").value = change.toFixed(2);
      }
      else{
        alert("Invalid input");
      }
    }
    else{
    document.getElementById("change").value = dischange.toFixed(2);
    }
      
}

</script> 
<script>
$('form').on('submit', function(evt){
  evt.preventDefault();
});
$('#pdf').click(function () {
  var menu = '';
 $.ajax({
  url: '<?php echo base_url("Cashier/DisplayCart/"); ?>',
  success: function(i){
    i=JSON.parse(i);
    console.log(i);
    $.each(i, function(index, data){
      menu += data.qty + ' ' + data.name + " - " + (data.qty * data.price) + '\n';

    });
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
  }
 }) 

}); 
</script>  