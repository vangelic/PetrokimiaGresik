<?php
    include "inisiasi.php";
    session_start();
    unset($_SESSION['isAdmin']);
    header("Location: $url/login.php");
    exit();    
?>
