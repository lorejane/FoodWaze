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


<div class="col-md-8">
              <form class="card">
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
                                <input id="Firstname" name="Lastname" type="text" class="form-control" placeholder="First Name" value="<?php echo $profile->Firstname ?>"/>
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

<div class="col-md-3 bg-pale-danger b-2 border-danger">
  <div class="sidebar-profile">
            <a href="<?php echo base_url('Admin/Profile'); ?>"><img class="avatar" src="../assets/img/avatar/1.jpg" alt="..."></a>
          <div class="profile-info">
            <h4>Maryam Amiri</h4>
            <p>Web developer</p>
          </div>
</div>
</main>
