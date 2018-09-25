<?php
ob_start();

include('connections.php');

if( $_POST['email'] && $_POST['password']) {
  
    $formEmail = $_POST['email'];
    $formPass =  $_POST['password'];
    
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
        
        
        // verify hashed password with the typed password
        if( password_verify( $formPass, $hashedPass ) ) {
            
            // correct login details!
            // start the session
            session_start();
            
            // store data in SESSION variables
            $_SESSION['loggedInUser'] = $user;
            $_SESSION['loggedInEmail'] = $email;
            echo "loggedIn";
          
        
        } else { // hashed password didn't verify
            
            // error message
            echo "<div class='alert alert-danger'>Wrong username / password combination. Try again.</div>";
            
        }
        
    } else { // there are no results in database
        
        echo "<div class='alert alert-danger'>No such user in database. Please try again. <a class='close' data-dismiss='alert'>&times;</a></div>";
        
    }
}
    
 if($_POST['companyEmail'] && $_POST['companyPassword']) {
    
    $formEmail =  $_POST['companyEmail'] ;
    $formPass = $_POST['companyPassword'] ;
    
    // connect to database
    
    
    // create SQL query
    $query = "SELECT companyName, email, password FROM companyRegister WHERE email = '$formEmail'";
    
    // store the result
    $result = mysqli_query( $conn, $query );
    
    // verify if result is returned
    if( mysqli_num_rows($result) > 0 ) {
        
        // store basic user data in variables
            $row = mysqli_fetch_assoc($result);
            $user       = $row['companyName'];
            $email      = $row['email'];
            $hashedPass = $row['password'];
        
        // verify hashed password with the typed password
        if( password_verify( $formPass, $hashedPass ) ) {
            
            // correct login details!
            // start the session
            session_start();
            
            // store data in SESSION variables
            $_SESSION['loggedInUser'] = $user;
            $_SESSION['loggedInEmail'] = $email;
            echo "loggedIn";
        
        } else { // hashed password didn't verify
            
            // error message
            echo "<div class='alert alert-danger'>Wrong username / password combination. Try again.</div>";
            
        }
        
    } else { // there are no results in database
        
        echo "<div class='alert alert-danger'>No such user in database. Please try again. <a class='close' data-dismiss='alert'>&times;</a></div>";
        
    }   
}
mysqli_close($conn);


?>