<?php
include('connections.php');

$jobId = $_GET['job'];

    function jobdisplay(){

        global $jobId;
        
        $query = "SELECT jobs.ID,jobs.ORG, jobs.JOB, jobs.COURSE, jobs.FIELD, jobs.INFO, jobs.ADDRESS,jobs.salary,jobs.role,jobs.empType,companyRegister.logoImage,companyRegister.companyName,companyRegister.mobileNumber,companyRegister.email
        FROM jobs
        INNER JOIN companyRegister
        ON jobs.ORG = companyRegister.companyName WHERE jobs.ID='$jobId'";


        global $conn;
        $result = mysqli_query($conn,$query);

        if($org = mysqli_fetch_array($result)){

                $job_id         = $org['ID'];
                $org_name       = mysqli_real_escape_string($conn,$org['ORG']); 
                $org_logo       = $org['logoImage'];
                $org_job        = $org['JOB'];
                $job_course     = $org['COURSE'];
                $job_field      = $org['FIELD'];
                $job_info       = $org['INFO'];
                $job_venue      = $org['ADDRESS'];
                $job_salary     = $org['salary'];
                $job_role       = $org['role'];
                $job_emp_type   = $org['empType'];
                $job_mobile_no  = $org['mobileNumber'];
                $job_email      = $org['email'];

                echo "<div class=' row job-display-wrapper' id='individual-job-wrapper'> 
                        <div class='col-xs-4 logo-image-wrapper'>
                            <img src='$org_logo' class='logo-image' style='margin: 30px 20px 20px 20px;'>
                        </div>
                    <div class='col-xs-8 job-details-wrapper' id='individual-job-details-wrapper'>
                        <span class = 'job-name margin-left' style='font-size:18px;'>$org_job</span><br>
                        <span class = 'company-name margin-left' style='font-size:14px; color:#666; po'>$org_name</span><br>
                        <span class = 'venue margin-left' font-size:14px; position:relative; top:5px;'><i id='location-icon' class='fa fa-map-marker'></i>$job_venue</span><br>
                        </div>
                        <div class='footer-job'><p class='salary'>&#8377 $job_salary</p>
                        <p class='contact'><i class='fa fa-phone' aria-hidden='true' id='phone-icon'></i> $job_mobile_no</p></div>
                    </div>
                    <div class='job-description-wrapper'><p id='job-description'>Job Description</p><p class='job-description-text'>$job_info</p>
                    <div class='row' style='margin-bottom:5px;'>
                    <div class='col-md-2' style='text-align:left;'>
                    <p class='salary-job-description'>Salary:</p>
                    </div>
                    <div class='col-md-10' style='text-align:left;'>
                    <p class='salary-amount'>&#8377 $job_salary</p>
                    </div>
                    </div>
                    <div class='row' style='margin-bottom:5px;'>
                    <div class='col-md-2' style='text-align:left;'>
                    <p class='salary-job-description'>Role:</p>
                    </div>
                    <div class='col-md-10' style='text-align:left;'>
                    <p class='salary-amount'> $job_role</p>
                    </div>
                    </div>
                    <div class='row' style='margin-bottom:30px;'>
                    <div class='col-md-2' style='text-align:left;'>
                    <p class='salary-job-description'>Emoloyment Type:</p>
                    </div>
                    <div class='col-md-10' style='text-align:left;'>
                    <p class='salary-amount'> $job_emp_type</p>
                    </div>
                    </div>
                    <p id='job-description'>Course Required:</p><p class='job-description-text'>$job_course</p>
                    <p id='job-description'>Contact:</p>
                     <div class='row' style='margin-bottom:5px;'>
                    <div class='col-md-2' style='text-align:left;'>
                    <p class='salary-job-description'>Mobile:</p>
                    </div>
                    <div class='col-md-10' style='text-align:left;'>
                    <p class='salary-amount'>$job_mobile_no</p>
                    </div>
                    </div>
                    <div class='row' style='margin-bottom:5px;'>
                    <div class='col-md-2' style='text-align:left;'>
                    <p class='salary-job-description'>Email:</p>
                    </div>
                    <div class='col-md-10' style='text-align:left;'>
                    <p class='salary-amount'> $job_email</p>
                    </div>
                    </div>
                    </div>
                    ";

        }   
        
        else{
    echo "Error 404 page not found";
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
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR" rel="stylesheet">
        
    </head>
    <body style="background:#f4f4f4;">
        <?php $register=true; include('topBar.php')?>
        <div><?php jobdisplay();?></div>
    
<script src="../jquery-3.3.1.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="home.js"></script>  
        
    </body>
</html>

