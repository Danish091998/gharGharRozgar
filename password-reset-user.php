<?php
include("connections.php");

    $id = $_GET['id'];
    

    if($id){
         $query  = "SELECT `EMAIL` FROM `forgotPassword` WHERE `USERKEY`= '$id'";
         $result = mysqli_query($conn,$query);
         $row    = mysqli_fetch_array($result);
         
         $email  = $row['EMAIL'];
        if(mysqli_num_rows($result) == 1){
            if($_POST['send']){
            $pass = $_POST['password'];
            $password = password_hash( $pass, PASSWORD_BCRYPT );
    
            $query = "UPDATE `users2` SET `password`= '$password' WHERE `email`='$email'";
            if(mysqli_query( $conn, $query )){
                echo "<div class='alert alert-success'>Your password is changed successfully.</div>";
            }
            else{
                echo "<div class='alert alert-danger'>Please check your internet connection or try again later.</div>";
            }
        }
    }
        else{
            die("Your Email is not found. Your forgot password request might be expired. Please request again.");
        }
           
    }
    
    else{
         die("You are not allowed to open this page.");
    }

?>
<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HomePage</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <!--        StyleSheet-->   
        
       <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">

    </head>
 <body>
     <form style="width:600px; margin: 10% auto;" method="post">
   
    <h1 class="page-heading" style="text-align:left; color:#333;">Reset Your Password</h1>   
          <p class="tagline">You have requested to reset your password for .</p>
         <div class="form-row">
        <input type="Password" id="cur_password" class="form-control edit-profile-inputs" placeholder="New Password" name="password" required>
        <small id="passError" class="text-danger"></small>
      </div>
      <br>

        <div class="form-row">
          <input type="Password" id="con_password" class="form-control edit-profile-inputs" placeholder="Confirm Password" name="confirmPassword" required ><span id='message'></span>
            <small id="cpassError" class="text-danger"></small>
      </div>
            <br>    
      <button class="save-changes" onclick="passValidation()" type="submit" name="Change Password">Change Password</button>
    <br>
            <br><div id="resultpass"></div>
    </form>
</body>
</html>
