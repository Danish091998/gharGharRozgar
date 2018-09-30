<?php
include('connections.php');
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
<h1 style="display:inline-block" class="heading-profile">Account Information</h1>
    <label style="margin-bottom:20px;" id="labelForAvatar" for="avatar">
        <img src="<?php echo $img_link; ?>" id="imgupload">
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
      <p class="labels-for-profile">Contact</p>
      </div>
    <div style="text-align:left" class="col-md-10">
      <p style="display:inline-block" class="profile-data">+91<?php echo $mobile; ?></p>
      <p style="display:inline-block" class="profile-data">+91<?php echo $mobile2; ?></p>
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
      <p class="labels-for-profile">Address</p>
      </div>
    <div class="col-md-10">
      <p class="profile-data"><?php echo $address; ?></p>
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
            