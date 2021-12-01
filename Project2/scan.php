<?php 
	include "inisiasi.php";
	require 'adminPermission.inc.php';

	if (isset($_POST['scanqr'])) {

		header("Location: $url/camscan.php");
        exit();
    }
	
	$result = mysqli_query($koneksi, "SELECT * FROM daftar_alat WHERE id_pinjam=$_SESSION[id]");
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Petrocode</title>
	<style>
		body{
			font-family: sans-serif;
			background-repeat: no-repeat;
        	background-image: url(bg.jpg);
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
		.auto {
		    display:none;
		    padding:5px;
		    margin-top:5px;
		    width:330px;
		    height:100px;
		    overflow:auto;
		}
		.auto:hover {
		    display:block;
		    padding:5px;
		    margin-top:5px;
		    width:330px;
		    height:100px;
		    overflow:auto;
		}
		.badge-notif {
	        position:absolute;
	        top : 5px;
	        right: 265px;
	        background-color: rgba(255,255,255,0.5);
	        height: 20px;
	        width: 20px;
	        border-radius: 8px;
	        padding: 0.5px;
		}
		.logo h5{
			padding-left: 3px;
			padding-bottom: 3px;
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
			<h5 class="badge-notif">
				<?php 							
							$datetime = new DateTime;
							$otherTZ = new DateTimeZone("Asia/Jakarta");
							$datetime->setTimezone($otherTZ);
							$date = $datetime->format('Y-m-d');

							$statement = $dbc->prepare("SELECT COUNT(nama_alat) as jumlah FROM (SELECT nama_alat, tgl_kalibrasi FROM kalibrasi, daftar_alat WHERE kalibrasi.id_alat=daftar_alat.id_alat AND DATE(kalibrasi.tgl_kalibrasi) >= :date order by kalibrasi.tgl_kalibrasi ASC) as A");
							$statement->execute(['date' => $date]);
							$data = $statement->fetchAll();
							foreach ($data as $row) {
								echo "{$row['jumlah']}";
							}
							?>
			</h5>
			<nav>
				<ul class="home">
					<li>
						<img src="gambar/notification.png">
						<ul class="auto">
							<?php 							
							$datetime = new DateTime;
							$otherTZ = new DateTimeZone("Asia/Jakarta");
							$datetime->setTimezone($otherTZ);
							$date = $datetime->format('Y-m-d');

							$statement = $dbc->prepare("SELECT nama_alat, tgl_kalibrasi FROM kalibrasi, daftar_alat WHERE kalibrasi.id_alat=daftar_alat.id_alat AND DATE(kalibrasi.tgl_kalibrasi) >= :date order by kalibrasi.tgl_kalibrasi ASC");
							$statement->execute(['date' => $date]);
							$data = $statement->fetchAll();
							foreach ($data as $row) {
								$kalibrasi = new DateTime($row["tgl_kalibrasi"]);
								$tgl = $kalibrasi->format("Y-m-d");
								
								echo "<a href=''><li>{$row['nama_alat']}</li></a>";
								echo "<p>Lakukan kalibrasi sebelum {$tgl}</p>";
							}
							?>
						</ul>
					</li>
					<a href="user.php" style="margin-right: 30px">Home</a>
					<a href="login.php">Logout</a>
				</ul>
			</nav>
		</div>
	</thead>
	<tbody>
		<div class="container-fluid" style="margin: 50px; padding:30px;
	width: calc(100% - 100px);">
		<h2>Daftar Alat</h2>
		<hr style="position: relative; border: none; height: 1px; background: #999;" />
		<form method="POST">
			<div class="form">
				<div class="col-md-12">
					<table class="table text-center align-middle">
							<tr>
								<th>No.</th>
								<th>Nama Alat</th>
								<th>Status</th>
								<th></th>
								<th></th>
							</tr>

							<?php $i = 1; ?>
							<?php 
								while ($row = mysqli_fetch_assoc($result)) : ?>
								<tr>
									<td><?=$i; ?></td>
									<td>
										<?= $row["nama_alat"] ?>
									</td>
									<td>Aktif</td>
									<td>
										<a href="rekan.php?id=<?= $row["nama_alat"] ?>"><button type="button" class="btn btn-secondary">Tambah Rekan</button></a>
									</td>
									<td>
										<a href="checkout.php?id=<?= $row["nama_alat"] ?>"><button type="button" class="btn btn-danger">Check out</button></a>
									</td>
								</tr>
								<?php $i++; ?>
							<?php 
								//endforeach; 
								endwhile;
							?>
							
						</table>
						<button type="submit" name="scanqr" value="scanqr" class="btn btn-secondary">SCAN QR</button>
					</div>
				</div>
			</form>
		</div>
	</tbody>
</body>
<footer>
	<div style="background-color: #939896 ; width: auto; height: auto;">
		<p style="text-align: center; font-family: sans-serif;"> Copyright &copy; 2021 ivfatusySyrani & rufinarahma</p>
	</div>
</footer>
</html>