<div class="main-content" style="padding-top:5%;">
  <div class="row">
    <div class="col-sm-4">
    	<div class="row" style="height:60%;" >
    		<H3>RECEIPT</H3><br/>
    		<div class="cart" >
                <div id="mycart"></div>
        </div><!-- show cart -->

      </div>
      <div class="row">
        <div class="col-sm-6">
          SUB TOTAL<input class="input-value" id="input-quantity-'+data.id+'" value='' readonly > <br/>
          TAX<input class="input-value" id="input-quantity-'+data.id+'" value='' >  <br/>
          DISCOUNT<input class="input-value" id="input-quantity-'+data.id+'" value='' >  <br/>
          TOTAL PRICE<input class="input-value" id="input-quantity-'+data.id+'" value='' readonly>
        </div>
        <div class="col-sm-6">
          RECEIVED AMOUNT<input class="input-value" id="input-quantity-'+data.id+'" value='' ><br/>
          <a class="btn btn-info"  href="<?php echo base_url('Cashier/Payment'); ?>">PAYMENT</a> <br/>
          <a class="btn btn-danger"  href="<?php echo base_url('Cashier/RemoveAll'); ?>" >CANCEL</a> <br/>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
        <div class="card" style="height:90%;">
          <div class="card-body" >
              <div id="menu-container">
              </div>              
          </div>          
        </div>
    </div>
  </div>
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
			            $('#cat-' + data.CategoryId).append('<div class="ordermenu col-sm-3 items" style="padding:5px; border:1px solid #ccc;" align="center" data-Image="'+data.Image+'" data-id="'+data.MenuId+'" data-name="'+data.Name+'" data-price="'+data.Price+'" ><img style="width:50%;" src="<?php echo base_url("pics/'+data.Image+'"); ?>" > <h5>'+data.Name+'</h5><h4 style="color:red;">&#X20B1; '+data.Price+'.00</h4><input type="hidden" id="'+data.MenuId+'_name" value="'+data.Name+'"><input type="hidden" id="'+data.MenuId+'_price" value="'+data.Price+'"></div>'); 
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

  function deletecartitem(id){
        $.ajax({
            url: "<?php echo base_url('Cashier/Remove/'); ?>" +id,
            success: function(i){
              refresh();
            }
        });
    }

  function DeleteAll(){
    $.ajax({
        url: "<?php echo base_url('Cashier/RemoveAll'); ?>",
        success: function(i){
          console.log(i);
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
      element +='<table class="table-responsive table-hover"  style="height:50%;"> <thead> <tr>  <th>Qty</th>  <th>Name</th> <th>Price</th> <th>Total</th> <th></th> <th>Action</th> <th></th> </tr> </thead> <tbody>';
      $.each(i, function(index, data){
                    element+=' <tr>  <td><input class="input-quantity" id="input-quantity-'+data.id+'" value='+data.qty+'  readonly></td> <td>'+data.name+'</td> <td>'+data.price+'</td> <td>'+(data.qty * data.price)+'</td> <td><div id="cart-price-'+data.id+'">'+(data.qty * data.price)+'</div></td>  <td><div class="btn-increment-decrement" onClick="decrement_quantity('+data.id+', '+data.price+')">-</div><input class="input-quantity" id="input-quantity-'+data.id+'" value='+data.qty+'  readonly><div class="btn-increment-decrement" onClick="increment_quantity('+data.id+', '+data.price+')">+</div></td> <td> <i class="btn btn-danger btn-xs fa fa-trash right" onclick="deletecartitem(\''+data.rowid+'\')" id="'+data.id+'"></i><td></tr> ';
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