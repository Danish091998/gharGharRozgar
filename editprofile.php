<?php include('connections.php');
function select(){
    global $conn;
$sql = "SELECT qualification FROM Qualification";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['qualification'] ."'>" . $row['qualification'] ."</option>";
}
}?>       
<h1 class="heading-profile">Your Profile</h1>
        <p class="note-profile">Edit and update your profile</p>    
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
    
    <div class="form-row">
      <input type="email" class="form-control profile-inputs" placeholder="Email" name="email" required value="<?php echo $_SESSION['email'];?>">
        <small class="text-danger"> <?php echo $emailError; ?></small> 
  </div>
<br> 
    <div class="form-row">
      <input type="Password" id="password" class="form-control profile-inputs" placeholder="Password" name="password" required>
        <small class="text-danger"> <?php echo $passwordError; ?></small>
  </div>
            <br>
            
    <div class="form-row">
      <input type="Password" id="confirm_password" class="form-control profile-inputs" placeholder="Confirm Password" name="confirmPassword" required ><span id='message'></span>
  </div>
        <br>    
        
            <div class="form-row">
      <input type="number" class="form-control profile-inputs" placeholder="Mobile Number" name="mobileNumber" required value="<?php echo $_SESSION['mobileNumber'];?>">
        <small class="text-danger"> <?php echo $mobileError; ?></small>
  </div>
        <br>
            
  <div class="form-row">
    <div style="padding-left:0" class="col-md-6">
      <input type="text" class="form-control profile-inputs" id="validationDefault01" placeholder="First name" name="firstName" required value="<?php echo $_SESSION['firstName'];?>">
        <small class="text-danger"><?php echo $firstNameError; ?></small>
    </div>
    <div style="padding-right:0" class="col-md-6">
      <input type="text" class="form-control profile-inputs" id="validationDefault02" placeholder="Last name" name="lastName" value="<?php echo $_SESSION['lastName'];?>">
    <small class="text-danger"><?php echo $lastNameError; ?></small>
    </div>
  </div>
         <br>
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
        <br>
    <div class="form-row">
   <input class="form-control profile-inputs" type="text" placeholder="Date Of Birth" name="birthDate" value="<?php echo $_SESSION['birthDate'];?>" readonly>
    <small class="text-danger"><?php echo $birthDateError; ?></small>
    </div>
        <br>    
  <div class="form-row">
      <input type="text" class="form-control profile-inputs" placeholder="City" name="city" required value="<?php echo $_SESSION['city'];?>">
         <small class="text-danger"><?php echo $cityError; ?></small>
  </div>
            <br>
            
            <div class="form-row">
    <div class="col-md-4"> 
        <select style="height:48px; padding:10px 18px;" name="qualification" onchange="checkSelect()" class="js-example-placeholder-single js-states form-control profile-inputs">
            <small class="text-danger"><?php echo $eduError; ?></small>
            <option></option>
     <?php select();?>
        </select>
    </div>
    <div onchange="checkSelect2()" id="selectDiv2" class="col-md-4">
        <select style="height:48px;padding:10px 18px;" name="course" id="selectTwo" class="valuePick js-example-placeholder-single js-states form-control profile-inputs">
        <small class="text-danger"><?php echo $courseError; ?></small>
            <option></option>
        </select>
    </div>
    <div id="selectDiv3" class="col-md-4">
        <select style="height:48px;padding:10px 18px;" name="field" id="selectThree" class="js-example-placeholder-single js-states form-control profile-inputs">
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