<?php

	$id = $_GET['id'];

	echo $id;

	$statement = $dbc->prepare("DELETE FROM kalibrasi WHERE id_kalibrasi = :id");
	$statement->bindValue(':id', $id);
	$statement->execute();
	
	header("Location: $url/daftar_kalibrasi.php");
	exit();
?>