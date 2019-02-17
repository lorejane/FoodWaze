<main class="main-container">

      <div class="main-content">
        <div class="row">

 <div class="col-md-6 col-xl-4">
            <div class="card card-body">
              <h6>
                <span class="text-uppercase">Monthly Sells</span>
                <span class="float-right"><a class="btn btn-xs btn-primary" href="#">View</a></span>
              </h6>
              <br>
              <p class="fs-28 fw-100"><?php echo $totalstalls ?></p>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 65%; height: 4px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="text-gray fs-12"><i class="ti-stats-up text-success mr-1"></i> 324 more than last year</div>  
            </div>
          </div>

          <div class="col-md-6 col-xl-4">
            <div class="card card-body">
              <h6>
                <span class="text-uppercase">Weekly Sales</span>
                <span class="float-right"><a class="btn btn-xs btn-primary" href="#">View</a></span>
              </h6>
              <br>
              <p class="fs-28 fw-100"><?php echo $totalmanagers ?></p>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 65%; height: 4px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="text-gray fs-12"><i class="ti-arrow-down text-danger mr-1"></i> %32 down</div>
            </div>
          </div>

          <div class="col-md-6 col-xl-4">
            <div class="card card-body">
              <h6>
                <span class="text-uppercase">Daily Sales</span>
                <span class="float-right"><a class="btn btn-xs btn-primary" href="#">View</a></span>
              </h6>
              <br>
              <p class="fs-28 fw-100"><?php echo $totalcashiers ?></p>
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 4px;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="flexbox text-gray fs-12">
                <span><i class="ti-arrow-up text-success mr-1"></i> %25 up</span>
                <span>+1000</span>
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



