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
                      <img src="../pics/slider5 .png" alt="...">
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


          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><strong>Earnings</strong></h5>
                <a class="btn btn-xs btn-secondary" href="../widget/chart.html">More Charts</a>
              </div>

              <div class="card-body">
                <ul class="list-inline text-center gap-items-4 mb-30">
                  <li class="list-inline-item">
                    <span class="badge badge-lg badge-dot mr-1" style="background-color: #b1bccb"></span>
                    <span>Advertising</span>
                  </li>
                  <li class="list-inline-item">
                    <span class="badge badge-lg badge-dot mr-1" style="background-color: #01c4cc"></span>
                    <span>Hosting</span>
                  </li>
                </ul>

                <canvas id="chart-js-2" height="130" data-provide="chartjs"></canvas>
              </div>

            </div>
          </div>


</div>
</div>
</main>



