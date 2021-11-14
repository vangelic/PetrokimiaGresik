<?php

use function PHPSTORM_META\type;
include "inisiasi.php";
	$id = $_GET['id'];

	try {
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