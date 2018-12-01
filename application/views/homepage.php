<!-- Preloader -->


<div class="preloader">
      <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
      </div>
</div>       

            <!-- Topbar -->
            <header class="topbar">
				<!--<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span id="total"> </span></a>
				<div class="cart">
				<ul class="dropdown-menu dropdown-cart" role="menu">
				
				  <li class="divider"></li>
				  <li><a class="text-center" href="">View Cart</a></li>
				  </ul>
				  </div>
				</li>
			  </ul>-->
            <!-- <h1 class="card-title"><strong>FoodWaze</strong></h1> -->
            <a class="card-title" href="<?php echo base_url(); ?>">
            <h1 class="title"><strong>FoodWaze</strong></h1>
            </a>
           

                <!-- <a class="menu-item active" href="<?php echo base_url();?>">HOME</a>
                <a class="menu-item" href="<?php echo base_url('customer/orderpage'); ?>">ORDER</a>
                <a class="menu-item" href="<?php echo base_url('customer/aboutpage'); ?>">ABOUT</a>
 -->

            <a class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
                <i class="material-icons fullscreen-default">fullscreen</i>
                <i class="material-icons fullscreen-active">fullscreen_exit</i>
            </a>
            </header>
                <!-- END Topbar -->

        
<!-- Main container -->
<main class="main-container">
	
    <div class="main-content">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title"><strong>Ordering made EZ!</strong></div>
        

                    <div class="card-body">
                    <!-- <form data-provide="wizard" novalidate="true"> -->
                        <div data-provide="wizard" data-navigateable="true">
                            <ul class="nav nav-process nav-process-circle">
                                <li class="nav-item">
                                    <span class="nav-title">Step 1</span>
                                    <a class="nav-link" data-toggle="tab" href="#wizard-navable-1"></a>
                                </li>

                                <li class="nav-item">
                                    <span class="nav-title">Step 2</span>
                                    <a class="nav-link" data-toggle="tab" href="#wizard-navable-2"></a>
                                </li>

                                <li class="nav-item">
                                    <span class="nav-title">Step 3</span>
                                    <a class="nav-link" data-toggle="tab" href="#wizard-navable-3"></a>
                                </li>

                            </ul>
                        

                            <div class="tab-content"> <!-- step 1 -->
                                <div class="tab-pane fade active show" id="wizard-navable-1">
                                <p class="text-center fs-35 text-muted">Pick a  <strong class="text-primary">stall</strong>.</p>
                            
                                    <div class="row" id="filters">   
                                        <?php foreach($stall as $s): ?>
                                        
                                        <input type="checkbox" id="<?php echo $s->StallId; ?>" name="stall" value="<?php echo $s->StallId; ?>"/>
                                        <label for="<?php echo $s->StallId; ?>"><img src="images_foodwaze/stall/stall<?php echo $s->StallId; ?>.jpg" alt="" style="width:200px"><h4 title="nav-title"><?php echo $s->Name; ?></h4> </label>
                                        
                                        
                                        <?php endforeach; ?>
                                    </div>

                            </div> <!-- end step 1 -->

                        
                            <!-- step 2 -->
                            <div class="tab-pane fade" id="wizard-navable-2">
                            <p class="text-center fs-35 text-muted"><strong class="text-primary">Order</strong> up!</p>
                                <p class="text-center text-gray">What's your order?</p>
                                <div class="card">
                                    <div class="card-body">                                         
                                        <div class="row">
                                            <div class="col-6" id="menu-container">

                                            </div>   
                                            <div class="col-6 cart">
                                                <div>
                                                    <p class="text-center fs-35 text-muted">Your <strong class="text-primary">Cart</strong> </p>
                                                </div>
                                                <div id="mycart"></div>
                                            </div>
                                        </div>                                        
                                    </div>
                                    
                                </div>
                            </div>							
                            <!-- end step 2 -->


                            <!-- step 3 -->

                            <div class="tab-pane fade" id="wizard-navable-3">
                            <p class="text-center fs-35 text-muted">Tell us about <strong class="text-primary">yourself</strong></p>
                                <hr class="w-100px">


                                <div class="form-group row">
                                    <label class="col-3 col-lg-2 col-form-label text-center require" for="input-1">Name</label>
                                        <div class="col-8 col-lg-7">
                                            <input type="text" class="form-control" name="NameCustomer" id="input-1" required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-lg-2 col-form-label text-center require" for="input-1">Contact No.</label>
                                        <div class="col-8 col-lg-7">
                                                <input type="number" class="form-control" name="ContactNo" id="input-1" required max="11">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                </div>

                                    

                            </div>
                            <!--end step 3 -->
                        </div>
                        <!-- card body -->
                    </div>
                <hr>

                <div class="flexbox">
                    <button class="btn btn-secondary" data-wizard="prev" type="button">Back</button>
                    <button class="btn btn-secondary" data-wizard="next" type="button">Next</button>
                    <button class="btn btn-primary d-none" data-wizard="finish" type="submit">Submit</button>
                </div>
            <!-- </form> -->

            </div> <!-- end col -->
        </div><!-- end row -->
    </div><!-- end content -->
</main>
<!-- END Main container -->
	<script>
	function cart(id)
            {                
              var mid;
              var name;
              var price;
              mid=document.getElementById(id);
              name=document.getElementById(id+"_name").value;
              price=document.getElementById(id+"_price").value;
              $.ajax({
                type:'post',
                url:'<?php echo base_url("foodwaze/addtocart") ?>',
                data:{
                  item_id:id,
                  item_name:name,
                  item_price:price
                },
                success:function(response) {
                  show_cart();				 
                },
                error: function(){
                    alert('ERROR!');
                }
              });
			  
            }
	</script>
        <script>
			show_cart();
			function show_cart() {
                  $.ajax({
                            type: 'ajax',
                            url: '<?php echo base_url()?>foodwaze/showcart',
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
                                            html += '<div>'+
														'<p>'+data[i].Name+' '+data[i].Price+' x '+data[i].Qty+' '+data[i].Price*data[i].Qty+'</p>'+                                                        
                                                    '</div>';
                                                    total+=data[i].Price*data[i].Qty;
                                        }
                                        html += 'TOTAL: '+total;
                                        $('#mycart').html(html);
                            }
                        });
                }
		</script>
        <script>
			
            function menu(id) {
                  return $.ajax({
                        url: "<?php echo base_url("foodwaze/getMenu/") ?>" + id, 
                        success: function(menu){
                            menu=JSON.parse(menu);
                            console.log('---------MENU----------');
                            // console.log(menu);
                            $.each(menu, function(index, data){
                                //console.log(data);
                                //data.Price
                                $('#cat-' + data.CategoryId).append('<div class="col-sm-3 items" style="padding:5px; border:1px solid #ccc;" align="center" id="'+data.MenuId+'"><h4>'+data.Name+'</h4><h4 style="color:red;">&#X20B1; '+data.Price+'.00</h4><input type="button" value="Add To Cart" onclick="cart('+data.MenuId+')"><input type="hidden" id="'+data.MenuId+'_name" value="'+data.Name+'"><input type="hidden" id="'+data.MenuId+'_price" value="'+data.Price+'"></div>   '); 
                            });
                        }
                    }) 
                }
            $("input:checkbox").on('click', function() {
              var $box = $(this);
              if ($box.is(":checked")) {
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                $(group).prop("checked", false);
                $box.prop("checked", true);      
                id=$(this).attr('id');
                console.log(id);    
                $.ajax({
                    url: "<?php echo base_url("foodwaze/getCategory/") ?>" + id, 
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
                                element +='<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cat-'+data.CategoryId+'"><h3>'+'<p class="text-center fs-35 text-muted">'+data.CategoryName+'</p>'+'</h3></a></li>';
                            }else{
                                element +='<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cat-'+data.CategoryId+'"><h3>'+'<p class="text-center fs-35 text-muted">'+data.CategoryName+'</p>'+'</h3></a></li>';
                            }
                        })
                        element +='</ul>';
                        element +='<div class="tab-content">';
                        first = true;
                        $.each(kat, function(index, data){
                            if(first){
                                first = false;
                                element +='<div class="tab-pane fade active show" id="cat-' + data.CategoryId + '"></div>';                                     
                            }else{
                                element +='<div class="tab-pane fade" id="cat-' + data.CategoryId + '"></div>';
                            }
                        })
                        element +='</div>';
                        $('#menu-container').html(element);
                        menu(id);
                    }
                })                                                
                 
              }
              else {
                $box.prop("checked", false);
              }
            });
            
            
        </script>
