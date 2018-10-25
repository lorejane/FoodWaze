<!-- Preloader -->
<div class="preloader">
      <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
      </div>
</div>       

            <!-- Topbar -->
            <header class="topbar">
            <h1 class="card-title"><strong>FoodWaze</strong></h1>
              
                    <!-- <div class="topbar-divider d-none d-md-block"></div> -->
<!--                     
                    <div class="lookup d-none d-md-block topbar-search" id="theadmin-search">
                      <input class="form-control w-300px" type="text">
                      <div class="lookup-placeholder">
                        <i class="ti-search"></i>
                        <span><strong>Search</strong> button, slider, modal, etc.</span>
                      </div>
                    </div> -->
                    <!-- </div> -->


                    <a class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
                      <i class="material-icons fullscreen-default">fullscreen</i>
                      <i class="material-icons fullscreen-active">fullscreen_exit</i> 
                    </a>
            </header>
                <!-- END Topbar -->

        
<main class="main-container">



<hr>
 <div class="col-lg-6">
            <div class="card">
              <h1 class="card-title"><strong>Ordering made EZ!</strong></h1>

              <div class="card-body">
                <div data-provide="wizard"> 
                  <ul class="nav nav-process nav-process-circle">
                    <li class="nav-item">
                      <span class="nav-title">Step 1</span>
                      <a class="nav-link" data-toggle="tab" href="#wizard-basic-1"></a>
                    </li>

                    <li class="nav-item">
                      <span class="nav-title">Step 2</span>
                      <a class="nav-link" data-toggle="tab" href="#wizard-basic-2"></a>
                    </li>

                    <li class="nav-item">
                      <span class="nav-title">Step 3</span>
                      <a class="nav-link" data-toggle="tab" href="#wizard-basic-3"></a>
                    </li>

                   
                  </ul>


                  <div class="tab-content">
                    <div class="tab-pane fade active show" id="wizard-basic-1">
                      <p class="text-center fs-35 text-muted">Pick a stall.</p>
                    <!-- insert stall no -->
                      <div class="form-group">
                        <input type="number" class="form-control" placeholder="Stall Number" style="width:20%;" name="StallId">
                      </div>

                    </div> <!-- end insert stall no -->


                   






                    <div class="tab-pane fade" id="wizard-basic-2">
                      <p class="text-center fs-35 text-muted">Order up!</p>
                      <p class="text-center text-gray">What's your order?</p>
                    </div>

                    <div class="tab-pane fade" id="wizard-basic-3">
                            
                            <p class="text-center fs-35 text-muted">Tell us about <strong class="text-primary">yourself</strong></p>
                            <hr class="w-100px">


                            <div class="form-group row">
                              <label class="col-4 col-lg-2 col-form-label require" for="input-1">Name</label>
                              <div class="col-8 col-lg-10">
                                <input type="text" class="form-control" id="input-1" required>
                                <div class="invalid-feedback"></div>
                              </div>
                            </div>

                          <!-- insert info -->
                            <div class="form-group row">
                              <label class="col-4 col-lg-2 col-form-label require" for="input-1">Contact no.</label>
                              <div class="col-8 col-lg-10">
                                <input type="text" class="form-control" id="input-1" required>
                                <div class="invalid-feedback"></div>
                              </div>
                            </div>
                          <!-- end insert info -->



                              <!-- <div class="form-group">
                                <label>Email address</label>
                                <input class="form-control" type="email" required>
                                <div class="form-control-feedback"></div>
                              </div>

                                <div class="form-group">
                                <label>Contact no.</label>
                                <input class="form-control" type="text" required>
                                <div class="form-control-feedback"></div>
                              </div> -->

                      </div>
                  

                  <hr>

                 <div class="flexbox">
                    <button class="btn btn-secondary" data-wizard="prev" type="button">Back</button>
                    <button class="btn btn-secondary" data-wizard="next" type="button">Next</button>
                    <button class="btn btn-primary d-none" data-wizard="finish" type="submit">Submit</button>
                  </div>

                  


                </div>
              </div>
            </div>
          </div>

</main>
<!-- END Main container -->