<?php
    include "inisiasi.php";
    session_start();
    if (!isset($_SESSION['isAdmin'])) 
    {
        header("Location: $url/login.php");
        exit();
    }
?>