<?php
	include "inisiasi.php";
    require 'adminPermission.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/484db9065f.js" crossorigin="anonymous"></script>
</head>
<style>
	body{
		font-family: sans-serif;
		background-image: url(bg.jpg);
		background-repeat: no-repeat;
		background-size: cover;
	}
	.header{
		text-align: center;
		padding-top: 50px;
		margin-left: 0px;
		padding-bottom: 50px;
	}
	.container{
		width: 800px !important;
		margin:5% auto;
		border-radius: 25px;
		background-color: rgba(255,255,255,0.5);
		box-shadow: 0 0 17px #333;
	}
	.main button{
		padding-left: 0;
		background-color:  #4b4e4d;
		letter-spacing: 2px;
		font-weight: bold;
		width: 200px;
		height: 200px;
		margin-top: 10px;
		margin-bottom: 30px;
		border-radius: 15px ;
		margin-left: 30px;
		margin-right: 30px;
	}
	.main img{
		width: 120px; 
		height: 120px;
		margin-bottom: 15px;
	}
	.main a{
		color: white;
		font-size: 20px;
	}
	.main button:hover{
		box-shadow: 2px 5px 5px #555;
		background-color: #8a8f8d;
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
	nav ul li:hover .auto{
		display: block;
        width:300px;
        height:200px;
        overflow:auto;
        background-color: #ffff;
        border-radius: 5px;
	}
	nav ul li ul{
		display: none;
	}
	nav ul li ul li{
		width: 250px;
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
        right: 305px;
        background-color: rgba(255,255,255,0.5);
        height: 20px;
        width: 15px;
        border-radius: 8px;
        padding: 0.5px;
	}
	.logo h3{
		padding-left: 3px;
	}
</style>
<body>
	<thead>
		<div class="logo">
			<img src="aset/Logonobg.png" width="140px" height="50px">
			<h3 class="badge-notif">
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
			</h3>
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
		<div class="container">
			<div class="header">
				<div style="background-color: #939896">
					<h1>USER</h1>
				</div>
			</div>
			<div class="main">
				<form>
					<button formaction="scan.php">
						<img src="gambar/scanner.png"><br>
						<a href="scan.php">SCAN</a>
					</button>
					<button formaction="user_statusalat.php">
						<img src="gambar/status_alat.png"><br>
						<a href="user_statusalat.php">STATUS ALAT</a>
					</button>
					<button formaction="user_history.php">
						<img src="gambar/historyy.png"><br>
						<a href="user_history.php">HISTORY</a>
					</button>
				</form>
			</div>
		</div>
	</tbody>
</body>
<footer>
	<div style="background-color: #939896 ; width: auto; height: auto;">
		<p style="text-align: center; font-family: sans-serif;"> Copyright &copy; 2021 ivfatusySyrani & rufinarahma</p>
	</div>
</footer>
</html>
