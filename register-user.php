<?php 
include('connections.php'); 
$register = false;
function selectCity(){
    global $conn;
    $sql = "SELECT LOCATION FROM locations";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['LOCATION'] ."'>" . $row['LOCATION'] ."</option>";
}
}
function select(){
    global $conn;
    $sql = "SELECT EDUCATION FROM education";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['EDUCATION'] ."'>" . $row['EDUCATION'] ."</option>";
}
}
function selectSkill(){
    global $conn;
    $sql = "SELECT SKILL FROM skills";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['SKILL'] ."'>" . $row['SKILL'] ."</option>";
}
}

if( isset( $_POST['add'] ) ) {
    session_start();
    // build a function to validate data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }
    $email = $password = $mobile = $name =$fatherName = $gender = $birthDate = $city = $education = $course = $field = $skill = $percentage = "";
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
        
        if(strlen($_POST["password"]) > 6){
        $password = validateFormData( $_POST["password"] );
        $hashedPassword = password_hash( $password, PASSWORD_BCRYPT );
        }else{
             $passwordError = "Your password must be greater than six characters.<br>";
        }
    }
    if( !$_POST["mobileNumber"] ) {
        $mobileError = "Please enter mobile number <br>";
    } else {
         if(is_numeric($_POST["mobileNumber"]) && strlen($_POST["mobileNumber"])==10){
        $_SESSION['mobileNumber'] = $_POST["mobileNumber"];
        $mobile = validateFormData( $_POST["mobileNumber"] );
        }else{
             $mobileError = "Please enter a valid mobile number <br>";
        }
    }
    if( !$_POST["name"] ) { 
        $NameError = "Please enter your full name <br>";
    } else {
        $_SESSION['name'] = $_POST["name"];
        $name = ucwords(strtolower(mysqli_real_escape_string($conn,validateFormData( $_POST["name"] ))));  
    }
    
    if( !$_POST["fatherName"] ) { 
        $FatherNameError = "Please enter your father's name <br>";
    } else {
        $_SESSION['fatherName'] = $_POST["fatherName"];
        $fatherName = ucwords(strtolower(mysqli_real_escape_string($conn,validateFormData( $_POST["fatherName"] ))));  
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
        $city = validateFormData( $_POST["city"] );
    }
    if( !$_POST["qualification"] ) {
        $eduError = "Please select your qualification<br>";
    } else {
        $education = validateFormData( $_POST["qualification"] );
    }
    if( $_POST["course"] ) {
        $course = validateFormData( $_POST["course"] );
    } else {
        $course = "Not Specified";
    }  
    if( $_POST["field"] ) {
        $field = validateFormData( $_POST["field"] );
    } else {
        $field = "Not Specified";
    }
    if( !$_POST["instName"] ) { 
        $instNameError = "Please enter your Institute name <br>";
    } else {
        $_SESSION['instName'] = $_POST["instName"];
        $instName = ucwords(strtolower(mysqli_real_escape_string($conn,validateFormData( $_POST["instName"] ))));  
    }
    if( $_POST["skill"] ) {
       $skill =  ( $_POST["skill"] );
       $skills = implode(", ", $skill);
    } else {
       $skills= "Not Specified";
    }
    
    if( !$_POST["percentage"] ) { 
        $percentageError = "Please enter your percentage. <br>";
    } else {
        if($_POST['percentage']>0 && $_POST['percentage']<=100 && is_numeric($_POST['percentage'])){
            $percentage = validateFormData($_POST['percentage']);
            $_SESSION['percentage'] = $percentage; 
          }
        else{
            $percentageError = "Please enter valid percentage. <br>";
        } 
    }
    
    if(!$_POST['checkbox'] == 'yes'){
        $checkboxError = "Please accept terms and conditions<br>";
    }
    
    if( $email && $hashedPassword && $mobile && $name  && $gender && $birthDate && $city && $education && $percentage && $_POST['checkbox'] == 'yes' && $password == $confirmPassword && $fatherName && $skills && $course && $field ) {
        $query = "INSERT INTO `users2`(`email`, `password`, `phone`, `name`, `gender`, `birthDate`, `city`, `education`, `course`, `field`,`percentage`,`skill`,`fatherName`,`institutename`) VALUES ( '$email','$hashedPassword','$mobile','$name','$gender','$birthDate','$city','$education','$course','$field','$percentage','$skills','$fatherName','$instName')";

        if( mysqli_query( $conn, $query ) ) {
            session_unset();
            session_destroy();
            
            session_start();
            
            // store data in SESSION variables
            $_SESSION['userName']  = $name;
            $_SESSION['userEmail'] = $email;
            header('Location:user-profile.php');
        } else {
            $error = "<div class='alert alert-danger'>Login failed .Please fill out fields correctly or there might be problem in your internet connection.</div>";
        }
    }
    else{
         $error = "<div class='alert alert-danger'>Registration failed. Please fill all the required fields.</div>";
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
<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
<link href="select2-4.0.6-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!--        StyleSheet-->   
        
        <!--        Font Awesome-->
<!--        <link href="../font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">-->
        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css">
        <link href="style.css" rel="stylesheet">
        

    </head>
    
    <body style="padding-top:0; background:#f9f9f9;">
        <?php
        include('topbar.php');?>
        <div class="container">
        <?php echo $error;?>
        <h1 class="page-heading">User Registration</h1>
         <p class="edit-profile-inputs" style="margin-bottom:25px;">Fields marked with <span class="asterisk">*</span> are compulsory.</p>
            
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" enctype="multipart/form-data">
    <div class="alert alert-info">
                <p class="personal-details-title">Login Details:</p>
            </div>
            <hr>
    <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Email<span class="asterisk">*</span>:</p>
      </div>
    <div class="col-md-4">
      
      <input type="email" class="form-control edit-profile-inputs" placeholder="Email" name="email" required value="<?php echo $_SESSION['email'];?>">
        <small class="text-danger"> <?php echo $emailError; ?></small>
    </div>
         <div class="col-md-2">
      <p class="labels-for-profile">Mobile Number<span class="asterisk">*</span>:</p>
      </div>
    <div class="col-md-4">
      <input type="number" class="form-control edit-profile-inputs" placeholder="Mobile Number" name="mobileNumber" required value="<?php echo $_SESSION['mobileNumber'];?>">
        <small class="text-danger"> <?php echo $mobileError; ?></small>
    </div>
  </div> 
            <hr>
    <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Password<span class="asterisk">*</span>:</p>
      </div>
    <div class="col-md-4">
      
      <input type="Password" id="password" class="form-control edit-profile-inputs" placeholder="Password" name="password" required>
        <small class="text-danger"> <?php echo $passwordError; ?></small>
    </div>
        <div class="col-md-2">
      <p class="labels-for-profile">Confirm Password<span class="asterisk">*</span>:</p>
      </div>
    <div class="col-md-4">
      <input type="Password" id="confirm_password" class="form-control edit-profile-inputs" placeholder="Confirm Password" name="confirmPassword" required ><span id='message'></span>
    </div>
  </div>
        <hr>
            <div class="alert alert-info">
                <p class="personal-details-title">Personal Details:</p>
            </div>
            <hr>             
  <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Name<span class="asterisk">*</span>:</p>
      </div>
    <div class="col-md-4">
      <input type="text" class="form-control edit-profile-inputs" placeholder=" Name" name="name" required value="<?php echo $_SESSION['name'];?>">
        <small class="text-danger"><?php echo $NameError; ?></small>
    </div>
       <div class="col-md-2">
      <p class="labels-for-profile">Father's Name<span class="asterisk">*</span>:</p>
      </div>
    <div class="col-md-4">
      <input type="text" class="form-control edit-profile-inputs" placeholder="Father's Name" name="fatherName" required value="<?php echo $_SESSION['fatherName'];?>">
        <small class="text-danger"><?php echo $FatherNameError; ?></small>
    </div>
  </div>
         <hr>
  <div class="form-row">
    <div class="col-md-2">
      <p class="labels-for-profile">Gender<span class="asterisk">*</span>:</p>
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
      <p class="labels-for-profile">Date Of Birth<span class="asterisk">*</span>:</p>
      </div>
        <div class="col-md-4">
   <input class="form-control edit-profile-inputs" type="text" id="datepicker" placeholder="-Select Date-" name="birthDate" value="<?php echo $_SESSION['birthDate'];?>" readonly>
    <small class="text-danger"><?php echo $birthDateError; ?></small>
        </div>
         <div class="col-md-2">
      <p class="labels-for-profile">City<span class="asterisk">*</span>:</p>
      </div>
    <div class="col-md-4">
      <select name="city" id="city" class="js-example-placeholder-single js-states form-control">
          <option></option>
           <?php selectCity();?>
        </select>
        <small class="text-danger"><?php echo $cityError; ?></small>
    </div>
    </div>
            <hr>
            <div class="alert alert-info">
                <p class="personal-details-title">Education Details:</p>
            </div>
            <hr>
            <div class="form-row">    
      <div class="col-md-2">
      <p class="labels-for-profile">Qualificaion<span class="asterisk">*</span>:</p>
      </div>
    <div class="col-md-3"> 
        <select name="qualification" onchange="checkSelect()" class="js-example-placeholder-single js-states form-control edit-profile-inputs" id="qual">
            <option></option>
     <?php select();?>
        </select>
        <small class="text-danger"><?php echo $eduError; ?></small>
    </div>
    <div onchange="checkSelect2()" id="selectDiv2" class="col-md-3">
        <select name="course" id="selectTwo" class="valuePick js-example-placeholder-single js-states form-control">
            <option></option>
        </select>
    </div>
    <div id="selectDiv3" class="col-md-3">
        <select name="field" id="selectThree" class="js-example-placeholder-single js-states form-control">
            <option></option>
        </select>
    </div>
                
  </div>
            <br>
            <div class="form-row skills-div"> 
                <div class="col-md-2">
      <p class="labels-for-profile">Skills:</p>
      </div>
    <div class="col-md-3">
         
        <select name="skill[]" id="skill" class="js-example-placeholder-multiple js-states" style="width:100%" multiple="multiple"> 
            <small class="text-danger"><?php echo $skillError; ?></small>
            <option></option>
            <?php selectSkill()?>
        </select>    
    </div>  
        <a class="tool-tip" href="#" data-toggle="tooltip" title="Select your skills by clicking on this field. If you don't have any skill leave this field empty.">?
        </a>
            </div>
        <hr>
            <div class="form-row">
            <div class="col-md-2">
      <p class="labels-for-profile">Institute Name<span class="asterisk">*</span>:</p>
      </div>
    <div class="col-md-4">
      <input type="text" class="form-control edit-profile-inputs" placeholder="Institute Name" name="instName" required value="<?php echo $_SESSION['instName'];?>">
        <small class="text-danger"><?php echo $instNameError; ?></small>
    </div>
                <div class="col-md-2">
      <p class="labels-for-profile">Percentage<span class="asterisk">*</span>:</p>
      </div>
    <div class="col-md-4">
      <input type="number" class="form-control edit-profile-inputs" placeholder="Percentage" name="percentage" required value="<?php echo $_SESSION['percentage'];?>">
        <small class="text-danger"><?php echo $percentageError; ?></small>
    </div>
        </div>
           
       <hr>   
  <div class="form-group">
    <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input edit-profile-inputs" id="defaultUnchecked" name="checkbox" value="yes">
    <label class="custom-control-label" for="defaultUnchecked">I have read and agree with the Terms and Conditions. </label>
</div>
    <small class="text-danger"><?php echo $checkboxError; ?></small>
  </div>
  <button style="margin-bottom:20px;" class="btn btn-primary" type="submit" name="add">Submit form</button> 
</form>
 </div>   
        
<script src="jquery-3.3.1.js"></script>
<script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="select2-4.0.6-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.js"></script>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="register.js"></script>
    </body>
</html>
