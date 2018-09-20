<?php
ob_start();
include('connections.php');

if( isset( $_POST['login'] ) ) {
    
    // build a function to validate data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }
        
    // create variables
    // wrap the data with our function
    $formEmail = validateFormData( $_POST['email'] );
    $formPass = validateFormData( $_POST['password'] );
    
    // connect to database
    
    
    // create SQL query
    $query = "SELECT firstName, email, password FROM users WHERE email = '$formEmail'";
    
    // store the result
    $result = mysqli_query( $conn, $query );
    
    // verify if result is returned
    if( mysqli_num_rows($result) > 0 ) {
        
        // store basic user data in variables
            $row = mysqli_fetch_assoc($result);
            $user       = $row['firstName'];
            $email      = $row['email'];
            $hashedPass = $row['password'];
        
        print_r($row);
        // verify hashed password with the typed password
        if( password_verify( $formPass, $hashedPass ) ) {
            
            // correct login details!
            // start the session
            session_start();
            
            // store data in SESSION variables
            $_SESSION['loggedInUser'] = $user;
            $_SESSION['loggedInEmail'] = $email;
            header("Location:index.php");
          
        
        } else { // hashed password didn't verify
            
            // error message
            $loginError = "<div class='alert alert-danger'>Wrong username / password combination. Try again.</div>";
            
        }
        
    } else { // there are no results in database
        
        $loginError = "<div class='alert alert-danger'>No such user in database. Please try again. <a class='close' data-dismiss='alert'>&times;</a></div>";
        
    }
    
    // close the mysql connection
    mysqli_close($conn);
    
}
?>

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
          
            <?php echo $loginError; ?>
            
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                
                
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
                <button type="submit" id="login-button" class="btn btn-default" name="login">Login</button>
                
            </form>
             
            
        </div>
        
        <!-- jQuery -->
        <script src="../jquery-3.3.1.js"></script>
        
    </body>
</html>