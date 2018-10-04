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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--        StyleSheet-->   
        
        <!--        Font Awesome-->
       <link href="https://fonts.googleapis.com/css?family=Poppins|Noto+Serif+KR|Scope+One" rel="stylesheet">

    </head>
    
    <body style="background:#e5e5e5">
        <?php
        include("topBar.php");?>
        <div class="background-job-provider-page">
        <div class="wrapper-for-home-heading">
        <h1 style="font-size:35px" class="home-heading">Recruiting?<br> WE’RE ON THE JOB!!</h1>
        </div>
        </div>
        <div class="container text-wrapper">
            <h1 class="heading-for-text">Job Providers</h1>
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
<script src="../jquery-3.3.1.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="home.js"></script>        
    </body>
</html>
