<?php
include('connections.php');

$companyId= 38 ;

    
    if($companyId){

        $query  = "SELECT * FROM `companyRegister` WHERE `id` = '".$companyId."'";
        $result = mysqli_query($conn,$query);
        $row    = mysqli_fetch_array($result);

        $img_link   = $row['logoImage'];
        $email      = $row['email'];
        $mobile     = $row['mobileNumber'];
        $name       = $row['companyName'];
        $area       = $row['area'];
        $gender     = $row['city'];
        $birthdate  = $row['pincode'];
        $city       = $row['city'];
        $mobile2    = $row['mobileNumberOptional'];
    }


elseif(!$row && !$companyId){
   
    header("Location:index.php");       
}

        
     function jobsFetch(){
        global $companyId;
        global $name;
        if($companyId){
            global $conn;
            $query  = "SELECT * FROM `jobs` WHERE `ORG` = '".$name."'";
            $result = mysqli_query($conn,$query);

        while($org = mysqli_fetch_array($result) ){
        
        $job_id         = $org['ID'];
        $org_name       = $org['ORG'];
        $org_logo       = $org['logoImage'];
        $org_job        = $org['JOB'];
        $job_course     = $org['COURSE'];
        $job_field      = $org['FIELD'];
        $job_info       = $org['INFO'];
        $job_venue      = $org['ADDRESS'];
        
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

        <title>Comapny Profile</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> 
   
<!--        <link href="../font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link href="style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">

    </head>
    
    <body style="background:#f9f9f9">
        <?php
        include('topbar.php');?>
        <div class="row">
        <div class=" col-md-3 left-side-bar">
            <hr class="profile-line">
            <a id="myAccount" class="profile-navigation">My Account</a>
            <hr class="profile-line">
            <a id="appHistory" class="profile-navigation">Jobs Applied</a>
            <hr class="profile-line">
            <a id="editProfile" class="profile-navigation">Manage Profile</a>
            <hr class="profile-line">
            <a id="logout" class="profile-navigation">Logout</a>
            <hr class="profile-line">
        </div>
            <div id="profile-section" class=" col-md-9 profile-wrapper">
                <h1 class="heading-profile">Account Information</h1>
        <p class="note-profile">Edit and update your profile</p>    
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
    
    <div class="form-row">
      <input type="email" class="form-control profile-inputs" placeholder="Email" name="email" required value="<?php echo $email; ?>">
        <small class="text-danger"> <?php echo $emailError; ?></small> 
  </div>
<br> 
    
            <div class="form-row">
      <input type="number" class="form-control profile-inputs" placeholder="Mobile Number" name="mobileNumber" required value="<?php echo $mobile;?>">
        <small class="text-danger"> <?php echo $mobileError; ?></small>
  </div>
        <br>
            
  <div class="form-row">
    <div style="padding-left:0" class="col-md-6">
      <input type="text" class="form-control profile-inputs" id="validationDefault01" placeholder="First name" name="firstName" required value="<?php echo $first_name;?>">
        <small class="text-danger"><?php echo $firstNameError; ?></small>
    </div>
    <div style="padding-right:0" class="col-md-6">
      <input type="text" class="form-control profile-inputs" id="validationDefault02" placeholder="Last name" name="lastName" value="<?php echo $last_name;?>">
    <small class="text-danger"><?php echo $lastNameError; ?></small>
    </div>
  </div>
         <br>
  <div class="form-row">
    <input class="form-control profile-inputs" type="text" name="gender" value="<?php echo $gender; ?>"readonly>     
  </div>
        <br>
    <div class="form-row">
   <input class="form-control profile-inputs" type="text" placeholder="Date Of Birth" name="birthDate" value="<?php echo $birthdate;?>" readonly>
    <small class="text-danger"><?php echo $birthDateError; ?></small>
    </div>
        <br>    
  <div class="form-row">
      <input type="text" class="form-control profile-inputs" placeholder="City" name="city" required value="<?php echo $city;?>">
         <small class="text-danger"><?php echo $cityError; ?></small>
  </div>
            <br>
            
            <div class="form-row">
    <div style="padding:0" class="col-md-4"> 
        <select style="height:48px; padding:10px 18px;" name="qualification" onchange="checkSelect()" class="js-example-placeholder-single js-states form-control profile-inputs">
            <small class="text-danger"><?php echo $eduError; ?></small>
            <option><?php echo $qual; ?></option>
     <?php select();?>
        </select>
    </div>
    <div onchange="checkSelect2()" id="selectDiv2" class="col-md-4">
        <select style="height:48px;padding:10px 18px;" name="course" id="selectTwo" class="valuePick js-example-placeholder-single js-states form-control profile-inputs">
        <small class="text-danger"><?php echo $courseError; ?></small>
            <option></option>
        </select>
    </div>
    <div style="padding:0" id="selectDiv3" class="col-md-4">
        <select style="height:48px;padding:10px 18px;" name="field" id="selectThree" class="js-example-placeholder-single js-states form-control profile-inputs">
            <small class="text-danger"><?php echo $fieldError; ?></small>
            <option></option>
        </select>
    </div>
  </div>
  <br>
 <button class="save-changes" type="submit" name="add">Save Changes</button>
  </form>          
<br>
<h1 class="heading-profile">Change Password</h1>     <div class="form-row">
      <input type="Password" id="password" class="form-control profile-inputs" placeholder="New Password" name="password" required>
        <small class="text-danger"> <?php echo $passwordError; ?></small>
  </div>
            <br>
            
    <div class="form-row">
      <input type="Password" id="confirm_password" class="form-control profile-inputs" placeholder="Confirm Password" name="confirmPassword" required ><span id='message'></span>
  </div>
        <br>    
  <button class="save-changes" type="submit" name="add">Change Password</button> 

            </div>
        </div>        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="register.js"></script>  
<script type="text/javascript" src="profile.js"></script>
    </body>
</html>


