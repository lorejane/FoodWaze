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
            <div class="card card-body">
              <h6>
                <span class="text-uppercase">Number of Manager</span>
                <span class="float-right"><a class="btn btn-xs btn-primary" >View</a></span>
              </h6>
              <br>
              <p class="fs-28 fw-100"><?php echo $totalmanagers?></p>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 65%; height: 4px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="text-gray fs-12">
            </div>
          </div>
          </div>

          <div class="col-md-6 col-xl-4">
            <div class="card card-body">
              <h6>
                <span class="text-uppercase">No.of Stalls</span>
                <span class="float-right"><a class="btn btn-xs btn-primary" href="<?php echo base_url('Admin/Stalls'); ?>" >View</a></span>
              </h6>
              <br>
              <p class="fs-28 fw-100"><?php echo $totalstalls ?></p>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 65%; height: 4px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="text-gray fs-12"></div>
            </div>
          </div>

          <div class="col-md-6 col-xl-4">
            <div class="card card-body">
              <h6>
                <span class="text-uppercase">Number of Cashier</span>
                <span class="float-right"><a class="btn btn-xs btn-primary" href="#">View</a></span>
              </h6>
              <br>
              <p class="fs-28 fw-100"><?php echo $totalcashiers ?></p>
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 4px;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="flexbox text-gray fs-12">
              </div>
            </div>
          </div>




<div class="card col-md-6">
  
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



<div class="card col-md-6">  
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

</main>




