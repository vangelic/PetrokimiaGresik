<?php
    require 'adminPermission.inc.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="TM_4.css">
    <title>Tugas Mingguan 4</title>
</head>

<body>    
    <table>
        <tr>
            <th colspan="4">DATA PRIBADI</th>
        </tr>
        <tr class='putih'><td colspan="4"></td></tr>
        <tr>
            <td rowspan="4" class="foto"><img src="image/me.JPEG" alt="me" width="100" height="150"></td>
            <td>Nama Panggilan</td>
            <td>:</td>
            <td>Iffa</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>Perempuan</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>Asrama C Kodim, Pamekasan</td>
        </tr>
        <tr>
            <td>Alamat Email</td>
            <td>:</td>
            <td><a href="mailto:ivfatusy@gmail.com">ivfatusy@gmail.com</a></td>
        </tr>
        <tr>
            <td class="mnu5"><a href="index.php">Halaman Utama</a></td>
            <td class='mnu1'><a href="private2.php">Detil Data 2</a></td>
            <td colspan="2" class='mnu4'><a href="logout.php">Logout</a></td>
        </tr>
    </table>
</body>

</html>