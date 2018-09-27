<?php 
include('connections.php');
$register=true;
function jobs(){
    global $conn;

$query = "SELECT jobs.ID,jobs.ORG, jobs.JOB, jobs.COURSE, jobs.FIELD, jobs.INFO, jobs.ADDRESS,jobs.salary,jobs.empType,companyRegister.logoImage,companyRegister.companyName
FROM jobs
INNER JOIN companyRegister
ON jobs.ORG = companyRegister.companyName LIMIT 9";
    $result = mysqli_query($conn, $query);

    $row = mysqli_num_rows($result);
    if ($row == 0 ){
        
        echo "There are no jobs available now. check again later :p";
        
        }
  
    else{ 
    
    while($org = mysqli_fetch_array($result) ){
        
        $job_id         = $org['ID'];
        $org_name       = mysqli_real_escape_string($conn,$org['ORG']);
        $org_logo       = $org['logoImage'];
        $org_job        = $org['JOB'];
        $job_course     = $org['COURSE'];
        $job_field      = $org['FIELD'];
        $job_info       = $org['INFO'];
        $job_venue      = $org['ADDRESS'];
        $job_salary     = $org['salary'];
        $job_emp_type   = $org['empType'];
        
        echo "<div class=' row job-display-wrapper'> 
                <div class='col-xs-3 logo-image-wrapper'>
                    <img src='$org_logo' class='logo-image'>
                </div>
            <div class='col-xs-3 job-details-wrapper'>
                <span class = 'job-name'>$org_job</span><br>
                <span class = 'company-name'>$org_name</span><br>
                <span class = 'venue'><i id='location-icon' class='fa fa-map-marker'></i>$job_venue</span><br>
                </div>
                <div class='col-xs-3 salary-wrapper'>
                <span class = 'company-name'>&#8377 $job_salary</span><br>
                <span style='color:#38b63d' class = 'company-name'> $job_emp_type</span>
                </div>
                <div class='col-xs-3'>
                <a class='know-more' href='jobDisplay.php?job=$job_id'>View More</a>
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
        <link href="../font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">


    </head>
    <body style="background:#f4f4f4;">
        
        <?php
        include("topBar.php");?>
        <div style="margin-top:5%;" class="container">
            <div class="row">
             <?php jobs();?>
            </div>
        </div>
    
<script src="../jquery-3.3.1.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="home.js"></script>  
        
    </body>
</html>
