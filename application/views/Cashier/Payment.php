<div class="main-content" style="padding:6%;">
 <div class="row"> 
  <div class="col-sm-12">
    <div class="card" style="height:90%;">
       
       <div>
		<a class="btn btn-danger" href="<?php echo base_url('Cashier/Order'); ?>"
		data-provide="tooltip">Back
		 <!-- <span class="close"><i class="ti-close" style="color:white"></i></span> -->
		</a>
		</div>
        <div class="card-body" >
        <div class="col-sm-7"></div>
       	<div class="col-sm-4">
		<div class="row" style="height:50%;">
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
		</div>
		</div>                  
        </div>          
    </div>
   </div>
 </div>
<!-- <header class="header"> 
<div class="container">
	<div class="header-info">
	<div class="left">
		<br>
		<h2 class="header-title"><strong>EMPLOYEES</strong></h2>
	</div>
	</div>

	<div class="header-action">
	<div class="buttons">
	</div>
	</div>
		<button class="btn btn-float btn-lg btn-info float-md-right text-white" href="<?php echo base_url('Cashier/Order'); ?>"
		data-provide="tooltip">
		 <span class="close"><i class="ti-close" style="color:white"></i></span>
		</button>
</div>
</header> -->
<!--
<?php include("EmployeesModal.php");?>
-->
