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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">   

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link href="style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">

    </head>
    
    <body style="background:#f9f9f9">
        <?php
        include('topbar.php');?>
        <div style="width:100%; margin:0" class="row">
        <div class=" col-md-3 left-side-bar">
            <hr class="profile-line">
            <a id="myAccount" class="profile-navigation">My Account</a>
            <hr class="profile-line">
            <a id="appHistory" class="profile-navigation">Applied Jobs</a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $("#editProfile").click(function(){
                $('#profile-section').load("editprofile.php" +  '#profile-section');
                });
            $("#myAccount").click(function(){
                $('#profile-section').load("includes/my-account-user.php" +  '#profile-section');
                });
            $("#appHistory").click(function(){
                $('#profile-section').load("includes/user-applied-jobs.php" +  '#profile-section');
                });
        </script>  

<script src="home.js"></script>
<script src="register.js"></script>  
<script type="text/javascript" src="profile.js"></script>        
    </body>
</html>

