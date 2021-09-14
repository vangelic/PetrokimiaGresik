<?php
    session_start();
    if (!isset($_SESSION['isAdmin'])) 
    {
        header("Location: http://{$_SERVER['HTTP_HOST']}/5.%20PAW/TM4/login.php");
        exit();
    }
?>