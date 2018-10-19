<?php 

include('connections.php');
$register=true;

function selectCity(){
    global $conn;
    $sql = "SELECT LOCATION FROM locations";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['LOCATION'] ."'>" . $row['LOCATION'] ."</option>";
}
}

session_start();
$userId = $_SESSION['userEmail'];

    if($userId){

        $query  = "SELECT  `name`, `fatherName`, `email`, `phone`, `city` FROM `users2` WHERE `email` = '".$userId."'";
        $result = mysqli_query($conn,$query);
        $row    = mysqli_fetch_array($result);

        $email      = $row['email'];
        $mobile     = $row['phone'];
        $name       = $row['name'];
        $fatherName = $row['fatherName'];
        $city       = $row['city'];
    }
?>  

<h1 class="heading-profile">Your Profile</h1>
        <p class="note-profile">Edit and update your profile</p>    
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
    
    
           
            
  <div class="form-row">
    <div style="padding-left:0" class="col-md-12">
      <input type="text" class="form-control edit-profile-inputs" id="name" placeholder="Name" name="Name" required value="<?php echo $name;?>">
        <small id="nameError" class="text-danger"></small>
    </div>
  </div>
        <br>
            <div class="form-row">
    <div style="padding-left:0" class="col-md-12">
      <input type="text" class="form-control edit-profile-inputs" id="fatherName" placeholder="Father's Name" name="fatherName" required value="<?php echo $fatherName;?>">
        <small id="fatherNameError" class="text-danger"></small>
    </div>
  </div>
        <br>    
         <div class="form-row">
      <input type="number" class="form-control edit-profile-inputs" placeholder="Mobile Number" name="mobileNumber" required value="<?php echo $mobile;?>" id="mobileNumber">
        <small id="mobileError" class="text-danger"></small>
  </div>
        <br>
  <div class="form-row col-md-6">
      <select name="city" id="city" class="js-example-placeholder-single js-states form-control" placeholder="city">
          <option><?php echo $city;?></option>
           <?php selectCity();?>
        </select>
        <small id="cityError" class="text-danger"></small>
  </div>
  <br>
 <button onclick="validation()" class="save-changes" type="button" name="add">Save Changes</button>
            <br>
            <br><div id="result"></div>
  </form>          
<br>

<form>
    <h1 class="heading-profile">Change Password</h1>     <div class="form-row">
        <input type="Password" id="cur_password" class="form-control edit-profile-inputs" placeholder="New Password" name="password" required>
        <small id="passError" class="text-danger"></small>
      </div>
      <br>

        <div class="form-row">
          <input type="Password" id="con_password" class="form-control edit-profile-inputs" placeholder="Confirm Password" name="confirmPassword" required ><span id='message'></span>
            <small id="cpassError" class="text-danger"></small>
      </div>
            <br>    
      <button class="save-changes" onclick="passValidation()" type="button" name="Change Password">Change Password</button>
    <br>
            <br><div id="resultpass"></div>
    </form>

<script>
function validation(){
    var mobile = document.getElementById("mobileNumber").value;
    var name   = document.getElementById("name").value;
    var city   = document.getElementById("city").value;
    var fatherName = document.getElementById("fatherName").value; 

        if(!mobile || !name || !city || !fatherName){
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
        if(!fatherName){
            $("#fatherNameError").html("Please enter your father's name.");
        }
            else{
                $("#fatherNameError").html(""); 
            }

        }

    else{
        $("#mobileError").html(""); 
        $("#nameError").html(""); 
        $("#cityError").html(""); 
        $("#fatherNameError").html(""); 

                    $.ajax({
                        type : "POST",
                        url  : "functions.php",
                        data : "check=altUser" + "&mobile="+ mobile +"&name="+ name +"&city="+ city +"&fatherName="+ fatherName,


                        success:function(result){
                            $("#result").html(result);

                        }
                    })    
        }
}
    
function passValidation(){

    var newpass   = document.getElementById("cur_password").value;
    var conpass   = document.getElementById("con_password").value;
  
        if( !newpass || !conpass){
         
        if(!newpass){
            $("#passError").html("Please enter your new password.");
        }
            else{
                $("#passError").html(""); 
            }
        if(!conpass){
            $("#cpassError").html("Please enter password again to confirm.");
        }
            else{
                $("#cpassError").html(""); 
            }
        }
        
       else if (newpass == conpass){
             $("#passError").html("");
             $("#cpassError").html(""); 
                
                    $.ajax({
                        type : "POST",
                        url  : "functions.php",
                        data : "check=altPass&pass="+ newpass,


                        success:function(result){
                            $("#resultpass").html(result);
                         
                        }
                    })    
        }
    else{
        $("#resultpass").html("<div class='alert alert-danger'>Password does not match</div>");
    }
    
    
}

</script>
