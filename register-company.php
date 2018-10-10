<?php 
include('connections.php'); 
$target_dir = "Uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$imgCheck = $_FILES["fileToUpload"]["name"];

// Check if image file is a actual image or fake image
if(isset($_POST["add"])) {
    session_start();
    // build a function to validate data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }
    $email = $password = $mobile = $mobileOpt = $cName = $address = $city = "";
    $confirmPassword = $_POST["confirmPassword"];
    
    if( !$_POST["email"] ) {
        $emailError = "Please enter email <br>";
    } else {
         $emailCheck = mysqli_real_escape_string($conn,validateFormData( $_POST["email"] ));
            $query  = "SELECT `email` FROM `companyRegister` WHERE `email` = '$emailCheck'";
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
    
    $mobileOpt = $_SESSION['mobop'] = validateFormData( $_POST["mobileNumberOptional"] );
    
    
    if( !$_POST["cName"] ) { 
        $cNameError = "Please enter first name <br>";
    } else {
        $_SESSION['cName'] = $_POST["cName"];
        $cName = mysqli_real_escape_string($conn,validateFormData( $_POST["cName"] ));  
    }
    if( !$_POST["address"] ) {
        $addressError = "Please enter area<br>";
    } else {
        $_SESSION['address'] = $_POST["address"];
        $address = mysqli_real_escape_string($conn,validateFormData( $_POST["address"] ));
    }
    if( !$_POST["city"] ) {
        $cityError = "Please enter city<br>";
    } else {
        $_SESSION['city'] = $_POST["city"];
        $city = validateFormData( $_POST["city"] );
    }
    if(!$imgCheck){
        $logoError = "<br>Please select an image.<br>";
    }
    else{
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } 
// Check if file already exists
if (file_exists($target_file)) {
    $target_file = $target_dir . $mobile . basename($_FILES["fileToUpload"]["name"]);
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
   $logoError = "<br>Sorry, only JPG, JPEG, PNG files are allowed.<br>";
}

 else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       
    } else {
       $logoError = "<br>Sorry, there was an error uploading your file.Check ur internet connection or try again later.<br>";
    }
}

if($check !== false) {
$uploadimage = $target_file;
$newname = $imgCheck;
// Set the resize_image name 
$resize_image = $target_file; 
$actual_image = $target_file;
// It gets the size of the image
list( $width,$height ) = getimagesize( $uploadimage );
$newwidth = $width;
$newheight = $height;
// It loads the images we use jpeg function you can use any function like imagecreatefromjpeg
$thumb = imagecreatetruecolor( $newwidth, $newheight );
    if ($check['mime'] == 'image/jpeg') 
			$source = imagecreatefromjpeg( $actual_image );

		elseif ($check['mime'] == 'image/jpg') 
			$source = imagecreatefromgif( $actual_image );

		elseif ($check['mime'] == 'image/png') 
			$source = imagecreatefrompng( $actual_image );


// Resize the $thumb image.
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);


// It then save the new image to the location specified by $resize_image variable

imagejpeg( $thumb, $resize_image,50);
//unlink($actual_image);  

// 100 Represents the quality of an image you can set and ant number in place of 100.


$out_image=addslashes(file_get_contents($resize_image));
    }
}
 
    if( $email && $hashedPassword && $mobile && $cName && $address && $city && $_POST['checkbox'] == 'yes' && $password == $confirmPassword && $resize_image ) {
        $query = "INSERT INTO `companyRegister`(`ID`,`EMAIL`, `PASSWORD`, `PHONE`, `NAME`, `ADDRESS`, `CITY`, `PHONESEC`, `LOGOIMAGE`) VALUES ('','$email','$hashedPassword','$mobile','$cName','$address','$city','$mobileOpt','$resize_image')";
    echo $query;
        if( mysqli_query( $conn, $query ) ) {
            session_unset();
            session_destroy();
            
            session_start();
            // store data in SESSION variables
            
            $_SESSION['CompanyName']  = $cName;
            $_SESSION['CompanyEmail'] = $email;
            
            header('Location:company-profile.php');

        }
         else {
            $errorSubmit = "<div class= 'alert alert-danger'>Registration Failed. Please check your internet and try again later.</div>";
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

        <title>Company Registration</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
<link href="select2-4.0.6-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="style.css" rel="stylesheet">
        

    </head>
    
    <body style="background:#f9f9f9; padding-top:0">
        <?php
        include('topbar.php');?>
        <div class="container">
        <h1 class="page-heading">Company Registration</h1>
            
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" enctype="multipart/form-data">
    <div><?php echo $errorSubmit; ?></div>
    <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Email:</p>
      </div>
    <div class="col-md-4">
      <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $_SESSION['email']; ?>">
        <small class="text-danger"> <?php echo $emailError; ?></small>
    </div>
  </div> 
            <hr>
    <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Password:</p>
      </div>
    <div class="col-md-4">
      
      <input type="Password" id="password" class="form-control" placeholder="Password" name="password">
        <small class="text-danger"> <?php echo $passwordError; ?></small>
    </div>
  </div>
            <hr>
         
    <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Confirm Password:</p>
      </div>
    <div class="col-md-4">
      <input type="Password" id="confirm_password" class="form-control" placeholder="Confirm Password" name="confirmPassword" ><span id='message'></span>
    </div>
  </div>
        <hr>    
        
            <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Contact:</p>
      </div>
    <div class="col-md-4">
      <input type="number" class="form-control" placeholder="Mobile Number" name="mobileNumber" value="<?php echo  $_SESSION['mobileNumber']; ?>">
        <small class="text-danger"> <?php echo $mobileError; ?></small>
    </div>
    <div class="col-md-4">
      <input type="number" class="form-control" placeholder="Mobile Number(Optional)" name="mobileNumberOptional" value="<?php echo $_SESSION['phonesec']; ?>" >
        <small class="text-danger"> <?php echo $mobileError; ?></small>
    </div>
  </div>
        <hr>
            <div class="alert alert-info">
                <p class="personal-details-title">Personal Details:</p>
            </div>
  <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Comapny Name:</p>
      </div>
    <div class="col-md-5">
      <input type="text" class="form-control" id="validationDefault01" placeholder="Name" name="cName" value="<?php echo $_SESSION['cName']; ?>">
        <small class="text-danger"><?php echo $cNameError; ?></small>
    </div>
  </div>
            <hr>
      <div class="col-md-2">
      <p class="labels-for-form">Comapny Logo:</p>
      </div>
         <div class="col-md-4">
    <label id="labelForAvatar" for="avatar">
                     <img src="Images/avatar-1577909_640.png" id="imgupload">
                 </label>
             <div class="margin-bottom margin-top">
                 <input type="file" class="form-control" name="fileToUpload" id="avatar">
                 <small class="text-danger"> <?php echo $logoError; ?></small>
             </div> 
  </div>
            <hr>    
  <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Location:</p>
      </div>
    <div class="col-md-3">
      <input type="text" class="form-control" id="validationDefault03" placeholder="Address" name="address" value="<?php echo $_SESSION['address']; ?>">
         <small class="text-danger"><?php echo $areaError; ?></small>
    </div>
      <div class="col-md-3">
      <input type="text" class="form-control" id="validationDefault03" placeholder="City" name="city" value="<?php echo $_SESSION['city']; ?>">
         <small class="text-danger"><?php echo $cityError; ?></small>
    </div>
      
  </div>
            <hr> 
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
        
<script src="jquery-3.3.1.js"></script>
<script src="select2-4.0.6-rc.0/dist/js/select2.min.js"></script>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="registerCompany.js"></script>        
    </body>
</html>
