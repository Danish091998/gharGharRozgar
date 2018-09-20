<!--        TOP BAR-->
        
        <div id="top-bar">
        <p class="website-name">Ghar Ghar Rozgar</p>
            <?php include('checkLogin.php');
            checkLogin();?>
        <div class="navigation-anchor-wrapper">
            <a>Home</a>
        </div>
        </div>
        
<!--        END OF TOP BAR-->
        
<!--            MODAL FOR LOGIN-->
        
        <div id="modalForLogin" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="signin-title" class="modal-title">Sign in</h5>
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
        
<!--        END OF MODAL FOR LOGIN-->
        
       
        

