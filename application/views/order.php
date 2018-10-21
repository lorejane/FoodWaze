
<div class="row">
	<div class="col-sm-6" style="padding-left:3%;">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#meal">Meal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pasta">Pasta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#dessert">Dessert</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#drinks">Drinks</a>
            </li>
        </ul>
                <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade active show" id="meal">
              	<table cellpadding="6" cellspacing="1" border="solid thin black">
					<thead><tr><th>id</th><th>name</th><th>price</th><th>quantity</th><th>Action</th></tr></thead>
					<tbody>
					<?php foreach($cat1 as $items): ?>
					  <tr>
					    <td><?php echo $items['MenuId'] ?></td>
					    <td><?php echo $items['Name'] ?></td>
					    <td><?php echo $items['Price'] ?></td>
					    <td><input type = "number" min = "1" id = "<?php echo $items['MenuId'] ?>" /></td>
					    <td>
					      <button class = "addToCart" data-id = "<?php echo $items['MenuId'] ?>" data-name = "<?php echo $items['Name'] ?>" data-price = "<?php echo $items['Price'] ?>">Add to cart</button>
					    </td>    
					  </tr>
					<?php endforeach; ?>
					</tbody>
				</table>
            </div>
            <div class="tab-pane fade" id="pasta">
               	<table cellpadding="6" cellspacing="1" border="solid thin black">
					<thead><tr><th>id</th><th>name</th><th>price</th><th>quantity</th><th>Action</th></tr></thead>
					<tbody>
					<?php foreach($cat2 as $items): ?>
					  <tr>
					    <td><?php echo $items['MenuId'] ?></td>
					    <td><?php echo $items['Name'] ?></td>
					    <td><?php echo $items['Price'] ?></td>
					    <td><input type = "number" min = "1" id = "<?php echo $items['MenuId'] ?>" /></td>
					    <td>
					      <button class = "addToCart" data-id = "<?php echo $items['MenuId'] ?>" data-name = "<?php echo $items['Name'] ?>" data-price = "<?php echo $items['Price'] ?>">Add to cart</button>
					    </td>    
					  </tr>
					<?php endforeach; ?>
					</tbody>
				</table>
            </div>
            <div class="tab-pane fade" id="dessert">
               	<table cellpadding="6" cellspacing="1" border="solid thin black">
					<thead><tr><th>id</th><th>name</th><th>price</th><th>quantity</th><th>Action</th></tr></thead>
					<tbody>
					<?php foreach($cat3 as $items): ?>
					  <tr>
					    <td><?php echo $items['MenuId'] ?></td>
					    <td><?php echo $items['Name'] ?></td>
					    <td><?php echo $items['Price'] ?></td>
					    <td><input type = "number" min = "1" id = "<?php echo $items['MenuId'] ?>" /></td>
					    <td>
					      <button class = "addToCart" data-id = "<?php echo $items['MenuId'] ?>" data-name = "<?php echo $items['Name'] ?>" data-price = "<?php echo $items['Price'] ?>">Add to cart</button>
					    </td>    
					  </tr>
					<?php endforeach; ?>
					</tbody>
				</table>
            </div>
            <div class="tab-pane fade" id="drinks">
               	<table cellpadding="6" cellspacing="1" border="solid thin black">
					<thead><tr><th>id</th><th>name</th><th>price</th><th>quantity</th><th>Action</th></tr></thead>
					<tbody>
					<?php foreach($cat4 as $items): ?>
					  <tr>
					    <td><?php echo $items['MenuId'] ?></td>
					    <td><?php echo $items['Name'] ?></td>
					    <td><?php echo $items['Price'] ?></td>
					    <td><input type = "number" min = "1" id = "<?php echo $items['MenuId'] ?>" /></td>
					    <td>
					      <button class = "addToCart" data-id = "<?php echo $items['MenuId'] ?>" data-name = "<?php echo $items['Name'] ?>" data-price = "<?php echo $items['Price'] ?>">Add to cart</button>
					    </td>    
					  </tr>
					<?php endforeach; ?>
					</tbody>
				</table>
            </div>
        </div>

	</div>	
<div class="col-sm-6">
<a href = "<?php echo base_url('emptyCart/'); ?>">Empty cart</a>
<table id = "cart" cellpadding="6" cellspacing="1" border="solid thin black">
<thead>
  <tr><th>id</th><th>name</th><th>price</th><th>quantity</th><th>total price</th><th>Action</th></tr>
</thead>
<tbody>
<?php foreach($this->cart->contents() as $items): ?>
  <tr>        
    <td><?php echo $items['MenuId'] ?></td>
    <td><?php echo str_replace('_', ' ', str_replace('_00', ')', str_replace('00_', '(', $items['Name']))) ?></td>
    <td><?php echo $items['Price'] ?></td>
    <td><?php echo $items['qty'] ?></td>
    <td><?php echo $items['Price'] * $items['qty'] ?></td>
    <td>
      <a href = "<?php echo base_url('removeFromCart/'.$items['rowid']); ?>">Remove from cart</a>
    </td>
  </tr>
<?php endforeach; ?>
  <tr><td>Total</td><td><?php echo $this->cart->total(); ?></td></tr>
</tbody>
</table>
</div>
</div>

<script>
  $('.addToCart').click(function(){
    var MenuId = $(this).data('MenuId');
    var Name = $(this).data('Name');
    var Price = $(this).data('Price');
    var quantity = $('#' + MenuId).val();    
    if(quantity != '' && quantity > 0){
      $.ajax({
        url: "<?php echo base_url('Order/addToCart/'); ?>"+MenuId+"/"+Name.replace(/ /g, '_').replace('(','00_').replace(')','_00')+"/"+quantity+"/"+Price,
        success: function(data){
          alert(quantity + " " + Name + "(s) added to cart");          
          $('#cart').html(data);
        }
      });
    }else{
      alert("Invalid quantity");
    }    
    $('#' + MenuId).val('');
  });
</script>
<!--
	<div class="row">
		<div class="menu col-sm-8" style="height:100%; overflow:auto;">
			<div class="btn-group" role="group">
				<form name="orderform">
				<div class="click col-sm-3">
					<div class="row">
						<div class="col-sm-6">
							<h5>PRICE:50</h5>
						</div>
						
					</div>	
					<div class="row">
						<button type="button" value="50" class="b btn btn-default">order</button>
					</div>						
				</div>
				<div class="click col-sm-3">
					<div class="row">
						<div class="col-sm-6">
							<h5>PRICE:10</h5>
						</div>
						
					</div>	
					<div class="row">
						<button type="button" value="10" class="b btn btn-default">order</button>
					</div>						
				</div>
				<div class="click col-sm-3">
					<div class="row">
						<div class="col-sm-6">
							<h5>PRICE:30</h5>
						</div>
						
					</div>	
					<div class="row">
						<button type="button" value="30"  class="b btn btn-default">order</button>
					</div>						
				</div>			
				<div class="click col-sm-3">
					<div class="row">
						<div class="col-sm-6">
							<h5>PRICE:40</h5>
						</div>
						
					</div>	
					<div class="row">
						<button type="button" value="40" class="b btn btn-default">order</button>
					</div>						
				</div>
				<div class="click col-sm-3">
					<div class="row">
						<div class="col-sm-6">
							<h5>PRICE:100</h5>
						</div>
						
					</div>	
					<div class="row">
						<button type="button" value="100" class="b btn btn-default">order</button>
					</div>						
				</div>					
			</div>
		</div>
		<div class="col-sm-4" style="padding-left:20px;">
				<div class="menu row" style="height:55%;">
						<h1>RECEIPT</h1>
						<center>FOODWAZE</center><br/>
						TOTAL:<input type="text" id="input" /><br/>
						CASH:<br/>
						CHANGE:<br/>
						Grp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Net&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						VAT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gross<br/>
						VATABLE<br/>
						VAT EXEMPT<br/>
						ZERO RATED<br/>
				</div>
				</form>
				<div class="menu row">
					<form name="calcform">
					<button type="button" name="btn1" value="1" onclick="displaynum(btn1.value)" class="keypad btn btn-default">1</button>
					<button type="button" name="btn2" value="2" onclick="displaynum(btn2.value)" class="keypad btn btn-default">2</button>
					<button type="button" name="btn3" value="3" onclick="displaynum(btn3.value)" class="keypad btn btn-default">3</button>
					<button type="button" name="btn4" value="4" onclick="displaynum(btn4.value)" class="keypad btn btn-default">4</button>
					<button type="button" name="btn5" value="5" onclick="displaynum(btn5.value)" class="keypad btn btn-default">5</button>
					<button type="button" name="btn6" value="6" onclick="displaynum(btn6.value)" class="keypad btn btn-default">6</button>
					<button type="button" name="btn7" value="7" onclick="displaynum(btn7.value)" class="keypad btn btn-default">7</button>
					<button type="button" name="btn8" value="8" onclick="displaynum(btn8.value)" class="keypad btn btn-default">8</button>
					<button type="button" name="btn9" value="9" onclick="displaynum(btn9.value)" class="keypad btn btn-default">9</button>
					<button type="button" name="btn0" value="0" onclick="displaynum(btn0.value)" class="keypad btn btn-default">0</button>
					<button type="button" name="potbtn" value="." onclick="displaynum(potbtn.value)" class="keypad_op btn btn-default">.</button>
					<button type="button" name="subbtn" value="-" onclick="displaynum(subbtn.value)" class="keypad_op btn btn-default">-</button>
					<button type="button" name="addbtn" value="+" onclick="displaynum(addbtn.value)" class="keypad_op btn btn-default">+</button>
					<button type="button" name="mulbtn" value="*" onclick="displaynum(mulbtn.value)" class="keypad_op btn btn-default">*</button>
					<button type="button" name="divbtn" value="/" onclick="displaynum(divbtn.value)" class="keypad_op btn btn-default">/</button>
					<button type="button" name="eqlbtn" value="=" onclick="txt1.value=eval(txt1.value)" class="keypad_op btn btn-default">=</button>
					<button type="reset" name="reset" class="keypad_op btn btn-danger">C</button>
					<button type="button" id="idOfButtonToClick" class="keypad_op btn btn-danger">X</button>
					Amount:<input id="idOfInput" type="text"  name="txt1" style="text-align:right;">
				</form>
				</div>
		</div>
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
-->
