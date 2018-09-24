<?php
include('connections.php');

function company(){

global $conn;

$query = "SELECT * FROM `companyRegisterTemporary`";
$result = mysqli_query($conn, $query);

if( mysqli_num_rows($result)>0 ){
while($org = mysqli_fetch_array($result)){
        
        $org_name       = $org['companyName'];
        $org_logo       = $org['logoImage'];
        $org_email      = $org['email'];
        $org_contact    = $org['mobileNumber']." ".$org['mobileNumberOptional'];
        $org_address    = $org['area']." , ".$org['city']." , ".$org['pincode'];
        $id             = str_replace(" ","",$org_name);
         
        echo "<div class='row' style='border:2px black solid; border-radius:5px' id='$id'> 
                <div class='col-md-4'>
                    <img src='$org_logo' style='max-height:100px; max-width:100px;'>
                </div>
                <div class='col-md-8'>
                    <b>Company Name : </b><span>$org_name</span><br>
                    <b>E-mail : </b><span>$org_email</span><br>
                    <b>Contact : </b><span>$org_contact</span><br>
                    <b>Venue : </b><span>$org_address</span><br>
                    <button type='button' class='btn btn-success' id='accept' value='accept' data-company='$org_name'>Accept</button>
                    <button type='button' class='btn btn-danger' id='reject' value='reject' data-company='$org_name'>Reject</button>
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
        <link href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">

    </head>
    <body>
     <div class="container-fluid container">
    <?php
        company();    
    ?>
         </div>   
<script src="../jquery-3.3.1.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="home.js"></script> 
    <script>
        $("#accept ,#reject").click(function() {
        
        var value   = $(this).val();
        var company = $(this).attr("data-company");
        var id      = company.replace(" ","");
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
