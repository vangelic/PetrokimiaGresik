<?php 
//require 'functions.php';

//array ambil dari database
//$result = query("SELECT * FROM info_tanaman");

//koneksi ke database
$koneksi = mysqli_connect("localhost","root","","dbproject");

//ambil data dari tabel info_tanaman
$result = mysqli_query($koneksi, "SELECT * FROM info_tanaman");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Petrocode</title>
	<style>
		body{
			font-family: sans-serif;
			background-image: url(bg.jpg);
			background-repeat: no-repeat;
			overflow: hidden;
			background-size: cover;
		}
		.container{
			width: auto;
			margin: 5% auto;
			border-radius: 25px;
			background-color: rgba(255,255,255,0.5);
			box-shadow: 0 0 17px #333;
		}

	</style>
</head>
<body>
	<thead>
		<div class="logo">
			<img src="Logonobg.png" width="140px" height="50px">
				<a href="home.php" style="margin-left: 1200px">Home</a>
				<a href="logout.php" style="margin-left: 30px">Logout</a>
		</div>
	</thead>
	<tbody>
		<div class="container">
			<h1>Daftar Tanaman</h1>
			<table border="1" cellpadding="10" cellspacing="0">
				<tr>
					<th>No.</th>
					<th>Aksi</th>
					<th>Nama</th>
					<th>Link</th>
				</tr>

				<?php $i = 1; ?>
				<?php 
					while ($row = mysqli_fetch_assoc($result)) : ?>
					<tr>
						<td><?=$i; ?></td>
						<td>
							<a href="#">Ubah</a> | <a href="#">Hapus</a>
						</td>
						<td><?= $row["nama"] ?></td>
						<td>
							<?= $row["link"]?>
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