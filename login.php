<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="style.css" type="text/css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <div class="container">
          
           
            <form>
                
                
              <div class="form-group">
                    
                    <input type="text" id="login-username" name="email" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label id="label" >Email</label>
                </div>
                <div class="form-group">
                    <input type="password" id="login-password" name="password" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label id="label" >Password</label> 
                </div>
                <input type="button" id="login-button" class="btn btn-default" name="login" value="Login">
            </form>
             
            
        </div>
        
        <!-- jQuery -->
        <script src="../jquery-3.3.1.js"></script>
        <script>
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
             var modal = myModal.find('.modal-body').append(result);
                    }
                }
    	
        	})
        	
    	}) 
        
        </script>
        
    </body>
</html>