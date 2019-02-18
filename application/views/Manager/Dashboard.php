<main class="main-container">

      <div class="main-content">
        <div class="row">



           <div class="col-md-6 col-xl-4">
            <div class="card card-body bl-3 border-yellow">
              <h6 class="text-uppercase text-gray">Monthly Sales</h6>
              <div class="flexbox mt-2">

                <span class="fa fa-rub text-warning fs-30"></span>
                <p class="fs-50 fw-100"><?php echo $totalorders ?></p>
              </div>
            </div>
          </div>

           <div class="col-md-6 col-xl-4">
            <div class="card card-body bl-3 border-info">
              <h6 class="text-uppercase text-gray">Weekly Sales</h6>
              <div class="flexbox mt-2">

                <span class="fa fa-rub text-info fs-30"></span>
                <p class="fs-50 fw-100"><?php echo $totalprice ?></p>
              </div>
            </div>
          </div>

           <div class="col-md-6 col-xl-4">
            <div class="card card-body bl-3 border-danger">
              <h6 class="text-uppercase text-gray">Daily Sales</h6>
              <div class="flexbox mt-2">

                <span class="fa fa-rub text-danger fs-30"></span>
                <p class="fs-50 fw-100"><?php echo $totalorders ?></p>
              </div>
            </div>
          </div>

          

            <div class="row gap-x gap-items-5">
            <div class="card col-sl-6">
            <table class="table table-responsive table-sm table-bordered display nowrap" id = "Employee-table" style="width:100%; overflow-x:auto;" 
            cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Manager/GenerateMostSaleable") ?>">
              <thead>
                <tr>
                  <th>Menu</th>
                  <th>Quantity</th>
                </tr>
              </thead>
            </table> 
          </div>

           <div class="card col-msl-6">
          <table class="table  table-responsive table-sm  table-bordered display nowrap" id = "Employee-table" style="width:100%; overflow-x:auto;" 
            cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Manager/GenerateLeastSaleable") ?>">
              <thead>
                <tr>
                  <th>Menu</th>
                  <th>Quantity</th>
                </tr>
              </thead>
            </table>   
          </div>
        </div>

          <table class="table table-responsive table-bordered display nowrap" id = "Employee-table" style="width:100%; overflow-x:auto;" 
            cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Manager/GenerateTotalByEmployee") ?>">
              <thead>
                <tr>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Sales</th>
                </tr>
              </thead>
            </table>     

      </div>

            </div>
          


</div>
</div>


