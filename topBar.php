<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<!--        TOP BAR-->

        <div id="mySidenav" class="sidenav">
              <a id="home-navigation-button" class="mobile-navigation-buttons" href="index.php" onclick="nav()">Home</a>
            <div class="lineBwNavigation"></div>
            <a id="product-button" class="mobile-navigation-buttons animation" href="jobs.php" onclick="nav()">Jobs</a>
            <div class="lineBwNavigation"></div>
            <a class="mobile-navigation-buttons animation about-button" href="jobseeker.php" onclick="nav()">Job Seeker</a>
            <div class="lineBwNavigation"></div>
            <a class="mobile-navigation-buttons animation contact-button" href="jobprovider.php" onclick="nav()">Job Provider</a>
            <div class="lineBwNavigation"></div>
            </div>
        
        <div class="bars" onclick="nav()">
            <span id="barRotateRight" class="bar1"></span>
            <span class="bar2"></span>
            <span id="barRotateLeft" class="bar3"></span>
        </div>
        
        <div id="top-bar">
        <h1 class="website-name">Ghar Ghar <span style="color:#ff6228;">Rozgar</span></h1>
            <?php include('checkLogin.php');
            checkLogin();?>
        <div class="navigation-anchor-wrapper">
            <a href="index.php" class="navigation-anchor">Home</a>
            <a href="jobs.php" class="navigation-anchor">Jobs</a>
            <a href="jobseeker.php" class="navigation-anchor">Job Seeker</a>
            <a href="jobprovider.php" class="navigation-anchor">Job Provider</a>
        </div>
        </div>
        
<!--        END OF TOP BAR-->

<!--MOADL FOR SELECTION-->

<div id="modalForSelection" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="signin-title" class="modal-title">Log in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-md-5">
          <button class="job-seeker-login-button" id="job-seeker-login">Login As Job Seeker</button>
              </div>
              <div class="col-md-2">
          <div class="vertical-line"></div>
              </div>
              <div class="col-md-5">
              <button class="job-seeker-login-button" id="job-provider-login-button">Login As Job Provider</button></div>
          </div>
      </div>
    </div>
  </div>
</div>

<div id="modalForSelectionRegister" class="modal" tabindex="-1" role="dialog">
  <div id="size" class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 id="signin-title" class="modal-title">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-md-5">
          <button class="job-seeker-login-button" id="job-seeker-register-button">Register As Job Seeker</button>
              </div>
              <div class="col-md-2">
          <div class="vertical-line"></div>
              </div>
              <div class="col-md-5">
              <button class="job-seeker-login-button" id="job-provider-register-button">Register As Job Provider</button></div>
          </div>
      </div>
    </div>
  </div>
</div>
        
<!--            MODAL FOR LOGIN-->
        
        <div id="modalForLogin" class="modal" tabindex="-1" role="dialog">
  
   <?php include('login-user.php');?>
 
</div>

  <div id="modalForLoginProvider" class="modal" tabindex="-1" role="dialog">
  
    <?php include('login-company.php');?>
  </div>

        
<!--        END OF MODAL FOR LOGIN-->
        
<script src="home.js"></script>       
        

