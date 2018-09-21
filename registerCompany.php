<?php 
include('connections.php'); 
$target_dir = "C:\Program Files (x86)\Ampps\www\gharGharRozgar\Uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["add"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
           function compress_image($source_url, $destination_url, $quality) {
    return $destination_url;
    }
    $d = compress_image($_FILES["fileToUpload"]["name"], $target_file, 90);
        print_r($d);


// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $d)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
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
        <h1 class="page-heading">Company Registration</h1>
            
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" enctype="multipart/form-data">
    
    <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Email:</p>
      </div>
    <div class="col-md-4">
      
      <input type="email" class="form-control" placeholder="Email" name="email">
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
      <input type="number" class="form-control" placeholder="Mobile Number" name="mobileNumber" >
        <small class="text-danger"> <?php echo $mobileError; ?></small>
    </div>
    <div class="col-md-4">
      <input type="number" class="form-control" placeholder="Mobile Number(Optional)" name="mobileNumberOptional" >
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
      <input type="text" class="form-control" id="validationDefault01" placeholder="Name" name="firstName" >
        <small class="text-danger"><?php echo $firstNameError; ?></small>
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
                 <p class="labelForPicture">Profile Picture</p>
                 <input type="file" class="form-control" name="fileToUpload" id="avatar">
             </div> 
  </div>
            <hr>    
  <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-form">Location:</p>
      </div>
    <div class="col-md-3">
      <input type="text" class="form-control" id="validationDefault03" placeholder="Area" name="city" >
         <small class="text-danger"><?php echo $cityError; ?></small>
    </div>
      <div class="col-md-3">
      <input type="text" class="form-control" id="validationDefault03" placeholder="City" name="city" >
         <small class="text-danger"><?php echo $cityError; ?></small>
    </div>
      <div class="col-md-3">
      <input type="number" class="form-control" id="validationDefault03" placeholder="Pin Code" name="pin">
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
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="registerCompany.js"></script>        
    </body>
</html>
