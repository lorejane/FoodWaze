
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
        // window.setInterval(function(){
        // 	Message.refresh();
        // 	console.log("hello");
        // }, 2500)
    });

    var Message = {
        
        refresh: function(){
            $.ajax({
                url: "<?php echo base_url('Cashier/GetOrders'); ?>",
                success: function(i){
                    $('#orders').empty();
                    if(i != '{}'){
                        i = JSON.parse(i);
                        console.log(i);
                        $.each(i, function(index, data){                            
                            $('#orders').append(
                                '<a class="orderx media media-new" data-value="'+data.OrderId+'" href="#">'
                                    + '<div class="media-body">'
                                        + '<p>' + data.OrderId + '</p>'                                        
                                        + '<p>' + data.Name + '</p>'                                        
                                        + '<p>' + data.DateTime + '</p>'                                        
                                    + '</div>'                                        
                                + '</a>'
                            );
                        });
                        $('.orderx').click(function(){
	           				$.ajax({
	           					url: "<?php echo base_url('Cashier/GetOrderDetails'); ?>",
	           					data: {orderid:$(this).data("value")},
	           					type: "POST",
	           					success: function(j){
                                    total = 0;
                                    var element = '';
                                    $("#mycart").html('<table class= "table"> <thead> <tr> <th>Name</th> <th>Qty</th> <th>Price</th> <th>Total</th> <th></th> </tr> </thead>');
                                    $("#mycart").append('<tbody>');
                                    j = JSON.parse(j);
                                    console.log(j);
                                    $.each(j, function(index, data){
                                        $.ajax({
                                            url: "<?php echo base_url('Cashier/GetMenu/'); ?>" +data.MenuId,
                                            success: function(k){
                                                k = JSON.parse(k);
                                                console.log(k);
                                                console.log('x ' + data.Quantity + " " + k[0].Name);
                                                var xelement = '<tr>'
                                                +'<td>'+k[0].Name+'</td>'
                                                +'<td>'+data.Quantity+'</td>'
                                                +'<td>'+k[0].Price+'</td>'
                                                +'<td>'+(data.Quantity * k[0].Price)+'</td>'
                                                +'<td><i class="btn btn-warning btn-xs fa fa-close right" onclick="minus1('+data.Id+')" id="'+data.Id+'"></i></td> <td> <i class="btn btn-danger btn-xs fa fa-trash right" onclick="deletecart('+data.Id+')"id="'+data.Id+'"></i><td> </tr>';
                                                +'</tr>';
                                                total = Number(total) + Number(data.Quantity * k.Price);
                                                // console.log(element);
                                            $("#mycart").append(xelement);
                                            }                       
                                        })
                                    })

                                    $("#mycart").append('</tbody></table><p> Total: '+total+' </p>');                                        
	           					}
	           				})             	
                        });
                    }   
                }
            });
                
        }

    }


</script>