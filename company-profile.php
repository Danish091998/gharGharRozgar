<?php
include('connections.php');

$companyId= 38 ;

    
    if($companyId){

        $query  = "SELECT * FROM `companyRegister` WHERE `id` = '".$companyId."'";
        $result = mysqli_query($conn,$query);
        $row    = mysqli_fetch_array($result);

        $img_link   = $row['logoImage'];
        $email      = $row['email'];
        $mobile     = $row['mobileNumber'];
        $name       = $row['companyName'];
        $area       = $row['area'];
        $gender     = $row['city'];
        $birthdate  = $row['pincode'];
        $city       = $row['city'];
        $mobile2    = $row['mobileNumberOptional'];
    }


elseif(!$row && !$companyId){
   
    header("Location:index.php");       
}

        
     function jobsFetch(){
        global $companyId;
        global $name;
        if($companyId){
            global $conn;
            $query  = "SELECT * FROM `jobs` WHERE `ORG` = '".$name."'";
            $result = mysqli_query($conn,$query);

        while($org = mysqli_fetch_array($result) ){
        
        $job_id         = $org['ID'];
        $org_name       = $org['ORG'];
        $org_logo       = $org['logoImage'];
        $org_job        = $org['JOB'];
        $job_course     = $org['COURSE'];
        $job_field      = $org['FIELD'];
        $job_info       = $org['INFO'];
        $job_venue      = $org['ADDRESS'];
        
        echo "<div class=' row job-display-wrapper'> 
                <div class='col-xs-4 logo-image-wrapper'>
                    <img src='$org_logo' class='logo-image'>
                </div>
            <div class='col-xs-8 job-details-wrapper'>
                <span class = 'job-name'>$org_job</span><br>
                <span class = 'company-name'>$org_name</span><br>
                <span class = 'venue'><i id='location-icon' class='fa fa-map-marker'></i>$job_venue</span><br>
                </div>
                <div class='course-div'>
                <div class='test'>
                <b class = 'course-name'>Course Required : </b>
                </div><p class = 'course-name-display'>$job_course</p>
                </div>
                 <div class='course-div'>
                 <div class='test'>
                <b class = 'description'>Job Description: </b></div><div class='job-info-div'><p class = 'job-info'>$job_info</p></div>
                </div>
                <a class='know-more' href='jobDisplay.php?job=$job_id'>Know More</a>
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

        <title>Company Profile</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--        StyleSheet-->   
        <!--        Font Awesome-->
        <link href="style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">
    </head>
    <body>
        <h1>profile here</h1>
        <h1>jobs provided</h1>
        <?php jobsFetch();?>
    
<script src="../jquery-3.3.1.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="home.js"></script>  
        
    </body>
</html>
