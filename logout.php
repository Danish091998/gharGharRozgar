<?php

include('connections.php');
    session_start();

    // clear all session variables
    session_unset();

    // destroy the session
    session_destroy();


?>