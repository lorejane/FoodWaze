<main class="main-container bg-pale-purple">

<!--NAME NUNG STALLS-->
<header class="header">
<div class="container bg-img h-250px" style="" >
  <div class="header-info">
    <?php echo $stall->Name; ?>
  </div>
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
            <div class="card card-body bl-3 border-yellow">
              <h6 class="text-uppercase text-gray">Total Sales</h6>
              <div class="flexbox mt-2">

                <span class="fa fa-rub text-yellow fs-50"></span>
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

         
         <div class="col-lg-6">
            <div class="card b-3 border-yellow">
              <h4 class="card-title"><strong>Most Sale Item</strong></h4>

              <div class="card-body">
                <div class="table-responsive" style="ing-right:10 px">
                <table class="table table-lg table-bordered" id = "Employee-table" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Manager/GenerateMostSaleable") ?>">
              <thead>
                <tr>
                  <th>Menu</th>
                  <th>Quantity</th>
                </tr>
              </thead>
            </table> 
                </DIV>
              </div>
            </div>
          </div>
 
          <div class="col-lg-6">
            <div class="card b-3 border-danger">
              <h4 class="card-title"><strong>Less Sale Item</strong></h4>

              <div class="card-body ">
                <div class="table-responsive" style="padding-top:10px;">
                <table class="table table-lg table-bordered" cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Manager/GenerateLeastSaleable") ?>">
              <thead>
                <tr>
                  <th>Menu</th>
                  <th>Quantity</th>
                </tr>
              </thead>
            </table> 
                </div>
              </div>
            </div>
          </div>




 
<!--HELLO 
          

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
          
-->

</div>
</div>


