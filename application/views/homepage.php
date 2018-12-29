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
				         
            <a class="card-title" href="<?php echo base_url(); ?>">
            <h2 class="title"><strong>FoodWaze</strong></h2>
            </a>
           
            <a href="#" data-provide="fullscreen">
            <i class="ion-android-expand fullscreen-default"></i>
            <i class="ion-android-contract fullscreen-active"></i>
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
                                <div class="card">
                                    <div class="card-body"> 
                                        <div class="col-12">     
                                            <div class="row" id="filters">   
                                                <?php foreach($stall as $s): ?>
                                                
                                                <input type="checkbox" id="<?php echo $s->StallId; ?>" name="stall" value="<?php echo $s->StallId; ?>"/>
                                                <label for="<?php echo $s->StallId; ?>"><img src="images_foodwaze/stall/stall<?php echo $s->StallId; ?>.jpg" alt="" style="width: 200px; padding: 10px; margin: 10px; "><h4 title="<?php echo $s->Name; ?>"><?php echo $s->Name; ?></h4> </label>
                                                
                                                <?php endforeach; ?>
                                            </div>
                                        </div> <!--col-12-->
                                </div> <!--card-body-->
                            </div> <!--card-->
                            </div> <!-- end step 1 -->

                        
                            <!-- step 2 -->
                            <div class="tab-pane fade" id="wizard-navable-2">
                            <p class="text-center fs-35 text-muted"><strong class="text-primary">Order</strong> up!</p>
                                <div class="card">
                                    <div class="card-body">                                         
                                        <div class="row">
                                            <div class="col-6" id="menu-container">

                                            </div>
                                            
                                                <div class="col-6">
                                                    <!-- <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <address>
                                                            <strong>RKL Food Court</strong>
                                                            <p>
                                                            2135 Sunset Blvd
                                                            <br>
                                                            Pasay, PH 90026
                                                            </p>
                                                            <abbr title="Phone">P:</abbr> (09) 520-8929
                                                        </address>   
                                                    </div> -->

<!--                                                     
                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <em>Receipt #: </em>
                                                    </div>  

                                                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                                        <p>
                                                            <em><?php echo date("Y/m/d") . "<br>";?></em>
                                                        </p>
                                                    </div> KAT!!! WAG MO NA GALAWIN -KAT -->
                                                    
                                                    
                                                    <div class="cart">
                                                            <!-- <div>                                                            
                                                                <p class="text-center fs-30 text-muted"><strong class="text-primary">Receipt</strong></p>
                                                            </div> -->
                                                        <div id="mycart"></div>
                                                    </div>

                                                    <!-- <a href="<?php echo base_url("foodwaze/clearcart/") ?>"><input type="button" class="btn btn-sm btn-w-lg btn-bold btn-secondary file-browser" value="Clear Cart"></a> -->

                                            </div><!--col-6-->
                                       
                                        </div><!--row-->                                   
                                    </div><!--card body-->
                                    
                                </div> <!--card-->
                            </div><!--tab-->				
                            <!-- end step 2 -->


                            <!-- step 3 -->                            
                            <div class="tab-pane fade" id="wizard-navable-3">
                            <p class="text-center fs-35 text-muted">Tell us about <strong class="text-primary">yourself</strong></p>
                            <form action=<?php echo base_url('foodwaze/checkout');?> method="post">
                                <hr class="w-100px">
                                <div class="form-group row">
                                    <label class="col-3 col-lg-2 col-form-label text-center require">Name</label>
                                        <div class="col-8 col-lg-7">
                                            <input type="text" class="form-control" name="NameCustomer">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-lg-2 col-form-label text-center require">Contact No.</label>
                                        <div class="col-8 col-lg-7">
                                                <input type="number" pattern="[0-9]*" class="form-control" name="ContactNo" minlength="7" maxlength="11">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <button class="btn btn-primary d-none" data-wizard="finish" type="submit">Submit</button>
                                </div>
                            </form>  
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
                url:'<?php echo base_url("FoodWaze/addtocart") ?>',
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
    function deletecart(id)
            {     
              var name;
              $.ajax({
                type:'post',
                url:'<?php echo base_url("FoodWaze/deletetocart") ?>',
                data:{
                  item_id:id,
                  item_name:name
                },
                success:function(response) {
                  show_cart();	
                },
                error: function(){
                  alert('ERROR!');
                }
              });
			  
            }
        function minus1(id)
            {                
              var name;
              $.ajax({
                type:'post',
                url:'<?php echo base_url("FoodWaze/minus1") ?>',
                data:{
                  item_id:id,
                  item_name:name
                },
                success:function(data) {                    
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
                            dataType: 'json',
                            success: function(data){
								console.log('---------DATA----------');
								console.log(data);
                                var i;	
										var html = '';
                                        var i;										
                                        var total=0.0;
                                      
                                        html += '<div class="col-xs-6 col-sm-6 col-md-6"><em>Receipt #: </em></div><div class="col-xs-6 col-sm-6 col-md-6 text-right"><p><em><?php echo date("Y/m/d") ?></em></p></div><div><p class="text-center fs-30 text-muted"><strong class="text-primary">Receipt</strong></p><br></div>'+
                                                '</div>'; 

                                        for(i=0; i<data.length; i++){
                                            // html += '<div style="background-color: #d3d3d3; margin: 5px 10px 25px;">'+
                                            html += '<div>'+
                                            data[i].Name+' '+data[i].Qty+' x '+data[i].Price+' = '+data[i].Price*data[i].Qty+'<input type="button" class="btn btn-sm btn-w-lg btn-bold btn-danger" style="float: right; width: 0px; margin: 2px;" value="X" onclick="minus1('+data[i].Id+')" id="'+data[i].Id+'">'+'<input type="button" class="btn btn-sm btn-w-lg btn-bold btn-danger" style="float: right; width: 10%; margin: 2px;" value="X All" onclick="deletecart('+data[i].Id+')"id="'+data[i].Id+'">'+'</p>'+
                                                    '</div>';
                                                    total+=data[i].Price*data[i].Qty;
                                        }
                                        html += '<p style="border-top:1px solid #ccc;"><strong class="text-primary fs-15">TOTAL:</strong>'+total+
                                        '<br><a href="<?php echo base_url("foodwaze/clearcart/") ?>"><br><input type="button" class="btn btn-sm btn-w-lg btn-bold btn-secondary" value="Clear Cart"></a>';                                        
                                        $('#mycart').html(html);
                                        
                            },
                      error: function(){
                    alert('ERROR!');
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
                                $('#cat-' + data.CategoryId).append('<div class="col-sm-3 items" style="padding:5px; border:1px solid #ccc;" align="center" id="'+data.MenuId+'"><h5>'+data.Name+'</h5><h4 style="color:red;">&#X20B1; '+data.Price+'.00</h4><input type="button" value="Add To Cart" onclick="cart('+data.MenuId+')"><input type="hidden" id="'+data.MenuId+'_name" value="'+data.Name+'"><input type="hidden" id="'+data.MenuId+'_price" value="'+data.Price+'"></div>'); 
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
                                element +='<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cat-'+data.CategoryId+'"><h3>'+'<p class="text-center fs-30 text-muted">'+data.CategoryName+'</p>'+'</h3></a></li>';
                            }else{
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