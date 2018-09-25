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

        <title>HomePage</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--        StyleSheet-->   
        
        <!--        Font Awesome-->
        
        <link href="style.css" rel="stylesheet">

    </head>
    
    <body>
        
        <?php
        include("topBar.php");?>
        <div class="home-background">
        <div class="wrapper-for-home-heading">
        <h1 class="home-heading">Ghar Ghar Rozgar</h1>
           
        <a class="home-anchor anchor1"><span class="tip-top-left"></span>Looking For JOB?</a>
        <a class="home-anchor anchor2"><span class="tip-top-right"></span>Looking To HIRE?</a>
        </div>
        </div>
<script src="../jquery-3.3.1.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="home.js"></script>        
    </body>
</html>
