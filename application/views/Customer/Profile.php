<br/><br/><br/><br/>
<main clas="main-container">

<header class="header">
<div style="background-color: #fd2951" class="container">
  <div class="header-info">
  <div class="left">
    <br>
    <h2 class="header-title fs-60 text-white"><strong>Personal Profile</strong></h2>
  </div>
  </div>
</header>
<div class="row">

<div class="col-sm-3 bg-pale-danger b-2 border-danger">
  <div class="sidebar-profile">
            <a href="<?php echo base_url('Customer/Profile'); ?>"><img src="../pics/profile.jpg" alt="..."></a>
</div>
</div>
<div class="col-sm-9">
              <form class="card" class="form-type-material" role="form" action="<?php echo base_url('Home/UpdateProfile')?>" method="post">
              <h4 class="card-title"><strong>Edit Profile</strong></h4>

              <div class="card-body row">

                            <div class="col-6">
                                <label>Account</label>
                                <input id="EmployeeAccount" name="EmployeeAccount" type="text" class="form-control" placeholder="Account" value="<?php echo $profile->EmployeeAccount ?>" />
                            </div>
                      
                            <div class="col-6">
                                <label>Password</label>
                                <input id="Password" name="Password" type="password" class="form-control" placeholder="Password" value="<?php echo $profile->Password ?>" />
                            </div>
                       
                            <div class="col-6">
                                <label>First Name</label>
                                <input id="Firstname" name="Firstname" type="text" class="form-control" placeholder="First Name" value="<?php echo $profile->Firstname ?>"/>
                            </div>
                                                                       
              
                            <div class="col-6">
                                <label>Last Name</label>
                                <input id="Lastname" name="Lastname" type="text" class="form-control" placeholder="Last Name" value="<?php echo $profile->Lastname ?>"/>
                            </div>
                        
                    <!-- selectpicker -->
                    
                            <!-- <div class="col-12">
                                <label>Stall</label>
                                <select id="StallId" name="StallId" data-provide="selectpicker" title="Choose Stall" data-live-search="true" class="form-control show-tick"></select>
                            </div>   -->                                     
                    
                </div>
              <footer class="card-footer text-right">
                <button class="btn btn-secondary" type="reset">Cancel</button>
                <button class="btn btn-primary" type="submit">Submit</button>
              </footer>
           </form>
          </div>
</div>
</main>
