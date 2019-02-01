
<header class="topbar topbar-inverse">
    <div class="topbar-left">
        <a onclick="toggleFullScreen()" class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
            <i class="material-icons fullscreen-default">fullscreen</i>
        </a>
        <a href="<?php echo base_url('Cashier/Order'); ?>">FoodWaze</a>

    </div>

    <div class="topbar-right">        
        <div class="dropdown">
          <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span><i class="ti-user"></i></span> </a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('Cashier/Profile'); ?>">Profile</a></li>
            <!-- <li><a href="#">CSS</a></li> -->
            <li><a href="<?php echo base_url('home/Logout'); ?>">Logout<!-- <i class="ti-power-off" style="font-size:20; color:red;"></i> --></a></li>
          </ul>
        </div>
        <li class=" d-md-block">
            <span class="topbar-btn has-new" data-toggle="quickview" data-target="#qv-pending"><i class="ti-briefcase"></i></span>        
        </li>
    </div>

<!-- Notifications -->
<div id="qv-pending" class="quickview backdrop-dark" style="border-left: 1px solid #48b0f7;">
    <header class="quickview-header bg-info">
    <p class="quickview-title lead">Pending Orders</p>
    <span class="close"><i class="ti-close" style="color:white"></i></span>
    </header>

    <div class="quickview-body">
    <div id="orders" class="media-list media-list-hover media-list-divided media-sm">
           
    </div>
    </div>

    <footer class="quickview-footer flexbox">
    <div>
        <!-- <a class="btn btn-outline btn-info" href="<?php echo base_url('Bookbag/'); ?>">View Detailed Bookbag</a> -->
    </div>
    <div>
        <button class="btn btn-outline btn-danger" onclick="Bookbag.removeAll()" data-provide="tooltip" title="Remove all"><i class="fa fa-2x fa-trash"></i></>        
    </div>
    </footer>
</div>

</header>

<script>
    $(document).ready(function(){
        Message.refresh();
        window.setInterval(function(){
        	Message.refresh();
        	console.log("hello");
        }, 2500)
    });

    var Message = {
        
        refresh: function(){
            $.ajax({
                url: "<?php echo base_url('Cashier/GetOrders'); ?>",
                success: function(i){
                    $('#orders').empty();
                    if(i != '{}'){
                        i = JSON.parse(i);
                        $.each(i, function(index, data){                            
                            $('#orders').append(
                                // '<a class="orderx media media-new" data-value="'+data.OrderId+'" href="#">'
                                '<a class="media media-new" href="#">'
                                    + '<div class="media-body">'
                                        + '<p>' + data.OrderId + '</p>'                                        
                                        + '<p>' + data.Name + '</p>'                                        
                                        + '<p>' + data.DateTime + '</p>'
                                        + '<p><i class="orderx btn-info btn-xs fa fa-edit right"  data-value="'+data.OrderId+'"></i> <i class="btn btn-warning btn-xs fa fa-print right" onclick="minus1('+data.Id+')" id="'+data.OrderId+'"></i> <i class="btn btn-danger btn-xs fa fa-trash right" onclick="deletepending('+data.OrderId+',this)" id="'+data.OrderId+'"></i></p>'                                        
                                    + '</div>'                                        
                                + '</a>'
                            );
                        });
                        $('.orderx').click(function(){
                            // $.ajax({
                            //     url: "<?php echo base_url('Cashier/RemoveAll'); ?>",
                            //     success: function(i){
                                    
                            //     }
                            // });
                            var element ='<table class="table-responsive table-hover"  style="height:50%;"> <thead> <tr>  <th>Qty</th>  <th>Name</th> <th>Price</th> <th>Total</th> <th></th> <th>Action</th> <th></th> </tr> </thead> <tbody></tbody></table>';
                            $("#mycart").html(element);
	           				$.ajax({
	           					url: "<?php echo base_url('Cashier/GetOrderDetails'); ?>",
	           					data: {orderid:$(this).data("value")},
	           					type: "POST",
	           					success: function(j){
                                    j = JSON.parse(j);
                                    console.table(j);
                                    $.each(j, function(index, data){
                                        var total= 0;
                                        $.ajax({
                                            url: "<?php echo base_url('Cashier/GetMenu/'); ?>" +data.MenuId,
                                            success: function(k){
                                                k = JSON.parse(k);
                                                console.table(k);
                                                $.ajax({
                                                    url: "<?php echo base_url('Cashier/AddToCart'); ?>",
                                                    type: "POST",
                                                    data: {
                                                        Order: {
                                                            Image: k[0].Image,
                                                            id: k[0].MenuId,
                                                            name: k[0].Name,
                                                            qty: data.Quantity, 
                                                            price: k[0].Price
                                                        }
                                                    },
                                                    success: function(j){
                                                        console.log(j);
                                                        console.log("hHEHEEH");
                                                    }
                                                })
                                                var elementx =' <tr>  <td><input class="input-quantity" id="input-quantity-'+data.id+'" value='+data.Quantity+'  readonly></td> <td>'+k[0].Name+'</td> <td>'+k[0].Price+'</td> <td>'+(data.Quantity * k[0].Price)+'</td> <td><div id="cart-price-'+data.id+'">'+(data.Quantity * k[0].Price)+'</div></td>  <td><div class="btn-increment-decrement" onClick="decrement_quantity('+data.id+', '+k[0].Price+')">-</div><input class="input-quantity" id="input-quantity-'+data.id+'" value='+data.Quantity+'  readonly><div class="btn-increment-decrement" onClick="increment_quantity('+data.id+', '+k[0].Price+')">+</div></td> <td> <i class="btn btn-danger btn-xs fa fa-trash right" onclick="deletecart()"id=""></i><td></tr> ';
                                                total = Number(total) + Number(data.Quantity * k[0].Price);        
                                                $("#mycart table tbody").append(elementx);
                                            }                       
                                        });
                                    });    
                                }
	           				})             	
                        });
                    }   
                }
            });
                
        }

    }

    function deletepending(id,dis){   
            swal({
                title: 'Confirm Submission',
                text: 'Save changes for Pending Order',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No! Cancel',
                cancelButtonClass: 'btn btn-default',
                confirmButtonText: 'Yes! Go for it',
                confirmButtonClass: 'btn btn-info'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url:"<?php echo base_url('Cashier/DeletePendingOrders/'); ?>" +id,
                            success: function(i){
                                swal('Deleted!', 'success');
                                //$('#Menu-table').DataTable().ajax.reload();
                                console.log(i);
                                var mwen = $(dis).fadeOut(500, function() { $(dis).closest("a").remove(); });
                            }, 
                            error: function(i){
                                swal('Oops!', "Something went wrong", 'error');
                            }
                    })                                     
                }
            })

        }

    function deleteaAll(){
        $.ajax({
            url: "<?php echo base_url('Cashier/RemoveAll'); ?>",
            success: function(i){

            }
        });
    }

</script>