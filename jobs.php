<?php 
include('connections.php');

function jobs(){
    global $conn;

$query = "SELECT jobs.ORG, jobs.JOB, jobs.COURSE, jobs.FIELD, jobs.INFO, jobs.ADDRESS,companyRegister.logoImage,companyRegister.companyName
FROM jobs
INNER JOIN companyRegister
ON jobs.ORG = companyRegister.companyName LIMIT 8";
    $result = mysqli_query($conn, $query);

    $row = mysqli_num_rows($result);
    if ($row == 0 ){
        
        echo "There are no jobs available now. check again later :p";
        
        }
  
    else{ 
    
    while($org = mysqli_fetch_array($result) ){
        
        $org_name       = mysqli_real_escape_string($conn,$org['ORG']);
        $org_logo       = $org['logoImage'];
        $org_job        = $org['JOB'];
        $job_course     = $org['COURSE'];
        $job_field      = $org['FIELD'];
        $job_info       = $org['INFO'];
        $job_venue      = $org['ADDRESS'];
        
        echo "<div class='row' style='border:2px black solid; border-radius:5px'> 
                <div class='col-md-4'>
                    <img src='$org_logo' style='max-height:150px; max-width:150px;'>
                </div>
            <div class='col-md-8'>
                <b>Job : </b><span>$org_job</span><br>
                <b>Company : </b><span>$org_name</span><br>
                <b>Course Required : </b><span>$org_course</span><br>
                <p>$job_info</p>
                <b>Venue : </b><span>$job_venue</span>
                </div>
            </div>";
    
        }   
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jobs</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--        StyleSheet-->   
        <!--        Font Awesome-->
        <link href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">

    </head>
    <body>
        
        <?php
        $query = "SELECT CURTIME()";
        $result = mysqli_query($conn,$query);
        print_r(mysqli_fetch_array($result));
        include("topBar.php");?>
        <div class="container">
             <?php jobs();?>
        </div>
    
<script src="../jquery-3.3.1.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="home.js"></script>  
        
    </body>
</html>
