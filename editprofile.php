<?php 

include('connections.php');
$register=true;

function select(){
    global $conn;
    $sql = "SELECT qualification FROM Qualification";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['qualification'] ."'>" . $row['qualification'] ."</option>";
        }   
    }
session_start();
$userId = $_SESSION['userEmail'];

    if($userId){

        $query  = "SELECT * FROM `users` WHERE `email` = '".$userId."'";
        $result = mysqli_query($conn,$query);
        $row    = mysqli_fetch_array($result);

        $img_link   = 'NULL';
        $email      = $row['email'];
        $mobile     = $row['mobile'];
        $first_name = $row['firstName'];
        $last_name  = $row['lastName'];
        $gender     = $row['gender'];
        $birthdate  = $row['birthDate'];
        $city       = $row['city'];
        $qual       = $row['qualification'];
        $course     = $row['course'];
        $field      = $row['field']; 
    }
?>       
<h1 class="heading-profile">Your Profile</h1>
        <p class="note-profile">Edit and update your profile</p>    
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
    
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
    <div style="padding-left:0" class="col-md-6">
      <input type="text" class="form-control edit-profile-inputs" id="validationDefault01" placeholder="First name" name="firstName" required value="<?php echo $first_name;?>">
        <small class="text-danger"><?php echo $firstNameError; ?></small>
    </div>
    <div style="padding-right:0" class="col-md-6">
      <input type="text" class="form-control edit-profile-inputs" id="validationDefault02" placeholder="Last name" name="lastName" value="<?php echo $last_name;?>">
    <small class="text-danger"><?php echo $lastNameError; ?></small>
    </div>
  </div>
         <br>
  <div class="form-row">
    <input class="form-control edit-profile-inputs" type="text" name="gender" value="<?php echo $gender; ?>"readonly>     
  </div>
        <br>
    <div class="form-row">
   <input class="form-control edit-profile-inputs" type="text" placeholder="Date Of Birth" name="birthDate" value="<?php echo $birthdate;?>" readonly>
    <small class="text-danger"><?php echo $birthDateError; ?></small>
    </div>
        <br>    
  <div class="form-row">
      <input type="text" class="form-control edit-profile-inputs" placeholder="City" name="city" required value="<?php echo $city;?>">
         <small class="text-danger"><?php echo $cityError; ?></small>
  </div>
            <br>
            
            <div class="form-row">
    <div style="padding:0" class="col-md-4"> 
        <select style="height:48px; padding:10px 18px;" name="qualification" onchange="checkSelect()" class="js-example-placeholder-single js-states form-control edit-profile-inputs">
            <small class="text-danger"><?php echo $eduError; ?></small>
            <option><?php echo $qual; ?></option>
     <?php select();?>
        </select>
    </div>
    <div onchange="checkSelect2()" id="selectDiv2" class="col-md-4">
        <select style="height:48px;padding:10px 18px;" name="course" id="selectTwo" class="valuePick js-example-placeholder-single js-states form-control edit-profile-inputs">
        <small class="text-danger"><?php echo $courseError; ?></small>
            <option></option>
        </select>
    </div>
    <div style="padding:0" id="selectDiv3" class="col-md-4">
        <select style="height:48px;padding:10px 18px;" name="field" id="selectThree" class="js-example-placeholder-single js-states form-control edit-profile-inputs">
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
      <input type="Password" id="password" class="form-control edit-profile-inputs" placeholder="New Password" name="password" required>
        <small class="text-danger"> <?php echo $passwordError; ?></small>
  </div>
            <br>
            
    <div class="form-row">
      <input type="Password" id="confirm_password" class="form-control edit-profile-inputs" placeholder="Confirm Password" name="confirmPassword" required ><span id='message'></span>
  </div>
        <br>    
  <button class="save-changes" type="submit" name="add">Change Password</button> 

