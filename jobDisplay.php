<?php
include('connections.php');

$jobId   = $_GET['job'];

        if($jobId){
        
        $query = "SELECT jobs.ID,jobs.ORG, jobs.JOB, jobs.COURSE, jobs.FIELD, jobs.INFO, jobs.ADDRESS,jobs.salary,jobs.role,jobs.empType,companyRegister.logoImage,companyRegister.companyName,companyRegister.mobileNumber,companyRegister.email,companyRegister.id
        FROM jobs
        INNER JOIN companyRegister
        ON jobs.ORG = companyRegister.companyName WHERE jobs.ID='$jobId'";
            
        $result = mysqli_query($conn,$query);
        

        if($org = mysqli_fetch_array($result)){
                
                $org_name       = $org['ORG']; 
                $org_logo       = $org['logoImage'];
                $org_job        = $org['JOB'];
                
                if($org['COURSE']){
                    $job_course = $org['COURSE'];
                }
                else{
                    $job_course = 'Not Required';
                }
            
                $job_field      = $org['FIELD'];
                $job_info       = $org['INFO'];
                $job_venue      = $org['ADDRESS'];
                if($org['salary']){
                    $job_salary = "&#8377 ".$org['salary'];
                }
                else{
                    $job_salary = 'Not Specified';
                }
                
                if($org['role']){
                    $job_role   = $org['role'];
                }
                else{
                    $job_role   = 'Not Specified';
                }
                $job_emp_type   = $org['empType'];
                $job_mobile_no  = $org['mobileNumber'];
                $job_email      = $org['email'];
                $companyId      = $org['id'];
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
   
        <link href="style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Poppins" rel="stylesheet">
        
    </head>
    <body style="background:#f4f4f4;">
        <?php $register=true; include('topBar.php')?>
        
        <div class=' row job-display-wrapper' id='individual-job-wrapper'> 
                        <div class='col-xs-4 logo-image-wrapper'>
                            <img src='<?php echo $org_logo;?>' class='logo-image' style='margin: 30px 20px 20px 20px;'>
                        </div>
                    <div class='col-xs-8 job-details-wrapper' id='individual-job-details-wrapper'>
                        <span class = 'job-name margin-left' style='font-size:18px;'><?php echo $org_job;?></span><br>
                        <span class = 'company-name margin-left' style='font-size:14px; color:#666;'><?php echo $org_name;?></span><br>
                        <span class = 'venue margin-left' style='font-size:14px; position:relative; top:5px;'><i id='location-icon' class='fa fa-map-marker'></i><?php echo $job_venue;?></span><br>
                        </div>
                        <div class='footer-job'><p class='salary'><?php echo $job_salary;?></p>
                        <p class='contact'><i class='fa fa-phone' aria-hidden='true' id='phone-icon'></i><?php echo $job_mobile_no;?></p></div>
                    </div>
                    <div class='job-description-wrapper'><p id='job-description'>Job Description</p><p class='job-description-text'><?php echo $job_info;?></p>
                    <div class='row' style='margin-bottom:5px;'>
                    <div class='col-md-2' style='text-align:left;'>
                    <p class='salary-job-description'>Salary:</p>
                    </div>
                    <div class='col-md-10' style='text-align:left;'>
                    <p class='salary-amount'><?php echo $job_salary;?></p>
                    </div>
                    </div>
                    <div class='row' style='margin-bottom:5px;'>
                    <div class='col-md-2' style='text-align:left;'>
                    <p class='salary-job-description'>Role:</p>
                    </div>
                    <div class='col-md-10' style='text-align:left;'>
                    <p class='salary-amount'><?php echo $job_role;?></p>
                    </div>
                    </div>
                    <div class='row' style='margin-bottom:30px;'>
                    <div class='col-md-2' style='text-align:left;'>
                    <p class='salary-job-description'>Emoloyment Type:</p>
                    </div>
                    <div class='col-md-10' style='text-align:left;'>
                    <p class='salary-amount'><?php echo $job_emp_type;?></p>
                    </div>
                    </div>
                    <p id='job-description'>Course Required:</p><p class='job-description-text'><?php echo $job_course;?></p>
                    <p id='job-description'>Contact:</p>
                     <div class='row' style='margin-bottom:5px;'>
                    <div class='col-md-2' style='text-align:left;'>
                    <p class='salary-job-description'>Mobile:</p>
                    </div>
                    <div class='col-md-10' style='text-align:left;'>
                    <p class='salary-amount'><?php echo $job_mobile_no;?></p>
                    </div>
                    </div>
                    <div class='row' style='margin-bottom:5px;'>
                    <div class='col-md-2' style='text-align:left;'>
                    <p class='salary-job-description'>Email:</p>
                    </div>
                    <div class='col-md-10' style='text-align:left;'>
                    <p class='salary-amount'><?php echo $job_email;?></p>
                    </div>
                    </div>
                    
                    </div>
    <input type="button" id="apply" value="Apply" data-company="<?php echo $companyId;?>" data-job="<?php echo $jobId;?>" >
<script src="../jquery-3.3.1.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="home.js"></script>  
        
        <script>
            $("#apply").click(function(){
                var company = $(this).attr("data-company");
                var job = $(this).attr("data-job");
                
                $.ajax({
                    type : "POST",
                    url  : "functions.php",
                    data : "check=jobApply&companyId="+ company +"&jobId="+job,
                    
                    success:function(result){
                        alert(result);
                        
                    }
                })
            })
            
        
        </script>
        
    </body>
</html>

