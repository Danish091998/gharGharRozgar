<?php 

include('../connections.php');
session_start();
$userId = $_SESSION['userEmail'];

    if($userId){

        $query  = "SELECT * FROM `users2` WHERE `email` = '".$userId."'";
        $result = mysqli_query($conn,$query);
        $row    = mysqli_fetch_array($result);

        $img_link   = $row['profilepic'];
        $email      = $row['email'];
        $mobile     = $row['phone'];
        $name       = $row['name'];
        $gender     = $row['gender'];
        $birthdate  = $row['birthDate'];
        $city       = $row['city'];
        $qual       = $row['education'];
        $course     = $row['course'];
        $field      = $row['field']; 
    }
?>       

<h1 style="display:inline-block" class="heading-profile">Account Information</h1>
    <label style="margin-bottom:20px;" id="labelForAvatar" for="avatar">
        <img src="Images/avatar-1577909_640.png" id="imgupload">
    </label>       

<div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Email</p>
      </div>
    <div class="col-md-10">
      <p class="profile-data"><?php echo $email; ?></p>
    </div>
  </div> 

<div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Name</p>
      </div>
    <div class="col-md-10">
      <p class="profile-data"><?php echo $name; ?></p>
    </div>
  </div>

<div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Contact</p>
      </div>
    <div style="text-align:left" class="col-md-10">
      <p style="display:inline-block" class="profile-data">+91<?php echo $mobile; ?></p>
    </div>
  </div>
       
  <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Gender</p>
      </div>
    <div class="col-md-10">
      <p class="profile-data"><?php echo $gender; ?></p>
    </div>
  </div>
        
             
  <div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Date Of Birth</p>
      </div>
    <div class="col-md-10">
      <p class="profile-data"><?php echo $birthdate; ?></p>
    </div>
</div>
<div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">City</p>
    </div>
     <div class="col-md-10">
      <p class="profile-data"><?php echo $city; ?></p>
    </div>
  </div>
<div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Qualification</p>
    </div>
     <div class="col-md-10">
      <p class="profile-data"><?php echo $qual; ?></p>
    </div>
  </div>
<div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Course</p>
    </div>
     <div class="col-md-10">
      <p class="profile-data"><?php echo $course; ?></p>
    </div>
  </div>
<div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Field</p>
    </div>
     <div class="col-md-10">
      <p class="profile-data"><?php echo $field; ?></p>
    </div>
  </div>
            