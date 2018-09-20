<?php
ob_start();
include('connections.php');

if( isset( $_POST["add"] ) ) {
        
    // build a function that validates data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    // set all variables to empty by default
    $username = $email = $password = "";
    
    // check to see if inputs are empty
    // create variables with form data
    // wrap the data with our function
    
    if( !$_POST["username"] ) {
        $nameError = "Please enter a username <br>";
    } else {
        $username = validateFormData( $_POST["username"] );
    }

    if( !$_POST["email"] ) {
        $emailError = "Please enter your email <br>";
    } else {
        $email = validateFormData( $_POST["email"] );
    }

    if( !$_POST["password"] ) {
        $passwordError = "Please enter a password <br>";
    } else {
        $password = validateFormData( $_POST["password"] );
        $hashedPassword = password_hash( $password, PASSWORD_BCRYPT );
    }
    
    // check to see if each variable has data
    if( $username && $email && $hashedPassword ) {
        header("Location:index.php");
        $signupQuery = "INSERT INTO `users2` ( name, password, email )
        VALUES ('$username', '$hashedPassword', '$email')";

        if( mysqli_query( $conn, $signupQuery ) ) {
            session_start();
            $_SESSION['loggedInUser'] = $username;
            $_SESSION['loggedInEmail'] = $email;
            
          
        } else {
            echo "Error: ". $signupQuery . "<br>" . mysqli_error($conn);
        }
    }
    
}
?>

<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        
        <link rel="stylesheet" type="text/css" href="style.css">    

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <div class="container">

            
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
            <div class="form-group">
                <small class="text-danger"> <?php echo $nameError; ?></small>
                <input id="register-username" type="text" name="username" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label id="label" >Username</label>
            </div>
                
            <div class="form-group">
                <small class="text-danger"> <?php echo $emailError; ?></small>
                <input id="register-email" type="text" name="email" required>
                <span class="highlight"></span>
                    <span class="bar"></span>
                    <label id="label" >Email</label>
            </div>
                
            <div class="form-group">
                <small class="text-danger"> <?php echo $passwordError; ?></small>
                <input id="register-password" type="password" name="password" required>
                <span class="highlight"></span>
                    <span class="bar"></span>
                    <label id="label" >Password</label>
            </div>
                
                <input id="register-button" type="submit" name="add" value="Register">
            </form>
            
        </div>
        
        <!-- jQuery -->
        <script src="../jquery-3.3.1.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="../bootstrap/js/bootstrap.js"></script>
    </body>
</html>