<?php
function checkLogin(){
    session_start();
    $user = $_SESSION['userName'];
    $cUser = $_SESSION['CompanyName'];
    if($user){
        $userDisplay = 'user-profile.php';
    }
    if($cUser){
        $userDisplay = 'company-profile.php';
    }
    if ($user || $cUser){
        echo"
       <div class='dropdown'>
<button onClick='myFunction();' class='dropbtn'>Welcome, $user $cUser <i class='down'></i></button>
  <div id='myDropdown' class='dropdown-content'>
    <a id='logout-button' href='index.php'>Log Out</a>
    <a href='$userDisplay'>Your Profile</a>
    <a href='#contact'>Contact</a>
  </div>
</div>
        ";        
    }
    else{
        global $register;
        if($register){
        echo"
        <button class='login-button'>login</button>
        <button class='signup-button'>Register</button>
        ";
    }
        }
}
?>
