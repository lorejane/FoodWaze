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
           
            
            <a onclick="toggleFullScreen()" class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
                <i class="material-icons fullscreen-default">fullscreen</i>
            </a>

            </header>
                <!-- END Topbar -->

        
<!-- Main container -->
<main class="main-container">
    
    <div class="main-content">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card card-shadowed">
                    <div class="card-title"><strong>Ordering made EZ!</strong></div>
        

                    <div class="card-body">
                    <!-- <form data-provide="wizard" novalidate="true"> -->
                        <div data-provide="wizard" data-navigateable="true">
                        <ul class="nav nav-process nav-process-circle">
                            <li class="nav-item">
                                <span class="nav-title">Step 1</span>
                                <a id="tab1" class="nav-link" data-toggle="tab" href="#wizard-navable-1"></a>
                            </li>

                            <li class="nav-item">
                                <span class="nav-title">Step 2</span>
                                <a id="tab2" class="nav-link" data-toggle="tab" href="#wizard-navable-2"></a>
                            </li>

                            <li class="nav-item">
                                <span class="nav-title">Step 3</span>
                                <a id="tab3" class="nav-link" data-toggle="tab" href="#wizard-navable-3"></a>
                            </li>

                        </ul>
                        

                            <div class="tab-content"> <!-- step 1 -->
                                <div class="tab-pane fade active show" id="wizard-navable-1">
                                
                                <p class="text-center fs-35 text-muted">Pick a  <strong class="text-primary">stall</strong>.</p>
                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                        <div class="col-12">
                                            <div class="row" id="filters"> 
                                                <?php foreach($stall as $s): ?>
                                                <div class="col-lg-3 col-xs-3"> <!--PLEASE LANG WAG NA GALAWIN KAT OKAY NA -->
                                                <input type="checkbox" id="<?php echo $s->StallId; ?>" name="<?php echo $s->Name; ?>" value="<?php echo $s->StallId; ?>"/>
                                                <label for="<?php echo $s->StallId; ?>"><img src="images_foodwaze/stall/stall<?php echo $s->StallId; ?>.jpg" alt="" style="width: 200px; padding: 10px; margin: 5px;">
                                                <strong><h4 style="color:grey;" title="<?php echo $s->Name; ?>"><?php echo $s->Name; ?></h4></strong></label>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div> <!--col-12-->
                                        </center>
                                    </div> <!--card-body-->
                                </div> <!--card-->
                            </div> <!-- end step 1 -->


                        
                            <!-- step 2 -->
                            <div class="tab-pane fade" id="wizard-navable-2">
                            <p class="text-center fs-35 text-muted"><strong class="text-primary">Order</strong> up!</p>
                            <button type="button" class="btn btn-lg btn-round btn-danger" data-toggle="modal" data-target="#myModal" onclick="show_cart()">View Cart</button>
                                <div class="card">
                                    <div class="card-body">                                         
                                        <div class="row">
                                            <div class="col-sm-12" id="menu-container">

                                            </div>
                                            
                                                <!-- <div class="col-md-6 col-sm-12"> -->
                                                <div class="col-12">
                                                    
                                                    <div class="cart">
                                                        <div id="mycart"></div>                                                        
                                                    </div>                                                    
                                                    
                                                </div><!--col-md-6 col-sm-12-->
                                                
                                                
          
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
                                    <label class="col-3 col-lg-2 text-center">Name</label>
                                        <div class="col-8 col-lg-7">
                                            <input type="text" class="form-control" name="NameCustomer" required/>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-lg-2 text-center">Contact No.</label>
                                        <div class="col-8 col-lg-7">
                                                <input type="number" pattern="[0-9]*" class="form-control" name="ContactNo" minlength="7" maxlength="11" required/>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                </div>                             


                                <div class="hidden">
                                    <button id="fsubmit" class="btn btn-primary" data-wizard="finish" type="submit">Submit</button>
                                </div>
                            </form>  
                      </div>
                <hr>
                <div class="flexbox">
                    <button onclick="back()" class="btn btn-primary" data-wizard="prev" type="button">Back</button>
                    <button id="next" class="btn btn-primary" data-wizard="next" onclick="start()" type="button">Next</button>
                    <button onclick="submitform()" class="btn btn-primary d-none" data-wizard="finish" type="submit">Submit</button>
                </div>

            <!-- </form> -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">      
                    <div class="modal-content">
                        <div class="modal-header" style="border-bottom: 3px solid #20B2AA;">
                        <center><h3 style="font-weight: 700;">Your Cart</h3></center>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <!-- <p>445 Mount Eden Road, Sta. Circa, Manila</p>
                            <p><em>(02)782-8410/09041832245</em></p> -->
                            <h2 class="text-center" id="stallname" style="color: #20B2AA; font-weight: 500;">Name of Stall</h2>
                            <!-- <p class="text-right"><em><?php echo date("Y/m/d") ?></em></p>
                             <table class="table table-hover">
                                <thead>
                                <tr>
                                <th>Qty</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th><center>Remove</center></th>
                                </tr>
                                </thead>
                                <tbody id="cartdata">
                                </tbody>
                            </table>
                            <h3 style="color: #000; font-weight: 700; letter-spacing: 2px; text-align: right;"><strong>Total: &#X20B1;<span id="total"></span></strong></h3> --> 
                        <div class="modal-footer">
                            <a href="<?php echo base_url("foodwaze/clearcart/") ?>"><br><input type="button" class="btn btn-sm btn-outline btn-round btn-danger" value="Clear Cart"></a>
                        </div>
                        </div>
                        </div>
                </div>
            </div>
            </div> <!-- end col -->
        </div><!-- end row -->
    </div><!-- end content -->
</main>
<!-- END Main container -->


    
<script>
  var name ='';
  var identifier;
  start();
  function start(){
    document.getElementById("tab1").disabled = true; 
    document.getElementById("tab2").disabled = true;
    document.getElementById("tab3").disabled = true;
    if (identifier>0) {
      document.getElementById("next").disabled = false;
    }
    else
      document.getElementById("next").disabled = true;
  }
  function back(){
    document.getElementById("next").disabled = false;
  }
  function submitform(){
    document.getElementById("fsubmit").click(); 
  }
 
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
        document.getElementById("next").disabled = true;
                  $.ajax({
                        type: 'ajax',
                        url: '<?php echo base_url()?>foodwaze/showcart',
                        dataType: 'json',
                        success: function(data){
                                console.log('---------CART DATA----------');
                                console.log(data);
                                var i;  
                                var html = '';
                                var total=0.0;
                                for(i=0; i<data.length; i++){
                                    if(data[i].Id=='no cart')
                                    {     
                                        html +='No item in cart';
                                        $('#cartdata').html(html);
                                        total+=0;
                                        document.getElementById("next").disabled = true;
                                    }
                                    else
                                    {
                                        html += '<p class="text-right"><em><?php echo date("Y/m/d") ?></em></p>';
                                '<table class="table table-hover">'+
                                '<thead><tr>'+
                                '<th>Qty</th>'+
                                '<th>Product name</th>'+
                                '<th>Price</th>'+
                                '<th><center>Remove</center></th>'+
                                '</tr></thead>'+
                                '<tbody id="cartdata"></tbody>'+'</table>'
                                '<h3 style="color: #000; font-weight: 700; letter-spacing: 2px; text-align: right;"><strong>Total: &#X20B1;<span id="total"></span></strong></h3>';
                                        
                                        
                                        html += '<tr>'+
                                                '<td>'+data[i].Qty+'</td>'+
                                                '<td>'+data[i].Name+'</td>'+
                                                '<td>&#X20B1;'+data[i].Price+'</td>'+
                                                '<td>'+'<center><a href="#" class="fa fa-minus-circle" onclick="minus1('+data[i].Id+')"></a></center>'+'</td>'+
                                                '</tr>';
                                            total+=data[i].Price*data[i].Qty;
                                            identifier=1;
                                            document.getElementById("next").disabled = false;
                                        $('#cartdata').html(html);
                                    }
                                }
                                document.getElementById("total").innerHTML = total;
                            },
                      error: function(response){
                            var html;
                            html +='No item in cart';
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
                                
                                //ORIG
                                // $('#cat-' + data.CategoryId).append('<div class="col-lg-3 col-xs-items" style="border:1px solid #ccc; padding: 10px;" align="center" id="'+data.MenuId+'">'+
                                // '<h3 style="color:#20B2AA;"><strong>'+data.Name+'</strong></h3><h5 style="color:grey;">&#X20B1;'+data.Price+'.00</h5><p style="color:#20B2AA;">'+data.ItemDescription+'</p>'+
                                // '<i class="fa fa-plus btn btn-primary" style="font-size: 12px; font-family: Roboto;" onclick="cart('+data.MenuId+')"> Add to Cart</i>'+ //+ sign
                                // '<input type="hidden" id="'+data.MenuId+'_name" value="'+data.Name+'"><input type="hidden" id="'+data.MenuId+'_price" value="'+data.Price+'"></div>'); 
                               
                               //TEST FULL
                                $('#cat-' + data.CategoryId).append('<div class="col-lg-3 col-xs-3 items" style="border:1px solid #ccc; padding: 10px;" align="center" id="'+data.MenuId+'">'+
                                '<h3 style="color:#20B2AA;"><strong>'+data.Name+'</strong></h3><h5 style="color:grey;">&#X20B1;'+data.Price+'.00</h5><p style="color:#20B2AA;">'+data.ItemDescription+'</p>'+
                                '<i class="fa fa-plus btn btn-primary" style="font-size: 12px; font-family: Roboto;" onclick="cart('+data.MenuId+')"> Add to Cart</i>'+ //+ sign
                                '<input type="hidden" id="'+data.MenuId+'_name" value="'+data.Name+'"><input type="hidden" id="'+data.MenuId+'_price" value="'+data.Price+'"></div>'); 
                            });
                        }
                    }) 
                }

            $("input:checkbox").on('click', function() {              
              var $box = $(this);
              if ($box.is(":checked")) {
                document.getElementById("next").disabled = false;
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                $(group).prop("checked", false);
                $box.prop("checked", true);      
                id=$(this).attr('id');
                name=$(this).attr('name');
                console.log(name);                  
                $.ajax({
                    url: "<?php echo base_url("foodwaze/getCategory/") ?>" + id, 
                    success: function(kat){
                        document.getElementById("stallname").innerHTML = name;
                        kat = JSON.parse(kat);
                        console.log('---------CATEGORY----------');
                        console.log(kat);                                
                        var element = '';
                        element +=' <ul class="nav nav-tabs">';
                        var first = true;
                        $.each(kat, function(index, data){
                            if(first){
                                first = false;
                                element +='<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#cat-'+data.CategoryId+'"><h3>'+'<p class="text-center text-muted">'+data.CategoryName+'</p>'+'</h3></a></li>';
                            } else{
                                element +='<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cat-'+data.CategoryId+'"><h3>'+'<p class="text-center text-muted">'+data.CategoryName+'</p>'+'</h3></a></li>';
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
                        document.getElementById("next").click();
                        menu(id);
                    }
                })                                                
                 
              }
              else {
                $box.prop("checked", false);
                document.getElementById("next").disabled = true;
              }
            });   


          function toggleFullScreen() {
            if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
            (!document.mozFullScreen && !document.webkitIsFullScreen)) {
              if (document.documentElement.requestFullScreen) {  
                document.documentElement.requestFullScreen();  
              } else if (document.documentElement.mozRequestFullScreen) {  
                document.documentElement.mozRequestFullScreen();  
              } else if (document.documentElement.webkitRequestFullScreen) {  
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
              }  
            } else {  
              if (document.cancelFullScreen) {  
                document.cancelFullScreen();  
              } else if (document.mozCancelFullScreen) {  
                document.mozCancelFullScreen();  
              } else if (document.webkitCancelFullScreen) {  
                document.webkitCancelFullScreen();  
              }  
            }  
          }
        </script>