
<header class="topbar topbar-inverse">
    <div class="topbar-left">
   

    <a class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
        <i class="material-icons fullscreen-default">fullscreen</i>
        <i class="material-icons fullscreen-active">fullscreen_exit</i>
    </a>

    </div>

    <div class="topbar-right">
            <a class="dropdown-item" href="<?php echo base_url('home/Logout'); ?>"><i class="ti-power-off" style="font-size:20; color:red;"></i></a>        
    </div>

     <li class=" d-md-block">
        <span class="topbar-btn has-new" data-toggle="quickview" data-target="#qv-bookbag"><i class="ti-briefcase"></i></span>
        
        </li>

<!-- Notifications -->
<div id="qv-bookbag" class="quickview backdrop-dark" style="border-left: 1px solid #48b0f7;">
    <header class="quickview-header bg-info">
    <p class="quickview-title lead">Bookbag</p>
    <span class="close"><i class="ti-close" style="color:white"></i></span>
    </header>

    <div class="quickview-body">
    <div id="orders" class="media-list media-list-hover media-list-divided media-sm">
           
    </div>
    </div>

    <footer class="quickview-footer flexbox">
    <div>
        <a class="btn btn-outline btn-info" href="<?php echo base_url('Bookbag/'); ?>">View Detailed Bookbag</a>
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
	           						j = JSON.parse(j);
	           						console.log(j);
	           						$.each(j, function(index, data){
	           							$.ajax({
	           								url: "<?php echo base_url('Cashier/GetMenu/'); ?>" +data.MenuId,
	           								success: function(k){
	           									k = JSON.parse(k);
	           									console.log(k);
                                                var element = '';
                                                total = 0;
                                                $.each(i, function(index, data){
                                                        element +='<p>' +data.name+' ' +data.qty+ ' ' +data.price+ ' = '+(data.qty * data.price)+'</p>';
                                                        total = Number(total) + Number(data.qty * data.price);
                                                })
                                                element += '<h1>' + total + '</h1>';
                                                $("#mycart").html(element);                                            

	           								}				        
	           							})
	           						})
	           					}
	           				})             	
                        });
                    }   
                }
            });
                
        }

    }


</script>