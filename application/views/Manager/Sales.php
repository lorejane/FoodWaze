<main class="main-container">


<!--NAME NUNG STALLS-->
<header class="header">
<div class="container bg-danger h-100px">
  <p class="text-white letter-spacing-5 fs-30">
    <br />
   <strong> <?php echo $stall->Name; ?></strong>
  </p>
</div>

   <div class="preloader">
       <svg class="spinner-circle-material-svg" viewBox="0 0 50 50">
            <circle class="circle" cx="25" cy="25" r="25"></circle>
      </svg>
    </div>
</header>
<!--end nung name ng stalls-->

      <div class="main-content">
        <div class="row">
         <div class="col-md-6 col-xl-6">
            <div class="card card-body bl-3 border-danger">
              <h6 class="text-uppercase text-gray">Total Sales</h6>
              <div class="flexbox mt-2">

                <span class="fa fa-rub text-danger fs-50"></span>
                <p class="fs-50 fw-100"><?php echo $totalprice ?></p>
              </div>
            </div>
          </div>

           <div class="col-md-6 col-xl-6">
            <div class="card card-body bl-3 border-danger">
              <h6 class="text-uppercase text-gray">Total Orders</h6>
              <div class="flexbox mt-2">

                <span class="fa fa-cart-plus text-danger fs-50"></span>
                <p class="fs-50 fw-100"><?php echo $totalorders ?></p>
              </div>
            </div>
          </div>


        <div class="col-md-12">
            <div class="card card-body bl-3 border-yellow">
             <div class="form-row">  
                <div class="form-group col-md-4 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <label><strong>From</strong></label>
                    <input class="form-control" type="text" id="range-issue-from" name="range-issue-from" placeholder="">
                </div>

                <div class="form-group col-md-4 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <label>To</label>
                    <input class="form-control" type="text" id="range-issue-to" name="range-issue-to" placeholder="">
                </div>

                <div class="col-md-2 col-sm-12 dash-filter" style="margin-bottom: 30px;">
                    <label>&nbsp;</label>
                    <button class="btn btn-block btn-info" id="filter" onclick="sales.filter()">Filter</button>
                </div>     

                <div class="col-md-2 col-sm-12 dash-filter" style="margin-bottom: 30px;">
                    <label>&nbsp;</label>
                   <button class="btn btn-label btn-info" id="filter" onclick="ExportExcel('Employee-table')"><label><i class="fa fa-download fa-1x w-10px"></i></label> Submit</button>
                </div>  
                
            </div>

                <div id="table-container">
                <div class="table-responsive" style="padding-top:20px; ">
                        <table class="table table-bordered display nowrap fs-20 text-dark" id = "Stall-table" style="width:100%; overflow-x:auto;" 
                        cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("manager/GenerateReceiptTbl") ?>">
                            
                            <thead>
                            <tr style="background-color: #0f0a0a;">
                            <th class="text-yellow">Employee</th>
                            <th class="text-yellow">Order ID</th>
                            <th class="text-yellow">Due Amount per Transaction</th>                  
                            <th class="text-yellow">Date of transaction</th>                        
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        </div>
    </div>


       <div class="col-md-12">
            <div class="card card-body bl-3 border-yellow">
                <div class="card-title">
                    <span class="fs-30">Total Sales per Cashier
                    </span>
     <div class="table-responsive" style="padding-top:20px; ">
                        <table class="table table-bordered display nowrap fs-20 text-dark" id = "Stall-table" style="width:100%; overflow-x:auto;" 
                        cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("manager/GenerateTotalByEmployee") ?>">
              <thead>
                <tr style="background-color: #0f0a0a;">
                  <th class="text-yellow">Employee ID</th>
                  <th class="text-yellow">Name</th>
                  <th class="text-yellow">Sales</th>
                </tr>
              </thead>
            </table>    

    </div>
    </div>
	</div>
          


	</div>
</div>

<script>
	var sales = {
		filter: function(){
			var url = "<?php echo base_url("Manager/GenerateReceiptTbl/") ?>";            
            if($('#range-issue-from').val() != '' && $('#range-issue-to').val() != ''){                
                url = "<?php echo base_url("Manager/GenerateReceiptTbl/") ?>" + $('#range-issue-from').val() + '/' + $('#range-issue-to').val();				
            }			
            $('#table-container').empty().html( 
                '<div id="table-container">' +              
                '<div class="table-responsive">' + 
                    '<table class="table table-responsive table-bordered display nowrap" id = "Employee-table" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "' + url + '">' + 
                        '<thead>' +
                            '<tr style="background-color: #0f0a0a;">' + 
                                "<th class='text-yellow'>Employee</th>" +
                                "<th class='tn ext-yellow'>Order ID</th>" +
                                "<th class='text-yellow'>Due Amount of transaction</th>" +
                                "<th class='text-yellow'>Date of transaction</th>" +
                            '</tr>' +
                        '</thead>' + 
                    '</table>' +              
                '</div>'
            );
		},
	}

    function ExportExcel(id){
        var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
        var textRange; var j=0;
        tab = document.getElementById(id); // id of table

        for(j = 0 ; j < tab.rows.length ; j++) 
        {     
            tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
            //tab_text=tab_text+"</tr>";
        }

        tab_text=tab_text+"</table>";
        // tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
        // tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
        // tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE "); 

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
        {
            txtArea1.document.open("txt/html","replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus(); 
            sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
        }  
        else                 //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

        return (sa);
    }
</script>
