<main class="main-container">
  <div class="main-content">

        <div class="col-md-12">

              <div class="card-body">

                <div class="swiper-container h-300px" data-provide="swiper" data-autoplay="2000">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <img src="../pics/slider1.png" alt="...">
                    </div>

                    <div class="swiper-slide">
                      <img src="../pics/slider2.png" alt="...">
                    </div>

                    <div class="swiper-slide">
                      <img src="../pics/slider3.png" alt="...">
                    </div>
                      <div class="swiper-slide">
                      <img src="../pics/slider5.png" alt="...">
                    </div>

                  </div>
                </div>

              </div>
            </div>
          </div>



      
        <div class="row">
          
 <div class="col-md-6 col-xl-4">
            <div class="card card-body bl-3 border-yellow">
              <h6 class="text-uppercase text-gray">Number of Manager</h6>
              <div class="flexbox mt-2">
                <span class="fa fa-users text-yellow fs-50"></span>
                <span class="fs-60"><?php echo $totalmanagers ?></span>
              </div>
            </div>
          </div>

           <div class="col-md-6 col-xl-4">
            <div class="card card-body bl-3 border-danger">
              <h6 class="text-uppercase text-gray">Number of Stalls</h6>
              <div class="flexbox mt-2">
                <span class="fa fa-home text-danger fs-50"></span>
                <span class="fs-60"><?php echo $totalstalls ?></span>
              </div>
            </div>
          </div>

           <div class="col-md-6 col-xl-4">
            <div class="card card-body bl-3 border-info" >
              <h6 class="text-uppercase text-gray">Number of Cashiers</h6>
              <div class="flexbox mt-2">
                <span class="fa fa-users text-info fs-50"></span>
                <span class="fs-60"><?php echo $totalcashiers ?></span>
              </div>
            </div>
          </div>




<div class="card col-md-12">
  
  <h4 class="card-title">
                <Strong>List of Categories</strong>
                <span class="float-right"><a class="btn btn-xs btn-primary text-white" href="<?php echo base_url('Admin/Categories'); ?>" >See More</a></span>
                <h4>
    <div class="card-body bg-lightest card-shadowed bl-3 border-yellow">
      <div class="table-responsive" style="padding-top:10px;">
            <table class="table table-bordered display nowrap" id = "Categories-table" style="width:100%; overflow-x:auto;" 
            cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("Admin/generateTableCategories") ?>">
              <thead>
                <tr style="background-color: #0f0a0a;">
                  <th class="text-yellow">Category ID</th>
                  <th class="text-yellow">Category Name</th>     
                </tr>
              </thead>
            </table>                  
      </div>
    </div>
  </div>



<div class="card col-md-12">  
  <h4 class="card-title">
                <Strong>List of Stalls</strong>
                <span class="float-right"><a class="btn btn-xs btn-primary text-white" href="<?php echo base_url('Admin/Stalls'); ?>" >See More</a></span>
                <h4>

    <div class="card-body bg-lightest card-shadowed bl-3 border-yellow">
      <div class="table-responsive" style="padding-top:20px; ">
            <table class="table table-bordered display nowrap fs-20 text-dark" id = "Stall-table" style="width:100%; overflow-x:auto;" 
            cellspacing="0" data-provide = "datatables" data-ajax = "<?php echo base_url("admin/GenerateStallDashboard") ?>">
              <thead>
                <tr style="background-color: #0f0a0a;">
                  <th class="text-yellow">Stall Number</th>
                  <th class="text-yellow">Name</th>
                </tr>
              </thead>
            </table>                  
      </div>
    </div>
    </div>
</div>
</div>

</main>




