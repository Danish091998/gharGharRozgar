<?php 
include('connections.php'); 
$register = false;
function select(){
    global $conn;
    $sql = "SELECT EDUCATION FROM education";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['EDUCATION'] ."'>" . $row['EDUCATION'] ."</option>";
}
}
if( isset( $_POST['add'] ) ) {
    session_start();
    // build a function to validate data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }
    $email = $password = $mobile = $name = $gender = $birthDate = $city = $education = $course = $field = "";
    $confirmPassword = $_POST["confirmPassword"];
    
    if( !$_POST["email"] ) {
        $emailError = "Please enter email <br>";
    } else {
            $emailCheck = mysqli_real_escape_string($conn,validateFormData( $_POST["email"] ));
            $query  = "SELECT `email` FROM `users2` WHERE `email` = '$emailCheck'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                $emailError = "This email already exists.<br>";
                $_SESSION['email'] = $_POST["email"];
            } 
            else{
                $_SESSION['email'] = $_POST["email"];
                $email = mysqli_real_escape_string($conn,validateFormData( $_POST["email"] ));
            }
    }
    if( !$_POST["password"] ) {
        $passwordError = "Please enter password <br>";
    } else {
        $password = validateFormData( $_POST["password"] );
        $hashedPassword = password_hash( $password, PASSWORD_BCRYPT );
    }
    if( !$_POST["mobileNumber"] ) {
        $mobileError = "Please enter mobile number <br>";
    } else {
        $_SESSION['mobileNumber'] = $_POST["mobileNumber"];
        $mobile = validateFormData( $_POST["mobileNumber"] );
    }
    if( !$_POST["name"] ) { 
        $firstNameError = "Please enter first name <br>";
    } else {
        $_SESSION['name'] = $_POST["name"];
        $name = mysqli_real_escape_string($conn,validateFormData( $_POST["name"] ));  
    }
    
    if( !$_POST["gender"] ) {
        $genderError = "Please specify gender <br>";
    } else {
        $gender = validateFormData( $_POST["gender"] );
    }
    if( !$_POST["birthDate"] ) {
        $birthDateError = "Please enter birth date <br>";
    } else {
        $_SESSION['birthDate'] = $_POST["birthDate"];
        $birthDate = validateFormData( $_POST["birthDate"] );
    }
    if( !$_POST["city"] ) {
        $cityError = "Please enter city<br>";
    } else {
        $_SESSION['city'] = $_POST["city"];
        $city = validateFormData( $_POST["city"] );
    }
    if( !$_POST["qualification"] ) {
        $eduError = "Please enter qualification<br>";
    } else {
        $education = validateFormData( $_POST["qualification"] );
    }
    if( !$_POST["course"] ) {
        $courseError = "Please enter course<br>";
    } else {
        $course = validateFormData( $_POST["course"] );
    }  
    if( !$_POST["field"] ) {
        $fieldError = "Please enter field<br>";
    } else {
        $field = validateFormData( $_POST["field"] );
    }
    if(!$_POST['checkbox'] == 'yes'){
        $checkboxError = "Please accept terms and conditions<br>";
    }
    if( $email && $hashedPassword && $mobile && $name  && $gender && $birthDate && $city && $education && $course && $field && $_POST['checkbox'] == 'yes' && $password == $confirmPassword  ) {
        $query = "INSERT INTO `users2`(`ID`, `email`, `password`, `phone`, `name`, `gender`, `birthDate`, `city`, `education`, `course`, `field`,`percentage`,`profilepic`) VALUES ( '','$email','$hashedPassword','$mobile','$name','$gender','$birthDate','$city','$education','$course','$field','','')";

        if( mysqli_query( $conn, $query ) ) {
            session_unset();
            session_destroy();
            
            session_start();
            
            // store data in SESSION variables
            $_SESSION['userName']  = $name;
            $_SESSION['userEmail'] = $email;
            header('Location:index.php');
        } else {
            echo "Error: ". $query . "<br>" . mysqli_error($conn);
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

        <title>Registration</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <!--        StyleSheet-->   
        
        <!--        Font Awesome-->
<!--        <link href="../font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link href="style.css" rel="stylesheet">
        

    </head>
    
    <body>
        <?php
        include('topbar.php');?>
        <div class="container">
        <h1 class="page-heading">User Registration</h1>
            
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
    
    <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Email:</p>
      </div>
    <div class="col-md-4">
      
      <input type="email" class="form-control" placeholder="Email" name="email" required value="<?php echo $_SESSION['email'];?>">
        <small class="text-danger"> <?php echo $emailError; ?></small>
    </div>
  </div> 
            <hr>
    <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Password:</p>
      </div>
    <div class="col-md-4">
      
      <input type="Password" id="password" class="form-control" placeholder="Password" name="password" required>
        <small class="text-danger"> <?php echo $passwordError; ?></small>
    </div>
  </div>
            <hr>
         
    <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Confirm Password:</p>
      </div>
    <div class="col-md-4">
      <input type="Password" id="confirm_password" class="form-control" placeholder="Confirm Password" name="confirmPassword" required ><span id='message'></span>
    </div>
  </div>
        <hr>    
        
            <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Mobile Number:</p>
      </div>
    <div class="col-md-4">
      <input type="number" class="form-control" placeholder="Mobile Number" name="mobileNumber" required value="<?php echo $_SESSION['mobileNumber'];?>">
        <small class="text-danger"> <?php echo $mobileError; ?></small>
    </div>
  </div>
        <hr>
            <div class="alert alert-info">
                <p class="personal-details-title">Personal Details:</p>
            </div>
  <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Name:</p>
      </div>
    <div class="col-md-5">
      <input type="text" class="form-control" id="validationDefault01" placeholder="First name" name="name" required value="<?php echo $_SESSION['name'];?>">
        <small class="text-danger"><?php echo $firstNameError; ?></small>
    </div>
  </div>
         <hr>
  <div class="form-row">
    <div class="col-md-2">
      <p class="labels-for-form">Gender:</p>
      </div>
      <div class="col-md-10">
      <div class="row">
  <div class="form-check form-check-inline col-md-4">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
  <label class="form-check-label" for="inlineRadio1">Male</label>
</div>
<div class="form-check form-check-inline col-md-4">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
  <label class="form-check-label" for="inlineRadio2">Female</label>
</div>
<div class="form-check form-check-inline col-md-4">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Transgender">
  <label class="form-check-label" for="inlineRadio3">Transgender</label>
</div> 
    <small class="text-danger"><?php echo $genderError; ?></small>
    </div>
    </div>      
  </div>
        <hr>
    <div class="form-row">
     <div class="col-md-2">
      <p class="labels-for-form">Date Of Birth:</p>
      </div>
        <div class="col-md-4">
   <input class="form-control" type="text" id="datepicker" placeholder="-Select Date-" name="birthDate" value="<?php echo $_SESSION['birthDate'];?>" readonly>
    <small class="text-danger"><?php echo $birthDateError; ?></small>
        </div>
    </div>
        <hr>    
  <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">City:</p>
      </div>
    <div class="col-md-4">
      <input type="text" class="form-control" id="validationDefault03" placeholder="City" name="city" required value="<?php echo $_SESSION['city'];?>">
         <small class="text-danger"><?php echo $cityError; ?></small>
    </div>
  </div>
            <hr>
            <div class="alert alert-info">
                <p class="personal-details-title">Education Details:</p>
            </div>
            
            <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Qualificaion:</p>
      </div>
    <div class="col-md-3"> 
        <select name="qualification" onchange="checkSelect()" class="js-example-placeholder-single js-states form-control">
            <small class="text-danger"><?php echo $eduError; ?></small>
            <option></option>
     <?php select();?>
        </select>
    </div>
    <div onchange="checkSelect2()" id="selectDiv2" class="col-md-3">
        <select name="course" id="selectTwo" class="valuePick js-example-placeholder-single js-states form-control">
        <small class="text-danger"><?php echo $courseError; ?></small>
            <option></option>
        </select>
    </div>
    <div id="selectDiv3" class="col-md-3">
        <select name="field" id="selectThree" class="js-example-placeholder-single js-states form-control">
            <small class="text-danger"><?php echo $fieldError; ?></small>
            <option></option>
        </select>
    </div>
  </div>
          
  <div class="form-group">
    <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" name="checkbox" value="yes">
    <label class="custom-control-label" for="defaultUnchecked">I have read and agree with the Terms and Conditions. </label>
</div>
    <small class="text-danger"><?php echo $checkboxError; ?></small>
  </div>
  <button class="btn btn-primary" type="submit" name="add">Submit form</button> 
</form>
 </div>   
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="register.js"></script>
    </body>
</html>
