<?php

	$id = $_GET['id'];

	$str_id = (int)$id;

	try {
		$statement = $dbc->prepare("DELETE FROM kalibrasi WHERE id_kalibrasi = :id");
		$statement->bindValue(':id', $str_id);
		$statement->execute();
		$foo = $statement->fetchAll();
	} catch (Exception $e) {
		die("Oh noes! There's an error in the query!");
	}
	
	header("Location: $url/daftar_kalibrasi.php");
	exit();
?>