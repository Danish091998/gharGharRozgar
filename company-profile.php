<?php
include('connections.php');
$register=true;
        
     function jobsFetch(){
        global $companyEmail;
        global $name;
        if($companyEmail){
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

        <title>Comapny Profile</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
<link href="select2-4.0.6-rc.0/dist/css/select2.min.css" rel="stylesheet" /> 
   
        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css">
        <link href="style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">

    </head>
    
    <body style="background:#f9f9f9">
        <?php
        include('topbar.php');?>
        <div style="width:100%; margin:0;" class="row">
        <div class=" col-md-3 left-side-bar">
            <hr class="profile-line">
            <a id="myAccount" class="profile-navigation">My Account</a>
            <hr class="profile-line">
            <a href="new-job.php" target="_blank" id="newJob" class="profile-navigation">Add New Job</a>
            <hr class="profile-line">
            <a id="editProfile" class="profile-navigation">Manage Profile</a>
            <hr class="profile-line">
            <a id="addedJobs" class="profile-navigation">Added Jobs</a>
            <hr class="profile-line">
            <a href="logout.php" id="logout" class="profile-navigation">Logout</a>
            <hr class="profile-line">
        </div>
            <div id="profile-section" class=" col-md-9 profile-wrapper">
                <?php include('includes/my-account-company.php')?>
            </div>     
                
        </div>        
<script src="jquery-3.3.1.js"></script>
<script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="select2-4.0.6-rc.0/dist/js/select2.min.js"></script>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script>
        
            $("#editProfile").click(function(){
                $('#profile-section').load("includes/edit-profile-company.php" +  '#profile-section');
                });
            $("#myAccount").click(function(){
                $('#profile-section').load("includes/my-account-company.php" +  '#profile-section');
                });
            $("#addedJobs").click(function(){
                $('#profile-section').load("includes/added-jobs-company.php" +  '#profile-section');
                });
        </script>
<script src="home.js"></script>
<script src="register.js"></script>
<script type="text/javascript" src="profile.js"></script>
    </body>
</html>


