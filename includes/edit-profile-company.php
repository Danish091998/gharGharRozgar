<h1 class="heading-profile">Your Profile</h1>
        <p class="note-profile">Edit and update your profile</p>    
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
            
    <label id="labelForAvatar" for="avatar">
                     <img src="Images/avatar-1577909_640.png" id="imgupload">
                 </label>
             <div class="margin-bottom margin-top">
                 
                 <input type="file" class="form-control edit-profile-inputs" name="fileToUpload" id="avatar">
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
      <input type="number" class="form-control edit-profile-inputs" placeholder="Mobile Number (Optional)" name="mobileNumber" value="<?php echo $mobile;?>">
        <small class="text-danger"> <?php echo $mobileError; ?></small>
  </div>
        <br>
            
  <div class="form-row">
      <input type="text" class="form-control edit-profile-inputs" id="validationDefault01" placeholder="Name" name="firstName" required value="<?php echo $first_name;?>">
        <small class="text-danger"><?php echo $firstNameError; ?></small>
      </div>
         <br>
  <div class="form-row">
    <input class="form-control edit-profile-inputs" type="text" placeholder="Gender" name="gender" value="<?php echo $gender; ?>"readonly>     
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