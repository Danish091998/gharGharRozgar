<?php

include("connections.php");
session_start();
$compID = $_SESSION['CompanyID'];

$query = "SELECT jobs.cID, jobs.JOB, jobs.COURSE, jobs.FIELD, jobs.INFO, jobs.ADDRESS,jobs.SALARY,jobs.EMPTYPE,companyRegister.LOGOIMAGE,companyRegister.ID,companyRegister.NAME,jobs.ID
FROM jobs
INNER JOIN companyRegister
ON jobs.cID = companyRegister.ID WHERE jobs.cID ='$compID' LIMIT 8";
    $result = mysqli_query($conn, $query);

    $row = mysqli_num_rows($result);
    if ($row == 0 ){
        
        echo "<div style='margin: 0 auto;' class='alert alert-danger'>There are no jobs posted by you.</div>";
        
        }
  
    else{ 
    
    while($org = mysqli_fetch_array($result) ){
        
        $job_id         = $org['ID'];
        $org_name       = $org['NAME'];
        $org_logo       = $org['LOGOIMAGE'];
        $org_job        = $org['JOB'];
        $job_course     = $org['COURSE'];
        $job_field      = $org['FIELD'];
        $job_info       = $org['INFO'];
        $job_venue      = $org['ADDRESS'];
        if($org['SALARY'] != "Not Specified" ){
                    $job_salary = "&#8377 ".$org['SALARY'];
                }
                else{
                    $job_salary = $org["SALARY"];
                }
        
        $job_emp_type   = $org['EMPTYPE'];
        
        echo "<div class='row job-display-wrapper' id='$job_id'> 
                <div class='col-xs-3 logo-image-wrapper'>
                    <img src='$org_logo' class='logo-image'>
                </div>
            <div class='col-xs-3 job-details-wrapper'>
                <span class = 'job-name'>$org_job</span><br>
                <span class = 'company-name'>$org_name</span><br>
                <span class = 'venue'><i id='location-icon' class='fas fa-map-marker-alt'></i>$job_venue</span><br>
                </div>
                <div class='col-xs-2 salary-wrapper'>
                <span class = 'company-name'> $job_salary</span><br>
                <span style='color:#38b63d' class = 'company-name'>$job_emp_type</span>
                </div>
                <div class='col-xs-4'>
                <button class='applicants' data-id='$job_id' data-toggle='collapse' data-target='#c$job_id' aria-expanded='false' aria-controls='c$job_id'>View Applicants</button><br>
                <button class='delete' id='delete' data-id='$job_id'>Delete</button>
                <a style='left:100px;top:0px;' class='know-more' href='job-display.php?job=$job_id'>View More</a>
                </div>
                 <div style='width:100%;' class='collapse' id='c$job_id'>
                </div>
            </div>";
    
        }   
    }
?>
<script>
 

 $(".applicants").click(function(){
     var id = $(this).attr("data-id");
 
     $.ajax({
        type : "POST",
        url  : "functions.php",
        data : "check=applicants&jobId="+ id,
                    
                    success:function(result){
                    $("#c" + id).html("<div class='card card-body'><table class='table table-hover'><thead><tr><th scope='col'>#</th><th scope='col'>Name</th><th scope='col'>Email</th><th scope='col'>Contact</th></tr>" +result +"</thead></table></div>");        
        }
    })
})
    
 $(".delete").click(function(){
     var id = $(this).attr("data-id");
 
     $.ajax({
        type : "POST",
        url  : "functions.php",
        data : "check=delete&jobId="+ id,
                    
        success:function(result){
            if(result == "deleted"){
                $("#" + id).fadeOut();
            }
            else{
                alert(result);
            }
        }
    })
})
    
</script>


    