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
            <!-- <h1 class="card-title"><strong>FoodWaze</strong></h1> -->
            <a class="card-title" href="<?php echo base_url(); ?>">
                    <h1 class="title"><strong>FoodWaze</strong></h1>
            </a>
           
            <div class="col-8 col-lg-10">
                            <a href="<?php echo base_url();?>">HOME</a>
                            <a href="<?php echo base_url('view_packages');?>">ORDER</a>
                            <a href="<?php echo base_url('view_about');?>">ABOUT</a>





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
 <div class="col-lg-12">
            <div class="card">
              <h3 class="card-title"><strong>Ordering made EZ!</strong></h3>
              <!-- <a class="card-title" href="<?php echo base_url(); ?>">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Home</span>
                </a>

              <a class="card-title" href="<?php echo base_url(); ?>">
                    <span class="icon fa fa-order"></span>
                    <span class="order">order</span>
                </a>
              
                <a class="card-title" href="<?php echo base_url(); ?>">
                    <span class="icon fa fa-about"></span>
                    <span class="about">About</span>
                </a> -->




            <div class="main-content">  

              <div class="card-body">
                <div data-provide="wizard" data-navigateable="true">
                  <ul class="nav nav-process nav-process-circle">
                    <li class="nav-item">
                      <span class="nav-title">Step 1</span>
                      <a class="nav-link" data-toggle="tab" href="#wizard-navable-1"></a>
                    </li>

                    <li class="nav-item">
                      <span class="nav-title">Step 2</span>
                      <a class="nav-link" data-toggle="tab" href="#wizard-navable-2"></a>
                    </li>

                    <li class="nav-item">
                      <span class="nav-title">Step 3</span>
                      <a class="nav-link" data-toggle="tab" href="#wizard-navable-3"></a>
                    </li>

                  </ul>
<!--
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
-->

                  <div class="tab-content">
                    <div class="tab-pane fade active show" id="wizard-navable-1">
                      <p class="text-center fs-35 text-muted">Pick a  <strong class="text-primary">stall</strong>.</p>
                    <!-- step 1 -->
                      <div class="form-group">
                        <input type="number" class="form-control" placeholder="Stall Number" style="width:20%;" name="StallId" min="1" max="5">
                      </div>

                      <select>
  <option value="volvo">Stall 1</option>
  <option value="saab">2</option>
  <option value="opel">3</option>
  <option value="audi">4</option>
</select>

  
                          <div class="row">   
                            <div class="col-md-3 col-sm-6">
                                <h4 title="nav-title">Stall 1</h4>
                                <img src="images_foodwaze/stall/stall1.jpg" alt="" style="width:200px">
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <h4 title="nav-title">Stall 2</h4>
                                <img src="images_foodwaze/stall/stall2.jpg" alt="" style="width:200px">
                            </div>
                            
                            <div class="col-md-3 col-sm-6">
                                <h4 title="nav-title">Stall 3</h4>
                                <img src="images_foodwaze/stall/stall3.jpg" alt="" style="width:200px">
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <h4 title="nav-title">Stall 4</h4>
                                <img src="images_foodwaze/stall/stall4.jpg" alt="" style="width:200px">
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <h4 title="nav-title">Stall 5</h4>
                                <img src="images_foodwaze/stall/stall5.jpg" alt="" style="width:200px">
                            </div>
                            
                            <div class="col-md-3 col-sm-6">
                                <h4 title="nav-title">Stall 6</h4>
                                <img src="images_foodwaze/stall/stall6.jpg" alt="" style="width:200px">
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <h4 title="nav-title">Stall 7</h4>
                                <img src="images_foodwaze/stall/stall7.jpg" alt="" style="width:200px">
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <h4 title="nav-title">Stall 8</h4>
                                <img src="images_foodwaze/stall/stall8.jpg" alt="" style="width:200px">
                            </div>
                          </div>

                    </div> <!-- end step 1 -->

                  <!-- step 2 -->
                  <div class="tab-pane fade" id="wizard-navable-2">
                      <p class="text-center fs-35 text-muted"><strong class="text-primary">Order</strong> up!</p>
                      <p class="text-center text-gray">What's your order?</p>
                            Quantity (between 1 and 5):
                            <input type="number" name="quantity" min="1" max="5"><br>
                            <p>
    <label for="t1">Which menu would you choose?<abbr title="This field is mandatory">*</abbr></label>
    <input type="text" id="t1" name="fruit" list="l1" required
           pattern="[Bb]anana|[Cc]herry|[Aa]pple|[Ss]trawberry|[Ll]emon|[Oo]range">
    <datalist id="l1">
      <option>Banana</option>
      <option>Cherry</option>
      <option>Apple</option>
      <option>Strawberry</option>
      <option>Lemon</option>
      <option>Orange</option>
    </datalist>
  </p>




                            
                    </div>
                  <!-- end step 2 -->


                  <!-- step 3 -->
                  <div class="tab-pane fade" id="wizard-navable-3">
                            <p class="text-center fs-35 text-muted">Tell us about <strong class="text-primary">yourself</strong></p>
                            <hr class="w-100px">


                                  <div class="form-group row">
                                    <label class="col-4 col-lg-2 col-form-label require" for="input-1">Name</label>
                                    <div class="col-8 col-lg-10">
                                      <input type="text" class="form-control" name="NameCustomer" id="input-1" required>
                                      <div class="invalid-feedback"></div>
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label class="col-4 col-lg-2 col-form-label require" for="input-1">Contact No.</label>
                                    <div class="col-8 col-lg-10">
                                      <input type="number" class="form-control" name="ContactNo" id="input-1" required max="11">
                                      <div class="invalid-feedback"></div>
                                    </div>
                                  </div>
  
                </div>
                  <!--end step 3 -->

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
          </div>

</main>
<!-- END Main container -->