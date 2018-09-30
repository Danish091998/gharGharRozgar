<?php

include('connections.php');
if( isset( $_COOKIE[ session_name() ] ) ) {
        
        // empty the cookie
        setcookie( session_name(), '', time()-86400, '/' );
        
    }
    session_start();

    // clear all session variables
    session_unset();

    // destroy the session
    session_destroy();
    header('Location:index.php');
?>