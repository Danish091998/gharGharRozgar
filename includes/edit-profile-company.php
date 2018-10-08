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
             </div> 
    <br>
    <div class="form-row">
      <input type="email" class="form-control edit-profile-inputs" placeholder="Email" name="email" id="email" required value="<?php echo $email; ?>">
        <small class="text-danger" id="emailError"> </small> 
  </div>
<br> 
    
            <div class="form-row">
      <input type="number" class="form-control edit-profile-inputs" placeholder="Mobile Number" name="mobileNumber" id="mobileNumber" required value="<?php echo $mobile;?>">
        <small class="text-danger" id="mobileError"></small>
  </div>
            <br>
            <div class="form-row">
      <input type="number" class="form-control edit-profile-inputs" placeholder="Mobile Number (Optional)" name="mobileNumberOpt" id="mobileNumberOpt" value="<?php echo $mobile2;?>">
  </div>
        <br>
            
  <div class="form-row">
      <input type="text" class="form-control edit-profile-inputs" placeholder="Name" name="companyName" id="companyName" required value="<?php echo $name;?>">
        <small class="text-danger" id="nameError"></small>
      </div>
        <br>
  <div class="form-row">
      <input type="text" class="form-control edit-profile-inputs" placeholder="City" name="city" id="city" required value="<?php echo $city;?>">
         <small class="text-danger" id="cityError"></small>
  </div>
            <br><div id="result"></div>
            
 <button onclick="compValidation()" class="save-changes" type="button" name="add">Save Changes</button>
             <br>
            
  </form>          
<br>
<form>
<h1 class="heading-profile">Change Password</h1>     <div class="form-row">
      <input type="Password" id="cur_password" class="form-control edit-profile-inputs" placeholder="New Password" name="cur_password" required>
        <small class="text-danger" id="passwordError"></small>
  </div>
            <br>
            
    <div class="form-row">
      <input type="Password" id="con_password" class="form-control edit-profile-inputs" placeholder="Confirm Password" name="con_password" required ><span id='message'></span>
        <small class="text-danger" id="confirmPasswordError"></small>
  </div>
        <br>
  <div id="result"></div>
    <div id="resultpass"></div>
  <button class="save-changes" type="button" onclick="compPassValidation()" name="add">Change Password</button> 
    </form>
<script src="registerCompany.js"></script>


<script>
function compValidation(){
   
    var email     = document.getElementById("email").value;
    var mobile    = document.getElementById("mobileNumber").value;
    var mobileOpt = document.getElementById("mobileNumberOpt").value;
    var cname     = document.getElementById("companyName").value;
    var city      = document.getElementById("city").value;
    
        if(!mobile || !email || !cname || !city){
        if(!mobile){
            $("#mobileError").html("Please enter your mobile number.");
        }
            else{
                $("#mobileError").html(""); 
            }
        if(!email){
            $("#emailError").html("Please enter your email.");
        }
        else{
                $("#emailError").html(""); 
            }
        if(!cname){
            $("#nameError").html("Please enter your company name.");
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

        }

    else{
            $.ajax({
                        type : "POST",
                        url  : "functions.php",
                        data : "check=altComp" + "&mobile="+ mobile +"&cname="+ cname +"&city="+ city+"&email="+ email +"&mobile2="+mobileOpt,


                        success:function(result){
                            $("#result").html(result);
                        

                        }
                    })    
        }
}

    
function compPassValidation(){

    var newpass   = document.getElementById("cur_password").value;
    var conpass   = document.getElementById("con_password").value;
  
        if( !newpass || !conpass){
         
        if(!newpass){
            $("#passwordError").html("Please enter your new password.");
        }
            else{
                $("#passwordError").html(""); 
            }
        if(!conpass){
            $("#confirmPasswordError").html("Please enter password again to confirm.");
        }
            else{
                $("#confirmPasswordError").html(""); 
            }
        }
        
       else if (newpass == conpass){
             $("#passwordError").html("");
             $("#confirmPasswordError").html(""); 

                    $.ajax({
                        type : "POST",
                        url  : "functions.php",
                        data : "check=altcompPass&password="+ newpass,


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