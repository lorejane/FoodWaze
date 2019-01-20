<div class="main-content" style="padding-top:5%;">
 <div class="row">
  <div class="col-sm-8">
    <div class="card" style="height:90%;">
         <div class="card-body" >
            <div id="menu-container">
            </div>              
        </div>          
        </div>
   </div>
<div class="col-sm-4">
	<div>
		<center><H3>RECEIPT</H3></center>
		<br/>
		<!--TOTAL:&nbsp;<input type="text" id="input" readonly><br/><br/>
		 CASH:&nbsp;<input id="idOfInput" type="text"  name="txt1" style="text-align:right;"><br/>
		CHANGE:&nbsp;<input type="text" id="input"><br/> -->
		<div class="col-6 cart" >
            <div id="mycart" ></div>
    </div><!-- show cart -->
	</div>
  <a class="button"  href="<?php echo base_url('Cashier/Payment'); ?>">PAYMENT</a>
	<!--
		<div class="row" style="height:45%;">
		<form name="calcform">
		<button type="button" name="btn9" value="9" onclick="displaynum(btn9.value)" class="keypad btn btn-default">9</button>
		<button type="button" name="btn8" value="8" onclick="displaynum(btn8.value)" class="keypad btn btn-default">8</button>
		<button type="button" name="btn7" value="7" onclick="displaynum(btn7.value)" class="keypad btn btn-default">7</button>
		<button type="button" name="btn6" value="6" onclick="displaynum(btn6.value)" class="keypad btn btn-default">6</button><br/>
		<button type="button" name="btn5" value="5" onclick="displaynum(btn5.value)" class="keypad btn btn-default">5</button>
		<button type="button" name="btn3" value="3" onclick="displaynum(btn3.value)" class="keypad btn btn-default">3</button>
		<button type="button" name="btn4" value="4" onclick="displaynum(btn4.value)" class="keypad btn btn-default">4</button>
		<button type="button" name="btn2" value="2" onclick="displaynum(btn2.value)" class="keypad btn btn-default">2</button><br/>
		<button type="button" name="btn0" value="0" onclick="displaynum(btn0.value)" class="keypad btn btn-default">0</button>
		<button type="button" name="btn1" value="1" onclick="displaynum(btn1.value)" class="keypad btn btn-default">1</button>
		<button type="reset" name="reset" class="keypad btn btn-danger">C</button>
		<button type="button" id="idOfButtonToClick" class="keypad btn btn-danger">X</button><br/>
		<button type="button" name="eqlbtn" value="=" onclick="txt1.value=eval(txt1.value)" class="keypad btn btn-default">=</button>
		Amount:<input id="idOfInput" type="text"  name="txt1" style="text-align:right; width:15%;">
	</form>
	</div> -->
</div>
</div>
<script>
	function displaynum(n1){
    	calcform.txt1.value=calcform.txt1.value+n1;
  	}
  	$(document).ready(function(){
		$('.b').click(function(){
	        $('#input').val(Number($('#input').val()) + Number($(this).val()));
	    });

	    $('#idOfButtonToClick').click(function(){
            var inputString = $('#idOfInput').val();
            var shortenedString = inputString.substr(0,(inputString.length -1));
            $('#idOfInput').val(shortenedString);
        });

  	});
     	
</script>

 <script>	



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
			            $('#cat-' + data.CategoryId).append('<div class="ordermenu col-sm-3 items" style="padding:5px; border:1px solid #ccc;" align="center" data-id="'+data.MenuId+'" data-name="'+data.Name+'" data-price="'+data.Price+'" ><h5>'+data.Name+'</h5><h4 style="color:red;">&#X20B1; '+data.Price+'.00</h4><input type="hidden" id="'+data.MenuId+'_name" value="'+data.Name+'"><input type="hidden" id="'+data.MenuId+'_price" value="'+data.Price+'"></div>'); 
			        });
	        	    $('.ordermenu').click(function(){
           				$.ajax({
           					url: "<?php echo base_url('Cashier/AddToCart'); ?>",
           					type: "POST",
           					data: {
           						Order: {
           							id: $(this).data("id"),
           							name: $(this).data("name"),
           							qty: 1, 
           							price: $(this).data("price")
           						}
           					},
           					success: function(j){
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
    //url : "update_cart_quantity.php",
    data : "id="+id+"&new_quantity="+new_quantity,
    type : 'post',
    success : function(response) {
      $(inputQuantityElement).val(new_quantity);
            $(priceElement).text(newPrice);
            var totalQuantity = 0;
            $("input[id*='input-quantity-']").each(function() {
                var cart_quantity = $(this).val();
                totalQuantity = parseInt(totalQuantity) + parseInt(cart_quantity);
            });
            $("#total-quantity").text(totalQuantity);
            var totalItemPrice = 0;
            $("div[id*='cart-price-']").each(function() {
                var cart_price = $(this).text().replace("$","");
                totalItemPrice = parseInt(totalItemPrice) + parseInt(cart_price);
            });
            $("#total-price").text(totalItemPrice);
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
      element +='<table class="table"style="height:200px;  overflow: "scroll";"> <thead> <tr>  <th>Qty</th>  <th>Name</th> <th>Price</th> <th>Total</th> <th></th> <th></th> <th></th> </tr> </thead> <tbody>';
      $.each(i, function(index, data){
                    element+=' <tr>  <td>'+data.qty+'</td> <td>'+data.name+'</td> <td>'+data.price+'</td> <td>'+(data.qty * data.price)+'</td> <td><div id="cart-price-'+data.id+'">'+(data.qty * data.price)+'</div></td>  <td><div class="btn-increment-decrement" onClick="decrement_quantity('+data.id+', '+data.price+')">-</div><input class="input-quantity" id="input-quantity-'+data.id+'" value='+data.qty+'><div class="btn-increment-decrement" onClick="increment_quantity('+data.id+', '+data.price+')">+</div></td> <td><i class="btn btn-warning btn-xs fa fa-close right" onclick="minus1('+data.Id+')" id="'+data.Id+'"></i></td> <td> <i class="btn btn-danger btn-xs fa fa-trash right" onclick="deletecart('+data.Id+')"id="'+data.Id+'"></i><td> </tr> ';
                    total = Number(total) + Number(data.qty * data.price);
            })
            element += '</table>';
            element += '<p> Total: '+total+' </p>' ;
            $("#mycart").html(element);
	    }
	})
}

menu();      

 </script>   