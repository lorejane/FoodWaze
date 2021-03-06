<!-- Preloader -->
<div class="preloader" >
      <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
      </div>
</div>       
        
<!-- Main container -->
<br/><br/><br/>
<!-- <main class="main-container"> -->

    <div class="main-content" style="background-image: url(images_foodwaze/rnw.jpg); background-size: auto;">
    <div class="row">
        
        <div class="col-lg-12">
            <div class="card card-shadowed" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
                <div class="card-title"  style="background-color:#b53b30;"><strong style="color:white;">Ordering made EZ!</strong></div>
    

                <div class="card-body">
                <!-- <div class="card-body" style="background-color:#b53b30;"> -->
             
                    <div data-provide="wizard" data-navigateable="true">
                    <ul class="nav nav-process nav-process-circle">
                        <li class="nav-item">
                            <span class="nav-title" style="color:#b53b30; font-family: malgun gothic; font-size:15px; font-weight: bold;">Step 1</span>
                            <a id="tab1" class="nav-link" data-toggle="tab" href="#wizard-navable-1"></a>
                        </li>

                        <li class="nav-item">
                            <span class="nav-title" style="color:#b53b30; font-family: malgun gothic; font-size:15px; font-weight: bold;">Step 2</span>
                            <a id="tab2" class="nav-link" data-toggle="tab" href="#wizard-navable-2"></a>
                        </li>

                    </ul>
                    

                        <div class="tab-content" > <!-- step 1 -->
                            <div class="tab-pane fade active show" id="wizard-navable-1">
                            
                            <p class="text-center fs-30 text-muted">Choose a <strong class="text-primary" style="text-shadow: 1px 2px 2px #706763;">Stall</strong></p>
                            <div class="card">
                                <div class="card-body"> 
                                    <div class="col-12">     
                                        <div class="row" id="filters">   
                                            <?php foreach($stall as $s): ?>
                                            
                                            <div class="col-lg-3 col-xs-3"> <!--PLEASE LANG WAG NA GALAWIN KAT OKAY NA -->
                                            <input type="checkbox" id="<?php echo $s->StallId; ?>" name="<?php echo $s->Name; ?>" value="<?php echo $s->StallId; ?>"/>
                                            <label for="<?php echo $s->StallId; ?>">
                                              <img src="<?php echo base_url('images_foodwaze/stall/stall'.$s->StallId); ?>.jpg" alt="" style="width: 200px; padding: 10px; margin: 5px;">
                                            <!-- <strong><h3 style="color:#b53b30; font-family: black jack;" title="<?php echo $s->Name; ?>"><?php echo $s->Name; ?></h3></strong></label> --> </label>
                                            </div>

                                            <?php endforeach; ?>
                                        </div>
                                    </div> <!--col-12-->
                            </div> <!--card-body-->
                        </div> <!--card-->
                        </div> <!-- end step 1 -->


                    
                        <!-- step 2 -->
                        <div class="tab-pane fade" id="wizard-navable-2">
                        <p class="text-center fs-30 text-muted"><strong class="text-primary" style="text-shadow: 1px 2px 2px #706763;">Order</strong> up!</p>
                        
                            <div class="card"> 
                              <div class="card-body">                                         
                                <div class="row">
                        <form action=<?php echo base_url('FoodWaze/Checkout');?> method="post">
                                  <div class="col-sm-12" id="menu-container">
                                  </div>                                    
                                </div><!--row--> 
                            <div class="hidden">
                                <button id="fsubmit" class="btn btn-primary" data-wizard="finish" type="submit">Submit</button>
                            </div>
                        </form>  
                                      <button type="button" style="position:fixed; z-index:3000; height:10%; width:5%; bottom:30; right:25; border-radius:50%;" class="btn btn-lg btn-primary fa fa-shopping-cart" data-toggle="modal" data-target="#myModal" onclick="show_cart()"></button>                            
                              </div><!--card body-->                                
                            </div> <!--card-->

                        </div><!--tab-->           

                        <!-- end step 2 -->
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
                        <div class="modal-header" style="background-color: #b53b30; border-bottom: box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <center><h3 style="color:white; font-weight: 500; text-shadow: 1px 2px 2px #20b2aa;">Your Cart</h3></center>
                        <button type="button" class="close" data-dismiss="modal"style="color:white;">&times;</button>
                        </div>
                        <div class="modal-body">
                            <!-- <p>445 Mount Eden Road, Sta. Circa, Manila</p>
                            <p><em>(02)782-8410/09041832245</em></p> -->
                            <h2 class="text-center" id="stallname" style="color: #b53b30; font-weight: 500; font-family: black jack;text-shadow: 1px 2px 2px #706763;"></h2>
                            <!-- <p class="text-right"><em><?php echo date("Y/m/d") ?></em></p> -->
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
                            <h3 style="font-weight: 700;  text-align: right; border-bottom: 1px solid; border-top: 1px solid;"><strong>Total:  <strong style="color:#b53b30;">&#X20B1;<span id="total"></span></strong></strong></h3> 
                        <div class="modal-footer">
                            <a href="<?php echo base_url("FoodWaze/Clearcart/") ?>"><br><input type="button" class="btn btn-sm btn-outline btn-round btn-primary" value="Clear Cart"></a>
                        </div>
                        </div>
                        </div>
                </div>
            </div>
            </div> <!-- end col -->
        </div><!-- end row -->
    </div><!-- end content -->
<!-- </main> -->
<!-- END Main container -->

<script>

  var name ='';
  var identifier;
  start();
  function start(){

    $("input:checkbox").prop("checked", false);
    document.getElementById("tab1").disabled = true; 
    document.getElementById("tab2").disabled = true;
    //document.getElementById("tab3").disabled = true;
    document.getElementById("next").disabled = true;
    if (identifier>0) {
      document.getElementById("next").disabled = false;
    }
    else
      document.getElementById("next").disabled = true;
  }
  function back(){
    //document.getElementById("next").disabled = false;
    $("input:checkbox").prop("checked", false);
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
                  // swal("1 Item Added")
                  // timer: 2000,
                  swal("Added!");
                  
				  // var notification = new NotificationFx({
      //                               message : '<p>1 Item Added</p>',
      //                               layout : 'growl',
      //                               effect : 'scale',
      //                               type : 'success'
      //                             });
      //                           setInterval(notification.show(), 500);
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
        function plus1(id)
            {                
              var name;
              $.ajax({
                type:'post',
                url:'<?php echo base_url("FoodWaze/Plus1") ?>',
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
                        url: '<?php echo base_url()?>FoodWaze/Showcart',
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
                                        
                                        html += '<tr>'+
                                                '<td>'+data[i].Qty+'</td>'+
                                                '<td>'+data[i].Name+'</td>'+
                                                '<td>&#X20B1;'+data[i].Price+'</td>'+
                                                '<td>'+'<center><a href="#" class="fa fa-minus-circle" onclick="minus1('+data[i].Id+')"></a><a href="#" class="fa fa-plus-circle" onclick="plus1('+data[i].Id+')"></a></center>'+'</td>'+
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
                            html ='No item in cart';
                            $('#cartdata').html(html);
                            total=0;
                            document.getElementById("total").innerHTML = total;
                            document.getElementById("next").disabled = true;
                        }
                  });
                }
        </script>
        
        <script>    
            function menu(id) {
                  return $.ajax({
                        url: "<?php echo base_url("FoodWaze/GetMenu/") ?>" + id, 
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
                                $('#cat-' + data.CategoryId).append('<div class="col-lg-3 col-xs-3 items" style="padding: 10px; " align="center" id="'+data.MenuId+'">'+                            
                                '<img style="width: 120px; height: 120px; border-radius: 8px;" src="<?php echo base_url("pics/'+data.Image+'"); ?>" >'+
                                '<h4 style="margin-top: 12px;"><strong style="color:#b53b30; font-family: black jack;">'+data.Name+'</strong></h4><h5 style="color:grey;">&#X20B1;'+data.Price+'.00</h5>'+
                                '<i class="btn btn-primary" style="font-size: 12px; font-family: Roboto;" onclick="cart('+data.MenuId+')"> Add to Cart</i>'+ //+ sign
                                
                                '<input type="hidden" id="'+data.MenuId+'_name" value="'+data.Name+'"><input type="hidden" id="'+data.MenuId+'_price" value="'+data.Price+'"></div>'); 
                            });
                        }
                    }) 
                }

            $("input:checkbox").on('click', function() {              
              var $box = $(this);
              if ($box.is(":checked")) {
                document.getElementById("next").disabled = true;
                var group = 'input:checkbox[name="' + $box.attr("name") + '"]';
                $(group).prop("checked", false);
                $box.prop("checked", true);      
                id=$(this).attr('id');
                name=$(this).attr('name');
                console.log(name);                  
                $.ajax({
                    url: "<?php echo base_url("FoodWaze/GetCategory/") ?>" + id, 
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
                                element +='<li class="nav-item"><a class="nav-link active"" data-toggle="tab" href="#cat-'+data.CategoryId+'"><h3>'+'<p class="text-center text-muted">'+data.CategoryName+'</p>'+'</h3></a></li>';
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
                        document.getElementById("next").disabled = false;
                        document.getElementById("next").click();   
                        $.ajax({
                            url: "<?php echo base_url("FoodWaze/Clearsession") ?>",
                            success: function(response){
                                console.log(response);
                                
                                document.getElementById("next").disabled = true;
                            }
                        })
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