<?php
include('connections.php');

$user = 8;

    
    if($user){

        $query  = "SELECT * FROM `users` WHERE `id` = '".$userId."'";
        $result = mysqli_query($conn,$query);
        $row    = mysqli_fetch_array($result);

        $img_link   = 'NULL';
        $email      = $row['email'];
        $mobile     = $row['mobile'];
        $first_name = $row['firstName'];
        $last_name  = $row['lastName'];
        $gender     = $row['gender'];
        $birthdate  = $row['birthDate'];
        $city       = $row['city'];
        $qual       = $row['qualification'];
        $course     = $row['course'];
        $field      = $row['field'];
        

    }
    
    
}

?>

<!DOCTYPE html>
<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jobs</title>

        <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--        StyleSheet-->   
        <!--        Font Awesome-->
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
         <?php
            fetchInfo();
        ?>    
    
<script src="../jquery-3.3.1.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="home.js"></script>  
        
    </body>
</html>
