<?php


include('connections.php');

if( $_POST['email'] && $_POST['password']) {
  
    $formEmail = $_POST['email'];
    $formPass =  $_POST['password'];
    
    // connect to database
    
    
    // create SQL query
    $query = "SELECT `name`, `email`, `password` FROM `users2` WHERE `email` = '$formEmail'";
    
    // store the result
    $result = mysqli_query( $conn, $query );
    
    // verify if result is returned
    if( mysqli_num_rows($result) > 0 ) {
        
        // store basic user data in variables
            $row = mysqli_fetch_assoc($result);
            $user       = $row['name'];
            $email      = $row['email'];
            $hashedPass = $row['password'];
        
        // verify hashed password with the typed password
        if( password_verify( $formPass, $hashedPass ) ) {
            
            // correct login details!
            // start the session
            session_start();
            
            // store data in SESSION variables
            $_SESSION['userName']  = $user;
            $_SESSION['userEmail'] = $email;
           
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
    $query = "SELECT `ID`,`NAME`, `EMAIL`, `PASSWORD` FROM `companyRegister` WHERE EMAIL = '$formEmail'";
    
    // store the result
    $result = mysqli_query( $conn, $query );
    
    // verify if result is returned
    if( mysqli_num_rows($result) > 0 ) {
        
        // store basic user data in variables
            $row = mysqli_fetch_assoc($result);
            $cID        = $row['ID'];
            $user       = $row['NAME'];
            $email      = $row['EMAIL'];
            $hashedPass = $row['PASSWORD'];
        
        // verify hashed password with the typed password
        if( password_verify( $formPass, $hashedPass ) ) {
            
            // correct login details!
            // start the session
            session_start();
            
            // store data in SESSION variables
            $_SESSION['CompanyName']  = $user;
            $_SESSION['CompanyID']    = $cID;
            $_SESSION['CompanyEmail'] = $email;
            echo "loggedIn";
        
        } else { // hashed password didn't verify
            
            // error message
            echo "<div class='alert alert-danger'>Wrong username / password combination. Try again.</div>";
            
        }
        
    } else { // there are no results in database
        
        echo "<div class='alert alert-danger'>No such user in database. Please try again. </div>";
        
    }   
}
mysqli_close($conn);


?>