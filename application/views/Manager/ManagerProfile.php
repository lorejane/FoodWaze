<main clas="main-container  bg-lightest">

<header class="header">
<div class="container bg-danger h-100px">
  <p class="text-white letter-spacing-5 fs-30">
    <br />
   <strong> <?php echo $stall->Name; ?></strong>
  </p>
</div>

   <div class="preloader">
       <svg class="spinner-circle-material-svg" viewBox="0 0 50 50">
            <circle class="circle" cx="25" cy="25" r="25"></circle>
      </svg>
    </div>
</header>

<header class="header bg-lightest bb-3 border-yellow ">

  <div class="header-info">
  <div class="left">
    <br>
    <h2 class="header-title fs-60 text-yellow"><strong>Personal Profile</strong></h2>
  </div>
  </div>
</header>


<div class="col-md-8 bg-lightest">
              <form class="card">
              <div class="card-body row">

                
                
                  
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="fs-18">Username</label>
                    <input id="EmployeeAccount" name="EmployeeAccount" type="text" class="form-control fs-25 text-yellow" placeholder="Account" value="<?php echo $profile->EmployeeAccount ?>" />
                  </div>

                  <div class="form-group">
                    <label class="fs-18">First name</label>
                    <input id="Firstname" name="Lastname" type="text" class="form-control fs-25 text-yellow" placeholder="First Name" value="<?php echo $profile->Firstname ?>"/>
                  </div>

                
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="fs-18">Last name</label>
                   <input id="Lastname" name="Lastname" type="text" class="form-control fs-25 text-yellow" placeholder="Last Name" value="<?php echo $profile->Lastname ?>"/>
                  </div>

                  <div class="form-group">
                    <label class="fs-18">Password</label>
                    <input id="Password" name="Password" type="password" class="form-control fs-25 text-yellow" placeholder="Password" value="<?php echo $profile->Password ?>" />
                  </div>
                </div>
              </div>

      
            </form>
          </div>
             

<div class="col-md-4 b-2 border-yellow bg-lightest">
  <div class="sidebar-profile">
            <a href="<?php echo base_url('Admin/Profile'); ?>"><img class="avatar" src="../assets/img/avatar/1.jpg" alt="..."></a>
          <div class="profile-info text-yellow fs-25">
            <p>Administrator</p>
          </div>
</div>
</div>



</main>
