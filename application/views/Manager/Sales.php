<main class="main-container">

      <div class="main-content">
        <div class="row">

          


            <div class="card">
            <div class="form-row">  
                <div class="form-group col-md-5 col-sm-12" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <label>From</label>
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
                <table class="table table-responsive table-bordered display nowrap" id = "Employee-table" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Manager/GenerateReceiptTbl") ?>">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Order ID</th>
                            <th>Earnings</th>                            
                            <th>Date of transaction</th>                        
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
                '<div class="table-responsive">' + 
                    '<table class="table table-responsive table-bordered display nowrap" id = "Employee-table" style="width:100%; overflow-x:auto;" cellspacing="0" data-provide = "datatables" data-ajax = "' + url + '">' + 
                        '<thead>' +
                            '<tr class="bg-info">' + 
                                "<th>Employee</th>" +
                                "<th>Order ID</th>" +
                                "<th>Earnings</th>" +
                                "<th>Date of transaction</th>" +
                            '</tr>' +
                        '</thead>' + 
                    '</table>' +              
                '</div>'
            );
		},
	}
</script>
