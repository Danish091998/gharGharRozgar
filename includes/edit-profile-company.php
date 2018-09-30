<?php include('connections.php');
session_start();
$companyEmail= $_SESSION["CompanyEmail"] ;

    if($companyEmail){

        $query  = "SELECT * FROM `companyRegister` WHERE `EMAIL` = '$companyEmail'";
        $result = mysqli_query($conn,$query);
        $row    = mysqli_fetch_array($result);

        $img_link   = $row['LOGOIMAGE'];
        $email      = $row['EMAIL'];
        $mobile     = $row['PHONE'];
        $name       = $row['NAME'];
        $address    = $row['ADDRESS'];
        $city       = $row['CITY'];
        $mobile2    = $row['PHONESEC'];
    }
?>

<h1 class="heading-profile">Your Profile</h1>
        <p class="note-profile">Edit and update your profile</p>    
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
            
    <label id="labelForAvatar" for="avatar">
                     <img src="<?php echo $img_link; ?>" id="imgupload">
                 </label>
             <div class="margin-bottom margin-top">
                 
                 <input type="file" class="form-control edit-profile-inputs" name="fileToUpload" id="avatar" value="<?php echo $img_link; ?>">
                 <small class="text-danger"> <?php echo $logoError; ?></small>
             </div> 
    <br>
    <div class="form-row">
      <input type="email" class="form-control edit-profile-inputs" placeholder="Email" name="email" required value="<?php echo $email; ?>">
        <small class="text-danger"> <?php echo $emailError; ?></small> 
  </div>
<br> 
    
            <div class="form-row">
      <input type="number" class="form-control edit-profile-inputs" placeholder="Mobile Number" name="mobileNumber" required value="<?php echo $mobile;?>">
        <small class="text-danger"> <?php echo $mobileError; ?></small>
  </div>
            <br>
            <div class="form-row">
      <input type="number" class="form-control edit-profile-inputs" placeholder="Mobile Number (Optional)" name="mobileNumber" value="<?php echo $mobile2;?>">
        <small class="text-danger"> <?php echo $mobileError; ?></small>
  </div>
        <br>
            
  <div class="form-row">
      <input type="text" class="form-control edit-profile-inputs" id="validationDefault01" placeholder="Name" name="firstName" required value="<?php echo $name;?>">
        <small class="text-danger"><?php echo $firstNameError; ?></small>
      </div>
        <br>
  <div class="form-row">
      <input type="text" class="form-control edit-profile-inputs" placeholder="City" name="city" required value="<?php echo $city;?>">
         <small class="text-danger"><?php echo $cityError; ?></small>
  </div>
            <br>
            
 <button class="save-changes" type="submit" name="add">Save Changes</button>
  </form>          
<br>
<h1 class="heading-profile">Change Password</h1>     <div class="form-row">
      <input type="Password" id="password" class="form-control edit-profile-inputs" placeholder="New Password" name="password" required>
        <small class="text-danger"> <?php echo $passwordError; ?></small>
  </div>
            <br>
            
    <div class="form-row">
      <input type="Password" id="confirm_password" class="form-control edit-profile-inputs" placeholder="Confirm Password" name="confirmPassword" required ><span id='message'></span>
  </div>
        <br>    
  <button class="save-changes" type="submit" name="add">Change Password</button> 
<script src="registerCompany.js"></script>