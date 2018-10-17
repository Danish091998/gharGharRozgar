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
<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
        <!--        StyleSheet-->   
        
       <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">

    </head>
    
    <body style="background:#f7f7f7;">
        <div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
  </div>
         <div id="content">
        <?php
        include("topBar.php");?>
        <div class="home-background">
        <div class="wrapper-for-home-heading">
        <h1 class="home-heading">Welcome To  <br>Ghar Ghar Rozgar</h1>
           
        <a href="jobseeker.php" class="home-anchor anchor1"><span class="tip-top-left"></span>Looking For JOB?</a>
        <a href="jobprovider.php" class="home-anchor anchor2"><span class="tip-top-right"></span>Looking To HIRE?</a>
        </div>
        </div>
        </div>
<!--        <footer class="footer">Test</footer>-->
    
<script src="jquery-3.3.1.js" ></script>
<script src="bootstrap-4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script> 
        <script>
        
            document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
       document.getElementById('content').style.visibility="hidden";
 
      $('html, body').css({
  'overflow': 'hidden',
  'height': '100%'
})
  } else if (state == 'complete') {
      setTimeout(function(){
         document.getElementById('interactive');
          $('body').addClass('loaded');
         document.getElementById('loader-wrapper').style.visibility="hidden";
         document.getElementById('content').style.visibility="visible";
         
          $('html, body').css({
  'overflow': 'auto',
  'height': '100%'
})
       
      },1000);
   
   
   
  }
}
            
        </script>
<script src="home.js"></script>        
    </body>
</html>
