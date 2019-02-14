<style>
#SML{
  display: none;
 } 

.int{
  width: 20%;
}
}
</style>
<form name="calcform" action="Cashier/SaveOrder" >
<div class="main-content" style="padding-top:5%;">
  <div class="row">
    <div class="col-sm-4">
      <div class="row">
        <div class="col-sm-12"  style="height:12%;" >
          <center>
            <H3>FOODWAZE</H3>
            <h5>Manila City</h5>
            <em><?php $timestamp = time(); echo date("h:i:s A", $timestamp) ?></em>&nbsp;|
            <em>Today is&nbsp;<?php $timestamp = time(); echo date("D", $timestamp) ?>,</em>
            <em>&nbsp;<?php $timestamp = time(); echo date("F d, Y", $timestamp) ?></em>
          </center>
        </div>
          <a href="<?php echo base_url('Cashier/RemoveAll'); ?>" >Empty Cart</a>
      </div>
      <div class="row" style="padding-top:8px; height:5%;" >
        <!-- <div class="col-sm-12"> -->
        <table class="col-sm-12">
         <thead style=" border: 1px solid rgba(0, 0, 0, .2); background-color:aquamarine;"> <tr>  <th width="10%">Qty</th>  <th width="30%">Name</th> <th width="20%">Price</th> <th width="20%">Total</th> <th></th> <th width="20%">Action</th> </tr> </thead> 
       </table>
<!--      
</div> -->
      </div>
      <div clas="row " style="padding-bottom:10px; height:40%; overflow-y:auto; " >
                <div id="mycart">
                <!-- <div>jc</div> -->
                </div>
      </div>
      <!-- <br/> -->
      <div class="row" id="customers" style="border: 3px dotted rgba(0, 0, 0, .2);">
        <div class="col-sm-6" >
          <!-- SUB TOTAL<input class="input-value" id="input-quantity-'+data.id+'" value='' readonly > <br/>
 -->      
        DISCOUNT 
          <select type="text" name="discount" id="discount">
            <option value="0" selected>Regular</option>
            <option value="20">Senior</option>
            <option value="20">PWD</option>
          </select><br/>
          TOTAL PRICE<input type="text" class="int input-value" id="puretotal" name="puretotal" readonly>
          <button type="button" class="btn btn-info" onclick="SaveOrder()">Save</button>
        </div>
        <div class="col-sm-6">
          <div class="row">
                <!-- <form name="calcform"> -->
                  <div class="row">
                    <button type="button" name="btn9" value="9" onclick="displaynum(btn9.value)" class="keypad btn btn-default">9</button>
                    <button type="button" name="btn8" value="8" onclick="displaynum(btn8.value)" class="keypad btn btn-default">8</button>
                    <button type="button" name="btn7" value="7" onclick="displaynum(btn7.value)" class="keypad btn btn-default">7</button>
                    <button type="button" name="btn6" value="6" onclick="displaynum(btn6.value)" class="keypad btn btn-default">6</button>
                    </div>
                    <div class="row">
                    <button type="button" name="btn5" value="5" onclick="displaynum(btn5.value)" class="keypad btn btn-default">5</button>
                    <button type="button" name="btn3" value="3" onclick="displaynum(btn3.value)" class="keypad btn btn-default">3</button>
                    <button type="button" name="btn4" value="4" onclick="displaynum(btn4.value)" class="keypad btn btn-default">4</button>
                    <button type="button" name="btn2" value="2" onclick="displaynum(btn2.value)" class="keypad btn btn-default">2</button>
                    </div>
                    <div class="row">
                    <button type="button" name="btn0" value="0" onclick="displaynum(btn0.value)" class="keypad btn btn-default">0</button>
                    <button type="button" name="btn1" value="1" onclick="displaynum(btn1.value)" class="keypad btn btn-default">1</button>
                    <button type="reset" name="reset" class="keypad btn btn-danger">C</button>
                    <button type="button" id="idOfButtonToClick" class="keypad btn btn-danger">X</button>
                    </div>
                    <div class="row">
                    CASH<input type="text"  name="ReceivedAmnt" style="text-align:right;" class="int input-value" id="ReceivedAmnt" >
                    CHANGE<input type="text" class="int input-value" name="change" onblur="calculate()" id="change"  readonly/>
                  </div>
          </div>
        </div>
        <!-- <button onclick="javascript:demoFromHTML();">PDF</button> -->   
      </div>
                
    </div>
    <div class="col-sm-8">
        <div class="card" style="height:70%;">
          <div class="card-body" style="height:40%; scroll-y:auto;">
              <div id="menu-container" >
              </div>              
          </div>          
        </div>
          <button type="button" style="width:5%" id="idOfButtonToClick"  onclick="Sizes()" class="btn btn-info">+</button>
        <div id="SML" class="row">
          <div class="col-sm-4">
          <button type="button" id="idOfButtonToClick" class="btn btn-default">Small</button><br/>
          </div>
          <div class="col-sm-4">
          <button type="button" id="idOfButtonToClick" class="btn btn-default">Medium</button><br/>
          </div>
          <div class="col-sm-4">
          </div>
          <button type="button" id="idOfButtonToClick" class="btn btn-default">Large</button><br/>
        </div>
    </div>
  </div>
</form>
 <script>	
  function SaveOrder() {
    var discount = document.getElementById('discount').value;                         
    var puretotal = document.getElementById('puretotal').value;
    var ReceivedAmnt = document.getElementById('ReceivedAmnt').value;
    var change = document.getElementById('change').value; 
    $.ajax({
        url:"<?php echo base_url('Cashier/SaveOrder'); ?>/"+discount+"/"+puretotal+"/"+ReceivedAmnt+"/"+change,
        type: "POST",
       
        success: function(i){
        console.log("hehe");
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
   
function Sizes() {
  $("#SML").toggle()
}	
function menu() {
	$.ajax({
        url: "<?php echo base_url('foodwaze/getCategory/'.$this->session->userdata('StallId')); ?>",        
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
                    element +='<li class="nav-item active"><a class="nav-link" data-toggle="tab" href="#cat-'+data.CategoryId+'"><h3>'+'<p class="text-center fs-30 text-muted">'+data.CategoryName+'</p>'+'</h3></a></li>';
                } else{
                    element +='<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cat-'+data.CategoryId+'"><h3>'+'<p class="text-center fs-30 text-muted">'+data.CategoryName+'</p>'+'</h3></a></li>';
                }
            })

            element +='</ul>';
            element +='<div class="tab-content">';
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
			    url: "<?php echo base_url('foodwaze/getMenu/'.$this->session->userdata('StallId')); ?>", 
			    success: function(menu){
			        menu=JSON.parse(menu);
			        console.log(menu);
			        // console.log(menu);
			        $.each(menu, function(index, data){
			            //console.log(data);
			            //data.Price
			            $('#cat-' + data.CategoryId).append('<div class="ordermenu col-sm-3 items" style="padding:5px; border:1px solid #ccc;" align="center" data-Image="'+data.Image+'" data-id="'+data.MenuId+'" data-name="'+data.Name+'" data-price="'+data.Price+'" ><img style="width:20%;" src="<?php echo base_url("pics/'+data.Image+'"); ?>" > <h5>'+data.Name+'</h5><h4 style="color:red;">&#X20B1; '+data.Price+'.00</h4><input type="hidden" id="'+data.MenuId+'_name" value="'+data.Name+'"><input type="hidden" id="'+data.MenuId+'_price" value="'+data.Price+'"></div>'); 
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

function increment_quantity(id, price) {
    var inputQuantityElement = $("#input-quantity-"+id);
    var newQuantity = parseInt($(inputQuantityElement).val())+1;
    var newPrice = newQuantity * price;
    save_to_db(id, newQuantity, newPrice);
}

function decrement_quantity(id, price) {
    var inputQuantityElement = $("#input-quantity-"+id);
    if($(inputQuantityElement).val() > 1) 
    {
    var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
    var newPrice = newQuantity * price;
    save_to_db(id, newQuantity, newPrice);
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
	   	url: "<?php echo base_url('Cashier/displayCartOrder'); ?>",
		success: function(i){
			i = JSON.parse(i);
			console.log(i);
			var element = '';
			total = 0;
      element +='<table class="table-hover"><tbody>';
      $.each(i, function(index, data){
                    element+=' <tr>  <td width="10%"><input class="input-quantity" id="input-quantity-'+data.id+'" value='+data.qty+'  readonly></td> <td width="35%">'+data.name+'</td> <td width="15%">'+data.price+'</td>  <td width="15%"><div class="subtotal" id="cart-price-'+data.id+'">'+(data.qty * data.price)+'</div></td>  <td width="15%"><div class="btn-increment-decrement" onClick="decrement_quantity('+data.id+', '+data.price+')">-</div>&nbsp;<div class="btn-increment-decrement" onClick="increment_quantity('+data.id+', '+data.price+')">+</div></td> <td width="10%"> <i class="btn btn-danger btn-xs fa fa-trash right" onclick="DeleteCart(\''+data.rowid+'\')" id="'+data.id+'"></i><td></tr> ';
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
function demoFromHTML() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    source = $('#customers')[0];

    specialElementHandlers = {
       '#bypassme': function (element, renderer) {
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
    pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
    // document.getElementById("puretotal").innerHTML="Name"+document.getElementById("puretotal").value;
    // console.log(puretotal);
        pdf.save('Test.pdf');
    }, margins);
}
</script>  