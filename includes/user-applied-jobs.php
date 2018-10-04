<?php
    include("connections.php");
    
    session_start();
    $uEmail = $_SESSION['userEmail'];
    
    $query = "SELECT jobs.ID,jobs.cID, jobs.JOB, jobs.COURSE, jobs.FIELD, jobs.INFO, jobs.ADDRESS,jobs.SALARY,jobs.EMPTYPE,appliedJobs.jobId,appliedJobs.userEmail
FROM jobs
INNER JOIN appliedJobs
ON jobs.ID = appliedJobs.jobId WHERE  appliedJobs.userEmail = '".$uEmail."'";
    
    $result = mysqli_query($conn,$query);
    
    if(mysqli_num_rows($result) > 0){
        while($org = mysqli_fetch_array($result)){
            $org_id         = $org['cID'];
            
            $compQuery  = "SELECT `NAME`,`LOGOIMAGE` FROM `companyRegister` WHERE `ID`= '$org_id'";
            $compResult = mysqli_query($conn,$compQuery);
            $compRow    = mysqli_fetch_array($compResult);
            
            $org_name       = $compRow['NAME'];
            $job_id         = $org['ID'];
            $org_logo       = $compRow['LOGOIMAGE'];
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
    
<script src="home.js"></script>  
        
  
