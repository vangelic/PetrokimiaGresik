<?php

use function PHPSTORM_META\type;
include "inisiasi.php";
	$id = $_GET['id'];

	try {
		$result = mysqli_query($koneksi, "SELECT id_kalibrasi, kalibrasi.id_alat, nama_alat FROM `kalibrasi`, daftar_alat WHERE kalibrasi.id_alat = daftar_alat.id_alat AND id_kalibrasi=$id");
		$row = mysqli_fetch_assoc($result);
		$db->update('daftar_alat', ['kondisi' => Null], ['nama_alat'=> $row['nama_alat']]);

		$statement = $dbc->prepare("DELETE FROM kalibrasi WHERE id_kalibrasi = :id");
		$statement->bindValue(':id', $_GET['id']);
		$statement->execute();
	} catch(PDOException $e){
        echo 'Error : '.$e->getMessage();
        exit();
    }
	
	header("Location: $url/daftar_kalibrasi.php");
	exit();
?>