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
            <!-- <h1 class="card-title"><strong>FoodWaze</strong></h1> -->
            <a class="card-title" href="<?php echo base_url(); ?>">
            <h1 class="title"><strong>FoodWaze</strong></h1>
            </a>
           
            <a class="card-title" href="<?php echo base_url("foodwaze/addtocart") ?>">
            <button></button>
            </a>

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
            <hr>
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
                                        

                                            <!--<div class="col-md-3 col-sm-6 stall" id="<?php echo $s->StallId; ?>">
                                                <h4 title="nav-title"><?php echo $s->Name; ?></h4>
                                                <img src="images_foodwaze/stall/stall1.jpg" alt="" style="width:200px">
                                            </div>-->
                                        <?php endforeach; ?>
                                    </div>

                            </div> <!-- end step 1 -->

                        
                            <!-- step 2 -->
                            <div class="tab-pane fade" id="wizard-navable-2">
                            <p class="text-center fs-35 text-muted"><strong class="text-primary">Order</strong> up!</p>
                                <p class="text-center text-gray">What's your order?</p>
                                <div class="card">
                                    <div class="card-body" id="menu-container">

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
              mid=document.getElementById(id);
              $.ajax({
                type:'post',
                url:'<?php echo base_url("foodwaze/addtocart") ?>',
                data:{
                  item_id:id
                },
                success:function(response) {
                  $('.cap_status').html("Added to Cart").fadeIn('slow').delay(2000).fadeOut('slow');
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
                                element +='<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cat-'+data.CategoryId+'"><h3>'+data.CategoryName+'</h3></a></li>';
                            }else{
                                element +='<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cat-'+data.CategoryId+'"><h3>'+data.CategoryName+'</h3></a></li>';
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
