<?php
function checkLogin(){
    session_start();
    $user = $_SESSION['loggedInUser'];
    
    if ($user){
        echo"
       <div class='dropdown'>
<button onClick='myFunction();' class='dropbtn'>Welcome, $user  <i class='down'></i></button>
  <div id='myDropdown' class='dropdown-content'>
    <a id='logout-button' href='index.php'>Log Out</a>
    <a href='#about'>About</a>
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
