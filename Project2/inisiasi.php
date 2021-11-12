<?php require "vendor/autoload.php";
    date_default_timezone_set('Asia/Jakarta');

    $dbc = new PDO('mysql:host=localhost;dbname=pg2', 'root', '');
    $koneksi = mysqli_connect("localhost","root","","pg2");
    $db = \ParagonIE\EasyDB\Factory::create('mysql:host=localhost;dbname=pg2', 'root', '');

    $url = 'http://localhost/PetrokimiaGresik/Project2';
?>