<?php
include("connections.php");

$id = $GET['id'];

function userInfo()
    
    global $id;
    global $conn;

    if($id){
         $query  = "SELECT `EMAIL` FROM `forgotPassword` WHERE `USERKEY`= '$id'";
         $result = mysqli_query($conn,$query);
         
        if(mysqli_num_rows($result) = 1){
            
            
            
        }
           
}

?>