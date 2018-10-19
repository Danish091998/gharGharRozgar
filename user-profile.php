<?php
$register=true;
include('connections.php');
?>
<!DOCTYPE html>
<html>
    
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User Profile</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="fontawesome-free-5.3.1-web/css/all.css" crossorigin="anonymous">   

        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css">
        <link href="style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">
        <link href="select2-4.0.6-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    </head>
    
    <body style="background:#f9f9f9">
        <?php
        include('topbar.php');?>
        <div style="width:100%; margin:0" class="row">
        <div class=" col-md-3 left-side-bar">
            <hr class="profile-line">
            <a id="myAccount" class="profile-navigation">My Account</a>
            <hr class="profile-line">
            <a id="addedJobs" class="profile-navigation">Applied Jobs</a>
            <hr class="profile-line">
            <a id="editProfile" class="profile-navigation">Manage Profile</a>
            <hr class="profile-line">
            <a href="logout.php" id="logout" class="profile-navigation">Logout</a>
            <hr class="profile-line">
        </div>
            <div id="profile-section" class=" col-md-9 profile-wrapper">
                <?php include('includes/my-account-user.php');?>
            </div>
        </div>        
<script src="jquery-3.3.1.js"></script>
<script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="select2-4.0.6-rc.0/dist/js/select2.min.js"></script>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $("#editProfile").click(function(){
                $('#profile-section').load("includes/edit-profile-user.php" +  '#profile-section');
                });
            $("#myAccount").click(function(){
                $('#profile-section').load("includes/my-account-user.php" +  '#profile-section');
                });
            $("#addedJobs").click(function(){
                $('#profile-section').load("includes/user-applied-jobs.php" +  '#profile-section');
                });
            
        </script>  
<script src="select2-4.0.6-rc.0/dist/js/select2.min.js"></script>
<script src="home.js"></script>
<script src="register.js"></script>  
<script type="text/javascript" src="profile.js"></script>        
    </body>
</html>

