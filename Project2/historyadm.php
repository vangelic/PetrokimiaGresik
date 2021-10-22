<?php

	include "inisiasi.php";
	require 'adminPermission.inc.php';

    if (isset($_POST['upload'])) {

		//upload foto
		$target = "image/".basename($_FILES['image']['name']);

		if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) die('Gagal');

        $statement = $dbc->prepare("INSERT INTO pgpedia (gambar, nama_lokal, nama_latin, deskripsi) VALUES(:gambar, :nama, :latin, :desk)");
        $statement->bindValue(':gambar',$_FILES['image']['name']);
        $statement->bindValue(':nama', $_POST['nm_lokal']);
		$statement->bindValue(':latin', $_POST['nm_latin']);
		$statement->bindValue(':desk', $_POST['deskripsi']);
        $statement->execute() or die ('Error '.$statement->errorInfo()[2]);

		$id = $dbc->lastInsertId();

		header("Location: $url/pgcode?id=$id");
        exit();
    }

?>

<!DOCTYPE html>
<html>

<head>
	<title>History Admin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<style>
	.container{
		width: 450px;
		text-align: center;
		margin: 5% auto;
		border-radius: 25px;
		background-color: rgba(255,255,255,0.9);
		box-shadow: 0 0 17px #333;
	}
	.text-end{
		margin-bottom: 15px;
	}
	.home{
		float: right;
		display: inline-block;
		width: 200px;
		height: 50px;
		list-style: none;
		line-height: 50px;	
		color: black;
		text-align: center;
		font-size: 20px;
	}
	body{
		background-image: url(aset/bg.jpg);
		font-family: sans-serif;
		background-repeat: no-repeat;
		overflow: hidden;
		background-size: cover;
	}
	button{
		border-radius: 5px;
		margin-bottom: 25px;
	}
	table{
		border-style: double;
		margin-bottom: 20px;
		margin-left: 25px;
	}
	h2{
		text-align: left;
		font-style: bold;
		font-family: serif;
		margin: 10px;
	}
</style>

<body>
	<thead>
		<div class="logo">
			<img src="aset/Logonobg.png" width="140px" height="50px">
				<ul class="home">
					<a href="login.php">Logout</a>
				</ul>
		</div>
	</thead>
	<tbody>
		<div class="container">
			<h2>History Penggunaan</h2>
			<input class="search" type="text" placeholder="Cari..." required>
			<input class="button" type="button" value="Cari">
			<hr style="position: relative; border: none; height: 1px; background: #999;" />
			<form>
				<table>
					<tr>
						<th>No.</th>
						<th>Nama Alat</th>
						<th>Waktu</th>
						<th>Pengguna</th>
					</tr>
					<tr>
						<td>1</td>
						<td>Oven</td>
						<td>10/07/2021 09.15 - 12.00</td>
						<td>Mbak Cici</td>
					</tr>
				</table>
				<button><a href="admin.php">Kembali</a></button>
				<button><a href="#">Insert</a></button>
			</form>
		</div>
	</tbody>
</body>
</html>