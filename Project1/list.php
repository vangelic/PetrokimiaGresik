<?php 
	include "inisiasi.php";
	require 'adminPermission.inc.php';
	
//require 'functions.php';

//array ambil dari database
//$result = query("SELECT * FROM info_tanaman");

//koneksi ke database


//ambil data dari tabel info_tanaman
$result = mysqli_query($koneksi, "SELECT * FROM pgpedia");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Petrocode</title>
	<style>
		body{
			font-family: sans-serif;
			background-image: url(aset/bg.jpg);
			background-repeat: no-repeat;
			background-size: cover;
		}
		.container-fluid{
    	border-radius: 25px;
    	background-color: rgba(255,255,255,0.8);
    	box-shadow: 0 0 17px #333;
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

	</style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
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
		<div class="container-fluid" style="margin: 50px; padding:30px;
	width: calc(100% - 100px);">
		<h2>Daftar Tanaman</h2>
		<hr style="position: relative; border: none; height: 1px; background: #999;" />
		<table class="table text-center align-middle">
				<tr>
					<th>No.</th>
					<th>Aksi</th>
					<th>Nama</th>
					<th>Link</th>
					<th>QR Code</th>
				</tr>

				<?php $i = 1; ?>
				<?php 
					while ($row = mysqli_fetch_assoc($result)) : ?>
					<tr>
						<td><?=$i; ?></td>
						<td>
							<a href="#">Ubah</a> | <a href="#">Hapus</a>
						</td>
						<td><?= $row["nama_lokal"] ?></td>
						<td>
							<a href="user?id=<?php echo $row["id"] ?>">user?id=<?php echo $row["id"] ?></a>
						</td>
						<td>
							<?php
								$kode = "$url/user?id=".$row["id"]."";
								require_once("qrcode/qrlib.php");
							
								QRcode::png("$kode","pgqrcode/qr".$row["id"].".png","M", 10,3);
							?>
							<img src="pgqrcode/qr<?php echo $row["id"] ?>.png" alt="" style="width:100px;">
						</td>
					</tr>
					<?php $i++; ?>
				<?php 
					//endforeach; 
					endwhile;
				?>
				
			</table>
		</div>
	</tbody>
</body>
</html>