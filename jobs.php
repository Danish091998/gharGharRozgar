<?php 
include('connections.php');
$register=true;
function jobs(){
global $conn;
session_start();
$user = $_SESSION['userEmail'];
if(!$user){
    $query  = "SELECT `ID` FROM `jobs`";
    $result = mysqli_query($conn, $query);
    $number = mysqli_num_rows($result);
    echo "<div class='alert alert-info' style='margin:0 auto;'>There are total $number jobs available currently.</div>";
}
else{

    $query = "SELECT jobs.cID, jobs.JOB, jobs.COURSE, jobs.FIELD, jobs.INFO, jobs.ADDRESS,jobs.SALARY,jobs.EMPTYPE,companyRegister.LOGOIMAGE,companyRegister.ID,companyRegister.NAME,jobs.ID
    FROM jobs
    INNER JOIN companyRegister
    ON jobs.cID = companyRegister.ID LIMIT 4";
        $result = mysqli_query($conn, $query);


        if (mysqli_num_rows($result) <= 0){

            echo "<div style='margin: 0 auto;' class='alert alert-danger'>There are no jobs available now. Check again later!</div>";

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

            if($org['SALARY'] != "Not Specified"){
                        $job_salary = "&#8377 ".$org['SALARY'];
                    }
            else{
                 $job_salary = $org['SALARY'];
            }

            $job_emp_type   = $org['EMPTYPE'];

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
                    <a class='know-more' href='job-display.php?job=$job_id'>View More</a>
                    </div>
                </div>";

            }   
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jobs</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous"> 
        <!--        Font Awesome-->
       <link rel="stylesheet" href="fontawesome-free-5.3.1-web/css/all.css" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">


    </head>
    <body class="job-background" style="padding-top:0; background:#f9f9f9;">
        
        <?php
        include("topBar.php");?>
        <div style="margin-top:5%;" class="container">
            <div class="row" id="jobs">
             <?php jobs();?>
            </div>
        </div>
    
<script src="jquery-3.3.1.js" ></script>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="home.js"></script>  
<script>
var count = 0;
 $(".job-background").scroll(function() {
   if($(".job-background").scrollTop() + $(window).height() > $(document).height()-1) {
        count = count+4;
           
       $.ajax({
                        type : "POST",
                        url  : "functions.php",
                        data : "check=morejobs&count="+ count,


                        success:function(result){ 
                            if(result){
                                $("#jobs").append(result);
                            }
                            
                            else{
                                 $("#info").remove();
                                 $("#jobs").append("<div class='alert alert-info' id='info' style='margin:50px auto;'>There are no more jobs to display.</div>");
                            }
                            
                        }
                    })
       
   }
});
        </script>      
    </body>
</html>
