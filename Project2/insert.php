<?php

	include "inisiasi.php";
	require 'adminPermission.inc.php';

    if (isset($_POST['upload'])) {

		if ($_POST['jenis']=='custom'){
			$statement = $dbc->prepare("INSERT INTO kategori (nama_kategori, jumlah) VALUES(:kategori, 1)");
			$statement->bindValue(':kategori', $_POST['nm_kategori']);
			$statement->execute() or die ('Error '.$statement->errorInfo()[2]);

			$id = $dbc->lastInsertId();
			$nama = $_POST['nm_kategori'].'1';
		} else {
			$statement = $dbc->prepare("UPDATE kategori SET jumlah=jumlah+1 WHERE id_kategori=:kategori");
			$statement->bindValue(':kategori', $_POST['jenis']);
			$statement->execute() or die ('Error '.$statement->errorInfo()[2]);

			$query = $dbc->prepare("SELECT id_kategori, nama_kategori, jumlah FROM kategori WHERE id_kategori=:kategori");
			$query->bindValue(':kategori', $_POST['jenis']);
			$query->execute() or die ('Error '.$query->errorInfo()[2]);
			foreach ($query as $row) {
				
				$id = $row['id_kategori'];
				$nama = $row['nama_kategori'].$row['jumlah'];
			}
		}

		$statement = $dbc->prepare("INSERT INTO daftar_alat (nama_alat, id_kategori, qr) VALUES(:alat, :id, :qr)");
			$statement->bindValue(':alat', $nama);
			$statement->bindValue(':id', $id);
			$statement->bindValue(':qr', $nama.".png");
			
			$statement->execute() or die ('Error '.$statement->errorInfo()[2]);

		header("Location: $url/pgcode.php?id=$nama");
        exit();
    }

?>

<!DOCTYPE html>
<html>

<head>
	<title>Insert Data</title>
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
	.form{
		text-align: left;
		margin-left: 50px;
		margin-bottom: 10px;

	}
	.text-end{
		margin-bottom: 15px;
	}
	.home{
		float: right;
		display: inline-block;
		width: 350px;
		height: 50px;
		list-style: none;
		line-height: 50px;	
		color: black;
		text-align: center;
		font-size: 20px;
	}
	.home img{
		width: 30px;
		height: 30px;
	}
	body{
		background-image: url(bg.jpg);
		font-family: sans-serif;
		background-repeat: no-repeat;
		overflow: hidden;
		background-size: cover;
	}
	button{
		border-radius: 5px;
		margin-bottom: 25px;

	}
	nav{
		width: 50%;
		height: 30px;
		border : 0px solid;
		line-height: 30px;
		float: right;
	}
	nav ul li{
		width: 20%;
		height: 30px;
		float: left;
		list-style: none;
		margin-bottom: 5px;
	}
	nav ul li:hover ul{
		display: block;
	}
	nav ul li ul{
		display: none;
	}
	nav ul li ul li{
		width: 300px;
		height: 40px;
		background-color: #ffff;
		margin-bottom: 2px;
		border-style: solid !important;
		text-align: left !important;
	}
</style>

<body>
	<thead>
		<div class="logo">
			<img src="aset/Logonobg.png" width="140px" height="50px">
			<nav>
				<ul class="home">
					<li>
						<img src="gambar/notif.png">
						<ul>
							<a href=""><li>Notif 1</li></a>
							<a href=""><li>Notif 2</li></a>
							<a href=""><li>Notif 3</li></a>
						</ul>
					</li>
					<a href="admin.php" style="margin-right: 30px">Home</a>
					<a href="login.php">Logout</a>
				</ul>
			</nav>
		</div>
	</thead>
	<tbody>
		<div class="container">
			<h2>INSERT DATA</h2>
			<hr style="position: relative; border: none; height: 1px; background: #999;" />
			<form method="POST">
				<div class="form">
					<div class="col-md-6">
						<div class="mb-3">
							<label><b>Nama Alat</b></label><br>
							<select class="form-select" aria-label="Default select example" name="jenis" id="jenis">
							<option selected disabled value="">Open this select menu</option>
								<?php 
									$statement = $dbc->prepare("SELECT id_kategori, nama_kategori FROM kategori ");
									$statement->execute() or die ('Error '.$statement->errorInfo()[2]);
									
									foreach ($statement as $row) {
										echo "<option value={$row['id_kategori']}>{$row['nama_kategori']}</option>";
									}
									echo "<option value='custom'>Tambah Lainnya</option>"
								?>
							</select>
						</div>
						<div class="mb-3">
							<input type="text" class="form-control" id="nm_kategori" name="nm_kategori" placeholder="Masukkan nama alat">
						</div>

						<button type="submit" name="upload" value="Upload" class="btn btn-success">INSERT</button>
					</div>
				</div>
			</form>
		</div>
	</tbody>
</body>
</html>