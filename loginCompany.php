<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


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
            
            <form class="login-container"> 
                <center>
                <i class="fas fa-user-circle login-user-icon"></i></center>
             <h2 class="login-heading">Welcome</h2>
              <div class="form-group">
                    <input type="text" id="login-company-username" name="companyEmail" required autocomplete="on">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label id="label" >Email</label>
                </div>
                <div class="form-group">
                    <input type="password" id="login-company-password" name="companyPassword" required autocomplete="on">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label id="label">Password</label> 
                </div>
                <input type="button" id="login-company-button" class="btn btn-default" name="login" value="Login">
                
            </form>
             
            
        </div>
        
        <!-- jQuery -->
        <script src="../jquery-3.3.1.js"></script>
        <script>
        $("#login-company-button").click(function(){
        var myModal  = $('#modalForLoginProvider');
        var email    = $("#login-company-username").val();
        var password = $("#login-company-password").val();
         
        $.ajax({
            type: "POST",
            url : "loginCheck.php",
            data: "companyEmail=" + email + "&companyPassword=" + password,
    
            success: function(result){
                if(result == 'loggedIn'){
                window.location='index.php';
                }
                
                else{
                    $(".alert-danger").remove();
                   var modal =
                       myModal.find('.modal-body').append(result);
                    }
            }
    	
        	})
        	
    	}) 
        
        </script>
        
    </body>
</html>