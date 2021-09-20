<?php 
	require 'adminPermission.inc.php';
	
//require 'functions.php';

//array ambil dari database
//$result = query("SELECT * FROM info_tanaman");

//koneksi ke database
$koneksi = mysqli_connect("localhost","root","","pg1");

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
			overflow: hidden;
			background-size: cover;
		}
		.container{
			width: 480px;
			margin: 5% auto;
			border-radius: 25px;
			background-color: rgba(255,255,255,0.5);
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
</head>
<body>
	<thead>
		<div class="logo">
			<img src="Logonobg.png" width="140px" height="50px">
				<ul class="home">
					<a href="home.php" style="margin-right: 30px">Home</a>
					<a href="logout.php">Logout</a>
				</ul>
		</div>
	</thead>
	<tbody>
		<div class="container">
		<h2>Daftar Tanaman</h2>
		<hr style="position: relative; border: none; height: 1px; background: #999;" />
			<table border="1" cellpadding="10" cellspacing="0">
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
							<a href="user.php?id=<?php echo $row["id"] ?>">user.php?id=<?php echo $row["id"] ?></a>
						</td>
						<td>
							<?php
								$kode = "user.php?id=".$row["id"]."";
								require_once("qrcode/qrlib.php");
							
								QRcode::png("$kode","qr".$row["id"].".png","M", 2,2);
							?>
							<img src="qr<?php echo $row["id"] ?>.png" alt="">
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