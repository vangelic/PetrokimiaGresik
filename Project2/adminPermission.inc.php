<?php
    include "inisiasi.php";
    session_start();
    if (!isset($_SESSION['isLogin'])) 
    {
        header("Location: $url/login.php");
        exit();
    }
?>