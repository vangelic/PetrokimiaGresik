<?php require "vendor/autoload.php";
    $dbc = new PDO('mysql:host=localhost;dbname=pg2', 'root', '');
    $koneksi = mysqli_connect("localhost","root","","pg2");
    $db = \ParagonIE\EasyDB\Factory::create('mysql:host=localhost;dbname=pg2', 'root', '');

    $url = 'http://localhost/PetrokimiaGresik/Project2';
?>