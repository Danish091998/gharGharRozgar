<?php
include('connections.php');

$jobId   = $_GET['job'];


        if($jobId){
        
        $query = "SELECT  jobs.cID, jobs.JOB, jobs.COURSE, jobs.FIELD, jobs.INFO,jobs.DATE,jobs.TIME,jobs.ADDRESS,jobs.SALARY,jobs.EMPTYPE,companyRegister.LOGOIMAGE,companyRegister.ID,companyRegister.NAME,companyRegister.PHONE,companyRegister.EMAIL,jobs.ID
        FROM jobs
        INNER JOIN companyRegister
        ON jobs.cID = companyRegister.ID WHERE jobs.ID='$jobId'";
            
        $result = mysqli_query($conn,$query);
        

        if($org = mysqli_fetch_array($result)){
                
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
                $job_mobile_no  = $org['PHONE'];
                $job_email      = $org['EMAIL'];
                $job_time       = $org['TIME'];
                $job_date       = $org['DATE'];
                
        }   
} 
?>

<!DOCTYPE html>
<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
         <meta property="og:url" content="kinitoapps.com/moneymanager" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Money Manager" />
  <meta property="og:description"   content="$job_info" />
  <meta property="og:image"         content="$org_logo" />

        <title>Jobs</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
        <!--        StyleSheet-->   
        <!--        Font Awesome-->
    <link rel="stylesheet" href="fontawesome-free-5.3.1-web/css/all.css" crossorigin="anonymous">
   
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
                <span class = 'venue margin-left' style='font-size:14px; position:relative; top:5px;'><i id='location-icon' class='fas fa-map-marker-alt'></i><?php echo $job_venue;?></span><br>
            </div>
            <input type="button" id="apply" class="apply-button" value="Apply Now" data-job="<?php echo $jobId;?>" data-time="<?php echo $job_time ;?>" data-date="<?php echo $job_date;?>">
              
            <div class='footer-job'>
                <p class='salary'><?php echo $job_salary;?></p>
                <p class='contact'><i class='fa fa-phone' aria-hidden='true' id='phone-icon'></i><?php echo $job_mobile_no;?></p>
                <div id="fb-root"></div><center>
            <div class="fb-share-button" 
            data-href="kinitoapps.com/moneymanager" 
            data-layout="button_count" data-size="large" data-mobile-iframe="true">
            </div>
                </center>
            </div>
            </div>
            <div class='job-description-wrapper'>     <p id='job-description'>Job Description</p>
                <p class='job-description-text'><?php echo $job_info;?></p>
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
                <p class='salary-job-description'>Address:</p>
            </div>
            <div class='col-md-10' style='text-align:left;'>
                <p class='salary-amount'><?php echo $job_venue;?></p>
            </div>
            </div>
            <div class='row' style='margin-bottom:5px;'>
            <div class='col-md-2' style='text-align:left;'>
                <p class='salary-job-description'>Interview Date:</p>
            </div>
            <div class='col-md-10' style='text-align:left;'>
                <p class='salary-amount'><?php echo $job_date;?></p>
            </div>
            </div>
            <div class='row' style='margin-bottom:5px;'>
            <div class='col-md-2' style='text-align:left;'>
                <p class='salary-job-description'>Interview Time:</p>
            </div>
            <div class='col-md-10' style='text-align:left;'>
                <p class='salary-amount'><?php echo $job_time;?></p>
            </div>
            </div>
            <div class='row' style='margin-bottom:30px;'>
            <div class='col-md-2' style='text-align:left;'>
                <p class='salary-job-description'>Employment Type:</p>
            </div>
            <div class='col-md-10' style='text-align:left;'>
                <p class='salary-amount'><?php echo $job_emp_type;?></p>
            </div>
            </div>
           
            
            
                <p id='job-description'>Course Required:</p><p class='job-description-text'><?php echo $job_course . " " . $job_field?></p>
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
    
<script src="jquery-3.3.1.js" ></script>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script> 
<script src="home.js"></script>  
        
        <script>
            $("#apply").click(function(){
                var job  = $(this).attr("data-job");
                var date = $(this).attr("data-date");
                var time = $(this).attr("data-time");

                $.ajax({
                    type : "POST",
                    url  : "functions.php",
                    data : "check=jobApply&date="+ date +"&time="+time+"&jobId="+job,
                    
                    success:function(result){
                        alert(result);
                        
                    }
                })
            });
            
            (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
        
        </script>
        
    </body>
</html>

