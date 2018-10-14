<?php
include('connections.php');
session_start();
$user = $_SESSION['userEmail'];
if($user){
    
    $query  = "SELECT * FROM users2 WHERE EMAIL ='$user'";
    $result     = mysqli_query($conn, $query);
    $row        = mysqli_fetch_array($result);
    
    $city       = $row['city'];
    $qual       = $row['education'];
    $course     = $row['course'];
    $field      = $row['field'];
    $skills     = str_replace(",","','",$row['skill']);
    $percentage = $row['percentage'];

    $query = "SELECT jobs.cID, jobs.JOB, jobs.COURSE, jobs.FIELD, jobs.INFO, jobs.ADDRESS,jobs.SALARY,jobs.EMPTYPE,companyRegister.LOGOIMAGE,companyRegister.NAME,jobs.ID
    FROM jobs
    INNER JOIN companyRegister
    ON jobs.cID = companyRegister.ID ORDER BY `ID` DESC LIMIT 4";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) <= 0){

            echo "<div style='margin: 10px auto; text-align:center;' class='alert alert-info'>There are no jobs available for you right now. Check again later!</div>";

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

?>
<script> 
var count = 0;
 $(".job-background").scroll(function() {
     
   if($(".job-background").scrollTop() + $(window).height() > $(document).height()-1) {
    
        count = count+4;
      
           console.log(count);
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
    
    
