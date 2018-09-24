<?php
include('connections.php');

function company(){

global $conn;

$query = "SELECT * FROM `companyRegisterTemporary`";
$result = mysqli_query($conn, $query);

if( mysqli_num_rows($result)>0 ){
while($org = mysqli_fetch_array($result)){
        
        $org_id         = $org['id'];
        $org_name       = $org['companyName'];
        $org_logo       = $org['logoImage'];
        $org_email      = $org['email'];
        $org_contact    = $org['mobileNumber']." ".$org['mobileNumberOptional'];
        $org_address    = $org['area']." , ".$org['city']." , ".$org['pincode'];
         
        echo "<div class='row job-display-wrapper' id='$org_id'> 
                <div class='col-xs-4 logo-image-wrapper'>
                    <img src='$org_logo' class='logo-image'>
                </div>
                <div class='col-xs-8 job-details-wrapper'>
                    <span class='job-name' style='font-size:18px;'>$org_name</span><br>
                    <span class='company-name'><i class='fa fa-envelope' aria-hidden='true' id='location-icon'></i>$org_email</span><br>
                    <span class='company-name'><i class='fa fa-phone' aria-hidden='true' id='location-icon'></i>$org_contact</span><br>
                    <span class='venue'><i id='location-icon' class='fa fa-map-marker'></i>$org_address</span><br>
                    <div class='buttons'>
                    <button type='button' class='btn btn-success' id='accept' value='accept' data-company='$org_name' data-id='$org_id'>Accept</button>
                    <button type='button' class='btn btn-danger' id='reject' value='reject' data-company='$org_name' data-id='$org_id'>Reject</button>
                    </div>
                </div>
              </div>";
    
        }   
    }
    
    else {
        echo "There is no new request of any organisation.";
    }
}

?>
<!DOCTYPE html>
<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--        StyleSheet-->   
        <!--        Font Awesome-->
        <link href="../font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">

    </head>
    <body style="background:#f5f5f5;">
     <div class="spacing-out-div">
         <h1 class="heading">Ghar Ghar Rozgar</h1>
         <h3 class="sub-heading">Admin Panel</h3>
         <p class="text">Please click on <b>accept</b> for the companies which you want to allow to add jobs to the job provider section and <b>delete</b> those which you don't want to allow.</p>
         <div class="row">
    <?php company(); ?>
        </div>
         </div>   
<script src="../jquery-3.3.1.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="home.js"></script> 
    <script>
        $("#accept ,#reject").click(function() {
        
        var value   = $(this).val();
        var company = $(this).attr("data-company");
        var id      = $(this).attr("data-id");
        $.ajax({
            type: "POST",
            url: "functions.php",
            data: "value=" + value + "&company=" + company + "&check=select3",
            success: function(result) {
                 $('#'+id).fadeOut();         
                }
    	
        	})
        	
    	}) 
        
        
        </script>
    </body>
</html>
