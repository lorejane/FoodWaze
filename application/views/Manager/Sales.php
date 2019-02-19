<main class="main-container">

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
                <div class="form-group col-md-5 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <label><strong>From</strong></label>
                    <input class="form-control" type="text" id="range-issue-from" name="range-issue-from" placeholder="">
                </div>

                <div class="form-group col-md-5 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <label>To</label>
                    <input class="form-control" type="text" id="range-issue-to" name="range-issue-to" placeholder="">
                </div>

                <div class="col-md-2 col-sm-12 dash-filter" style="margin-bottom: 30px;">
                    <label>&nbsp;</label>
                    <button class="btn btn-block btn-info" id="filter" onclick="sales.filter()">Filter</button>
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
                                "<th class='text-yellow'>Order ID</th>" +
                                "<th class='text-yellow'>Due Amount of transaction</th>" +
                                "<th class='text-yellow'>Date of transaction</th>" +
                            '</tr>' +
                        '</thead>' + 
                    '</table>' +              
                '</div>'
            );
		},
	}
</script>
