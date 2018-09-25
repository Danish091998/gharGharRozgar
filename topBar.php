<!--        TOP BAR-->
        
        <div id="top-bar">
        <p class="website-name">Ghar Ghar Rozgar</p>
            <?php include('checkLogin.php');
            checkLogin();?>
        <div class="navigation-anchor-wrapper">
            <a class="navigation-anchor">Home</a>
            <a class="navigation-anchor">Job Providers</a>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="signin-title" class="modal-title">Sign Up</h5>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="signin-title" class="modal-title">Log in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <?php include('login.php');?>
      </div>
    </div>
  </div>
</div>

  <div id="modalForLoginProvider" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="signin-title" class="modal-title">Log in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php include('loginCompany.php');?>
      </div>
    </div>
  </div>
</div>
        
<!--        END OF MODAL FOR LOGIN-->
        
       
        

