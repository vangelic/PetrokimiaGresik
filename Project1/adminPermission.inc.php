<?php
    session_start();
    if (!isset($_SESSION['isAdmin'])) 
    {
        header("Location: http://{$_SERVER['HTTP_HOST']}/PetrokimiaGresik/Project1/login.php");
        exit();
    }
?>