<?php
    include("connections.php");
    
    session_start();
    $uEmail = $_SESSION['userEmail'];
    
    $query = "SELECT jobs.ID,jobs.ORG, jobs.JOB, jobs.COURSE, jobs.FIELD, jobs.INFO, jobs.ADDRESS,jobs.SALARY,jobs.EMPTYPE,appliedJobs.jobId,appliedJobs.userEmail
FROM jobs
INNER JOIN appliedJobs
ON jobs.ID = appliedJobs.jobId WHERE  appliedJobs.userEmail = '".$uEmail."'";
    
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
        while($org = mysqli_fetch_array($result)){
            $job_id         = $org['ID'];
            $org_name       = $org['ORG'];
            $org_logo       = $org['LOGOIMAGE'];
            $org_job        = $org['JOB'];
            $job_course     = $org['COURSE'];
            $job_field      = $org['FIELD'];
            $job_info       = $org['INFO'];
            $job_venue      = $org['ADDRESS'];
            
            echo "<div class=' row job-display-wrapper'> 
                <div class='col-xs-3 logo-image-wrapper'>
                    <img src='$org_logo' class='logo-image'>
                </div>
            <div class='col-xs-3 job-details-wrapper'>
                <span class = 'job-name'>$org_job</span><br>
                <span class = 'company-name'>$org_name</span><br>
                <span class = 'venue'><i id='location-icon' class='fas fa-map-marker-alt'></i>$job_venue</span><br>
                </div>
                <div class='col-xs-3 salary-wrapper'>
                <span class = 'company-name'> $job_salary</span><br>
                <span style='color:#38b63d' class = 'company-name'> $job_emp_type</span>
                </div>
                <div class='col-xs-3'>
                <a class='know-more' href='jobDisplay.php?job=$job_id'>View More</a>
                </div>
            </div>";
    
            
        }
    }
    
    
?>
<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User Profile</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--        StyleSheet-->   
        <!--        Font Awesome-->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">


    </head>
    <body>
        

    
<script src="../jquery-3.3.1.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="home.js"></script>  
        
    </body>
</html>
