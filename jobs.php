<?php 
include('connections.php');
$register=true;
session_start();
$user = $_SESSION['userEmail'];
function jobNumber(){
global $conn;
global $user;
if(!$user){
    $query  = "SELECT `ID` FROM `jobs`";
    $result = mysqli_query($conn, $query);
    $number = mysqli_num_rows($result);
    echo "<div class='alert alert-info' style='margin:0 auto; max-width:340px;'>There are total $number jobs available currently.</div><br>";
    echo"<center> 
    <button id='loginForSeeker' class='login-button-page'>Login</button>
            <button id='registerForSeeker' class='register-button-page'>Register</button></center>";
}
else{ echo "<center>
                <button id='prefJobsButton' class='filter-buttons'>Jobs according to your prefernce</button>
                <button id='allJobsButton' class='filter-buttons'>Jobs all over punjab</button>
                </center>";
    }
    }
?>
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
            <div id="jobs">
            <?php jobNumber();?> 
            <div id="job-section">
             <?php include('preferred-jobs.php'); ?>
            </div>
            </div>
        </div>
<script src="jquery-3.3.1.js" ></script>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="home.js"></script>  
<script type="text/javascript">   
    
    $("#prefJobsButton").click(function(){
   $(this).css({"color":"white","background":"#00aff0"});
    $("#allJobsButton").css({"color":"#f04100","background":"#f9f9f9"});
    $('#job-section').load("preferred-jobs.php" +  '#job-section');
});
    $("#allJobsButton").click(function(){
   $(this).css({"color":"white","background":"#f04100"});
    $("#prefJobsButton").css({"color":"#00aff0","background":"#f9f9f9"});
    $('#job-section').load("all-jobs.php" +  '#job-section');
});
   
        </script>
    </body>
</html>