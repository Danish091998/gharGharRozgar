<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>
<link rel="stylesheet" href="fontawesome-free-5.3.1-web/css/all.css" crossorigin="anonymous">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" type="text/css">
         <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">
        

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body style="background:#f7f7f7; padding-top:2%;">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
      <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      
            <form class="login-container">
                 <center>
                <i class="fas fa-user-circle login-user-icon"></i></center>
             <h2 class="login-heading">Welcome</h2>
              <div class="form-group">
                    
                    <input type="text" id="login-username" name="email" required autofocus>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label id="label" >Email</label>
                </div>
                <div class="form-group">
                    <input type="password" id="login-password" name="password" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label id="label" >Password</label> 
                    <a href="forgot-password.php" class="forgot-password">Forgot Password?</a>
                </div>
               
                <input type="button" id="login-button" class="btn btn-default" name="login" value="Login">     
            </form>
          <p class="login-bottom-line">Dont't have an account yet? <a class="regitser-now" href="register-user.php">Register Now</a></p>
             
          </div>
    </div>  
         </div>
        <!-- jQuery -->
        <script src="jquery-3.3.1.js"></script>
        <script>
            var input = document.getElementById("login-password");
            input.addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode === 13) {
        document.getElementById("login-button").click();
                                    }
            });
            
        $("#login-button").click(function(){
        var myModal = $('#modalForLogin');
            
        var email = $("#login-username").val();
        var password = $("#login-password").val();
         
        $.ajax({
            type: "POST",
            url : "loginCheck.php",
            data: "email=" + email + "&password=" + password,
    
            success: function(result){
                if(result == 'loggedIn'){
                window.location='index.php';
                }
                
                else{
             $(".alert-danger").remove();
             var modal = $('form').append(result);
                    }
                }
    	
        	})
        	
    	}) 
        
        </script>
        
    </body>
</html>