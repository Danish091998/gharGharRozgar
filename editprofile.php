<?php 

include('connections.php');
$register=true;

function select(){
    global $conn;
    $sql = "SELECT `EDUCATION` FROM `education`";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['EDUCATION'] ."'>" . $row['EDUCATION'] ."</option>";
        }   
    }
session_start();
$userId = $_SESSION['userEmail'];

    if($userId){

        $query  = "SELECT * FROM `users2` WHERE `email` = '".$userId."'";
        $result = mysqli_query($conn,$query);
        $row    = mysqli_fetch_array($result);

        $img_link   = 'NULL';
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> 
<h1 class="heading-profile">Your Profile</h1>
        <p class="note-profile">Edit and update your profile</p>    
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
    
    
            <div class="form-row">
      <input type="number" class="form-control edit-profile-inputs" placeholder="Mobile Number" name="mobileNumber" required value="<?php echo $mobile;?>" id="mobileNumber">
        <small id="mobileError" class="text-danger"></small>
  </div>
        <br>
            
  <div class="form-row">
    <div style="padding-left:0" class="col-md-12">
      <input type="text" class="form-control edit-profile-inputs" id="name" placeholder="Name" name="Name" required value="<?php echo $name;?>">
        <small id="nameError" class="text-danger"></small>
    </div>
  </div>
        <br>    
  <div class="form-row">
      <input type="text" class="form-control edit-profile-inputs" placeholder="City" name="city" required value="<?php echo $city;?>" id="city">
         <small id="cityError" class="text-danger"></small>
  </div>
            <br>
            
            <div class="form-row">
    <div style="padding:0" class="col-md-4"> 
        <select id="qual" name="qualification" onchange="checkSelect()" class="js-example-placeholder-single js-states form-control edit-profile-inputs">
            <option><?php echo $qual; ?></option>
     <?php select();?>
        </select>
        <small id="qualError" class="text-danger"></small>
    </div>
    <div onchange="checkSelect2()" id="selectDiv2" class="col-md-4">
        <select style="height:48px;padding:10px 18px;" name="course" id="selectTwo" class="valuePick js-example-placeholder-single js-states form-control edit-profile-inputs">
            <option></option>
        </select>
        <small id="courseError" class="text-danger"></small>
    </div>
    <div style="padding:0" id="selectDiv3" class="col-md-4">
        <select style="height:48px;padding:10px 18px;" name="field" id="selectThree" class="js-example-placeholder-single js-states form-control edit-profile-inputs">
            <option></option>
        </select>
        <small id="fieldError" class="text-danger"></small>
    </div>
  </div>
  <br>
 <button onclick="validation()" class="save-changes" type="button" name="add">Save Changes</button>
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
  <button class="save-changes" type="button" name="add">Change Password</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="register.js"></script>
<script>
    function validation(){
var mobile = document.getElementById("mobileNumber").value;
var name = document.getElementById("name").value;
var city = document.getElementById("city").value;
var qual = document.getElementById("qual").value;    
var course = document.getElementById("selectTwo").value; 
var field = document.getElementById("selectThree").value;
    if(!mobile){
        $("#mobileError").html("Please enter your mobile number.");
    }
        else{
            $("#mobileError").html(""); 
        }
    if(!name){
        $("#nameError").html("Please enter your name.");
    }
        else{
            $("#nameError").html(""); 
        }
    if(!city){
        $("#cityError").html("Please enter your city.");
    }
        else{
            $("#cityError").html(""); 
        }
     if(!qual){
        $("#qualError").html("Please enter your qualification.");
    }
        else{
           $("#qualError").html("");  
        }
    if(!course){
        $("#courseError").html("Please enter your course.");
    }
        else{
             $("#courseError").html("");
        }
     if(!field){
        $("#fieldError").html("Please enter your field.");
    }
        else{
             $("#fieldError").html("");
        }
    }
</script>
