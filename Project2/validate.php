<?php

use function PHPSTORM_META\type;
include "inisiasi.php";
	$id = $_GET['id'];

	try {
		$result = mysqli_query($koneksi, "SELECT * FROM `daftar_alat` WHERE id_alat=$id");
		$row = mysqli_fetch_assoc($result);
		$db->update('daftar_alat', ['kondisi' => Null], ['id_alat'=> $row['id_alat']]);

	} catch(PDOException $e){
        echo 'Error : '.$e->getMessage();
        exit();
    }
	
	header("Location: $url/daftar_alat.php");
	exit();
?>