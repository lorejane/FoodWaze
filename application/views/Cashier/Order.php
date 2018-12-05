<div class="row">
	<div class="col-sm-8">
		<div class="card" style="height:90%;">
 	       <div class="card-body" >
        <!-- Nav tabs -->

    <ul class="nav flex-column">
    	<li class="nav-item">
	      	<?php foreach($categories as $items){
				echo  '
	            <a class="btn nav-link" data-toggle="tab" href="#'.$items->CategoryId.'">
				 '.$items->CategoryName.'
				</a>
				 ';
				} 
						
			?>
		</li>

    </ul>
        <div class="tab-content" style="height:70%;">   
  			<div class="tab-pane fade active show" id="1">        
					<?php foreach($cat1 as $items){
						echo ' 
						<div class="col-sm-3" style="padding:5px; border:1px solid #ccc;" align="center" value="Add To Cart" onclick="MakeOrder('.$items->MenuId.')" >
						<input type="hidden" id="'.$items->MenuId.'_name"  value='.$items->Name.' >
						<input type="hidden" id="'.$items->MenuId.'_price"  value='.$items->Price.'><br/>
						<img style=\"width:20%;\" src='.base_url('pics/'.$items->Image).' > 
						<h4>'.$items->Name.'</h4>
						<h4 style="color:red;">&#X20B1;'.$items->Price.'.00</h4>
						</div>
						';
					} 
					?>
			</div>
            <div class="tab-pane fade" id="2">
				<?php foreach($cat2 as $items){
					echo ' 
					<div class="col-sm-3" style="padding:5px; border:1px solid #ccc;" align="center" value="Add To Cart" onclick="MakeOrder('.$items->MenuId.')" >
					<input type="hidden" id="'.$items->MenuId.'_name"  value='.$items->Name.' >
					<input type="hidden" id="'.$items->MenuId.'_price"  value='.$items->Price.'><br/>
					<img style=\"width:20%;\" src='.base_url('pics/'.$items->Image).' >
					<h4>'.$items->Name.'</h4>
					<h4 style="color:red;">&#X20B1;'.$items->Price.'.00</h4>
					</div>
					';
					} 
				?>
            </div>
            <div class="tab-pane fade" id="3">
				<?php foreach($cat3 as $items){
					echo ' 
					<div class="col-sm-3" style="padding:5px; border:1px solid #ccc;" align="center" value="Add To Cart" onclick="MakeOrder('.$items->MenuId.')" >
					<input type="hidden" id="'.$items->MenuId.'_name"  value='.$items->Name.' >
					<input type="hidden" id="'.$items->MenuId.'_price"  value='.$items->Price.'><br/>
					<img style=\"width:20%;\" src='.base_url('pics/'.$items->Image).' >
					<h4>'.$items->Name.'</h4>
					<h4 style="color:red;">&#X20B1;'.$items->Price.'.00</h4>
					</div>
					';
					} 
				?>
            </div>
            <div class="tab-pane fade" id="4">
				<?php foreach($cat4 as $items){
					echo ' 
					<div class="col-sm-3" style="padding:5px; border:1px solid #ccc;" align="center" value="Add To Cart" onclick="MakeOrder('.$items->MenuId.')" >
					<input type="hidden" id="'.$items->MenuId.'_name"  value='.$items->Name.' >
					<input type="hidden" id="'.$items->MenuId.'_price"  value='.$items->Price.'><br/>
					<img style=\"width:20%;\" src='.base_url('pics/'.$items->Image).' >
					<h4>'.$items->Name.'</h4>
					<h4 style="color:red;">&#X20B1;'.$items->Price.'.00</h4>
					</div>
					';
					} 
				?>
            </div>

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
		 <div class="col-6  cart">
            <div id="mycart"></div>
        </div><!-- show cart -->
	</div>
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
function MakeOrder(id)
        {                
          var mid;
          var name;
          var price;
          mid=document.getElementById(id);
          name=document.getElementById(id+"_name").value;
          price=document.getElementById(id+"_price").value;
          $.ajax({
            type:'post',
            url:'<?php echo base_url("Cashier/MakeOrder") ?>',
            data:{
              item_id:id,
              item_name:name,
              item_price:price
            },
            success:function(response) {
              show_order();				 
            },
            error: function(){
                alert('ERROR!');
            }
          });
		  
        }
</script>
    
<script>
	show_order();
	function show_order() {
          $.ajax({
                    type: 'ajax',
                    url: '<?php echo base_url()?>Cashier/ShowOrder',
                    async: false,
                    dataType: 'json',
                    success: function(data){
						console.log('---------DATA----------');
						console.log(data);
                        var i;	
								var html = '';
                                var i;										
                                var total=0.0;
                                for(i=0; i<data.length; i++){
                                    html += '<div >'+
												'<p>'+data[i].Name+' '+data[i].Price+' x '+data[i].Qty+' = '+data[i].Price*data[i].Qty+'</p>'                                                       
                                            '</div>';
                                            total+=data[i].Price*data[i].Qty;
                                }
                                html += 'TOTAL: '+total;
                                $('#mycart').html(html);
                    }
                });
        }
</script>