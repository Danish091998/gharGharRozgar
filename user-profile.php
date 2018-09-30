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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> 
   
<!--        <link href="../font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link href="style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">

    </head>
    
    <body style="background:#f9f9f9">
        <?php
        include('topbar.php');?>
        <div class="row">
        <div class=" col-md-3 left-side-bar">
            <hr class="profile-line">
            <a id="myAccount" class="profile-navigation">My Account</a>
            <hr class="profile-line">
            <a id="appHistory" class="profile-navigation">Application History</a>
            <hr class="profile-line">
            <a id="editProfile" class="profile-navigation">Manage Profile</a>
            <hr class="profile-line">
            <a id="logout" class="profile-navigation">Logout</a>
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
        </script>  
<script src="home.js"></script>
<script src="register.js"></script>  
<script type="text/javascript" src="profile.js"></script>        
    </body>
</html>

