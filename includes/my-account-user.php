<?php 

include('connections.php');
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
        $fatherName = $row['fatherName'];
        $gender     = $row['gender'];
        $birthdate  = $row['birthDate'];
        $city       = $row['city'];
        $qual       = $row['education'];
        $course     = $row['course'];
        $field      = $row['field']; 
        $percentage = $row['percentage'];
        $skills     = $row['skill'];
        $instName   = $row['institutename'];
    }
?>       

<h1 style="display:inline-block" class="heading-profile">Account Information</h1>
  

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
      <p class="labels-for-profile">Father's Name</p>
      </div>
    <div class="col-md-10">
      <p class="profile-data"><?php echo $fatherName; ?></p>
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
      <p class="labels-for-profile">Institute Name</p>
    </div>
     <div class="col-md-10">
      <p class="profile-data"><?php echo $instName; ?></p>
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
      <p class="labels-for-profile">Skills</p>
      </div>
    <div class="col-md-10">
      <p class="profile-data"><?php echo $skills; ?></p>
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
<div class="form-row">
      <div class="col-md-2">
      <p class="labels-for-profile">Percentage</p>
    </div>
     <div class="col-md-10">
      <p class="profile-data"><?php echo $percentage; ?></p>
    </div>
  </div>
            