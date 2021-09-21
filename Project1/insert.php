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
	<title>Insert Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<style>
	.container{
		width: auto;
		text-align: center;
		margin: 5% auto;
		border-radius: 25px;
		background-color: rgba(255,255,255,0.5);
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
</style>

<body>
	<thead>
		<div class="logo">
			<img src="aset/Logonobg.png" width="140px" height="50px">
				<ul class="home">
					<a href="index" style="margin-right: 30px">Home</a>
					<a href="logout">Logout</a>
				</ul>
		</div>
	</thead>
	<tbody>
		<div class="container">
			<h2>INSERT DATA</h2>
			<hr style="position: relative; border: none; height: 1px; background: #999;" />
			<form class="row g-3" id="form" name="myForm" method="POST" enctype="multipart/form-data">
				<div class="col-md-6">
					<div class="mb-3">
						<label for="nm_lokal" class="form-label"><b>Nama Lokal</b></label>
	    				<input type="text" class="form-control" id="nm_lokal" name="nm_lokal" placeholder="Masukkan nama lokal" required>
					</div>
					<div class="mb-3">
						<label for="nm_latin" class="form-label"><b>Nama Latin</b></label>
	    				<input type="text" class="form-control" id="nm_latin" name="nm_latin" placeholder="Masukkan nama latin" required>
					</div>
					<div class="mb-3">
						<label for="deskripsi" class="form-label"><b>Deskripsi</b></label>
	    				<textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" rows="4" required></textarea>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-3">
						<label for="formFile" class="form-label"><b>Upload Foto</b></label>
						<input class="form-control" type="file" name="image" id="image" onchange="loadfile(event)" required>
					</div>
					<div class="mb-3">
						<img src="aset/placeholder_img.png" id="preimage" class="img-thumbnail w-100" style="height: 230px; object-fit:cover;" alt="image">
						<script type="text/javascript">
							function loadfile(event){
								var output = document.getElementById('preimage');
								output.src = URL.createObjectURL(event.target.files[0]);
							};
						</script>
					</div>
				</div>	
				<div class="text-end" >
					<button type="submit" name="upload" value="Upload" class="btn btn-success">INSERT</button>
				</div>		
			</form>
		</div>
	</tbody>
</body>
</html>