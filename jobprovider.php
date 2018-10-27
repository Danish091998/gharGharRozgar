<?php 
include('connections.php');
$register = true;
?>
<!DOCTYPE html>
<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Job Provider</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">  
        
       <link href="https://fonts.googleapis.com/css?family=Poppins|Noto+Serif+KR|Scope+One" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    </head>
    
    <body style="background:#f5f5f5">
        <?php
        include("topBar.php");?>
        <div class="background-job-provider-page">
        <div class="wrapper-for-home-heading">
        <h1 id="page-title" class="home-heading">Looking To Hire?<br> We're Here To Help You!</h1>
        </div>
        </div>
        <h1 class="heading-for-text">Job Providers<hr class="heading-line"></h1>
        <div class="container text-wrapper">
            <p>
            I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.
            <br><br>
            This is a great space to write long text about your company and your services. You can use this space to go into a little more detail about your company. Talk about your team and what services you provide. Tell your visitors the story of how you came up with the idea for your business and what makes you different from your competitors. Make your company stand out and show your visitors who you are. Tip: Add your own image by double clicking the image and clicking Change Image.
            </p>
            <h4 class="sub-heading-text">Login or Register to start hiring.
            </h4>
            <button id="loginForProvider" class="login-button-page">Login</button>
            <button id="registerForProvider" class="register-button-page">Register</button>
        </div>
        <?php include('footer.php');?>
<script src="jquery-3.3.1.js" ></script>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script> 
<script src="home.js"></script>        
    </body>
</html>
