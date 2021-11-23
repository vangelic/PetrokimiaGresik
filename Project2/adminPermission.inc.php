<?php
    include "inisiasi.php";
    session_start();
    if (!isset($_SESSION['isLogin'])) 
    {
        header("Location: $url/login.php");
        exit();
    }

    $waktu = new DateTime;
	$zona = new DateTimeZone("Asia/Jakarta");
	$waktu->setTimezone($zona);
	$tgl = $waktu->format('Y-m-d');

	$que = $dbc->prepare("SELECT nama_alat, tgl_kalibrasi FROM kalibrasi, daftar_alat WHERE kalibrasi.id_alat=daftar_alat.id_alat AND DATE(kalibrasi.tgl_kalibrasi) <= :date order by kalibrasi.tgl_kalibrasi ASC");
	$que->execute(['date' => $tgl]);
	$data = $que->fetchAll();
    foreach ($data as $row) {
		$db->update('daftar_alat', ['kondisi' => 'Belum Dikalibrasi'], ['nama_alat'=> $row['nama_alat']]);
	}
?>