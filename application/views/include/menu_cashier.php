
<header style="background-color: #d02020" class="topbar">
    <div class="topbar-left">
        <a onclick="toggleFullScreen()" class="topbar-btn d-md-block">
          <button class="btn btn-square btn-outline btn-yellow "> <i class="ti-fullscreen"></i></button>
        </a>
        <a><img src="../pics/foodwazelogoo.png" alt="logo icon"></a>
        <span class="sidebar-toggle-fold"></span>

         
         

    </div>

    <div class="topbar-right">        
       <div class="dropdown">
                <span class="topbar-btn" data-toggle="dropdown"><img class="avatar avatar-sm" src="../pics/logo.png" alt="..."></span>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="<?php echo base_url('manager/Profile'); ?>"><i class="ti-user"></i> Profile</a>
                  <a class="dropdown-item" href="<?php echo base_url('Home/Logout'); ?>"><i class="ti-power-off"></i> Logout</a>
                </div>
              </div>
        <li class=" d-md-block">
            <button class="btn btn-square btn-outline btn-info" data-toggle="quickview" data-target="#qv-pending"><i class="fa fa-cart-arrow-down fa-2x"></i></button>        
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
        <button class="btn btn-outline btn-danger" onclick="deleteAllpending()" data-provide="tooltip" title="Remove all"><i class="fa fa-2x fa-trash"></i></>        
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
                                        + '<p><i class="orderx btn-info btn-xs fa fa-edit right"  data-value="'+data.OrderId+'" onclick="removepending('+data.OrderId+',this)" id="'+data.OrderId+'"></i>&nbsp;<i class="btn btn-danger btn-xs fa fa-trash right" onclick="deletepending('+data.OrderId+',this)" id="'+data.OrderId+'"></i></p>'                                        
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
                            deleteAll();

                            var element ='<table class="table-responsive table-hover"><tbody></tbody></table>';
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
                                                var elementx =' <tr>  <td width="10%"><input class="input-quantity" id="input-quantity-'+data.id+'" value='+data.Quantity+'  readonly></td> <td width="35%">'+k[0].Name+'</td> <td width="15%">'+k[0].Price+'</td> <td width="15%">'+(data.Quantity * k[0].Price)+'</td> <td width="15%"><div id="cart-price-'+data.id+'">'+(data.Quantity * k[0].Price)+'</div></td>  <td width="10%"><div class="btn-increment-decrement" onClick="decrement_quantity('+data.id+', '+k[0].Price+')">-</div><div class="btn-increment-decrement" onClick="increment_quantity('+data.id+', '+k[0].Price+')">+</div></td> <td width="10%"> <i class="btn btn-danger btn-xs fa fa-trash right" onclick="DeleteCart(\''+data.rowid+'\')" id="'+data.id+'"></i><td></tr> ';
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


function DeleteCart(id){
  console.log(id);
  $.ajax({
      url: "<?php echo base_url('Cashier/Remove/');?>" + id,
      success: function(i){
        refresh();
    }
  });
}   

    function removepending(id,dis){   
                $.ajax({
                    url:"<?php echo base_url('Cashier/DeletePendingOrders/'); ?>" +id,
                        success: function(i){
                            console.log(i);
                            var mwen = $(dis).fadeOut(500, function() { $(dis).closest("a").remove(); });
                        }, 
                        error: function(i){
                            swal('Oops!', "Something went wrong", 'error');
                        }
                })                                     
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

    function deleteAllpending(){   
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
                        url:"<?php echo base_url('Cashier/DeleteAllPendingOrders/'); ?>" ,
                            success: function(i){
                                swal('Deleted!', 'success');
                                //$('#Menu-table').DataTable().ajax.reload();
                                console.log(i);
                              //  var mwen = $(dis).fadeOut(500, function() { $(dis).closest("a").remove(); });
                            } 
                            // error: function(i){
                            //     swal('Oops!', "Something went wrong", 'error');
                            // }
                    })                                     
                }
            })

        }

    function deleteAll(){
        $.ajax({
            url: "<?php echo base_url('Cashier/RemoveAll'); ?>",
            success: function(i){

            }
        });
    }

</script>