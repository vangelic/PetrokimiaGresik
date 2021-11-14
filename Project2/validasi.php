<?php

	$id = $_GET['id'];

	$statement = $dbc->prepare("DELETE FROM kalibrasi WHERE id_kalibrasi = :id");
	$statement->bindValue(':id', $id);
	$statement->execute() or die ('Error '.$statement->errorInfo()[2]);

	header("Location: $url/daftar_kalibrasi.php");
	exit();
?>