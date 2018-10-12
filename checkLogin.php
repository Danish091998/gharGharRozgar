<link rel="stylesheet" href="fontawesome-free-5.3.1-web/css/all.css" crossorigin="anonymous">
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
<button onClick='myFunction();' class='dropbtn'>Welcome, $user $cUser </button><i id='arrow' class='down'></i>
  <div id='myDropdown' class='dropdown-content'>
    <a id='userDisplay' href='$userDisplay'><i id='profile-icon' class='fas fa-user-circle'></i>My Profile</a><hr id ='dropdown-hr'>
    <a id='logout-button' href='logout.php'><i id='logout-icon' class='fas fa-sign-out-alt'></i>Log Out</a>
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
