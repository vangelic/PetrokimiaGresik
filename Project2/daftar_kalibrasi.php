<?php 
	include "inisiasi.php";
	require 'adminPermission.inc.php';

	if (isset($_POST['kalibrasi'])) {

		header("Location: $url/kalibrasi.php");
        exit();
    }

	$result = mysqli_query($koneksi, "SELECT id_kalibrasi, nama_alat, tgl_kalibrasi FROM kalibrasi, daftar_alat WHERE kalibrasi.id_alat=daftar_alat.id_alat ORDER BY tgl_kalibrasi ASC");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Status Alat</title>
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
		width: auto;
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
					<a href="admin.php" style="margin-right: 30px">Home</a>
					<a href="login.php">Logout</a>
				</ul>
			</nav>
		</div>
	</thead>
	<tbody>
		<div class="container">
			<div class="container-fluid" style="margin: 50px; padding:30px;
		width: calc(100% - 100px);">
			<h2>Jadwal Kalibrasi</h2>
			<hr style="position: relative; border: none; height: 1px; background: #999;" />
			<form method="POST">
				<div class="form">
					<div class="col-md-12">
						<table class="table text-center align-middle">
								<tr>
									<th>No.</th>
									<th>Nama Alat</th>
									<th>Waktu</th>
									<th colspan="2">Keterangan</th>
								</tr>

								<?php $i = 1; ?>
								<?php 
									while ($row = mysqli_fetch_assoc($result)) : ?>
									<tr>
										<td><?=$i; ?></td>
										<td><?= $row["nama_alat"] ?></td>
										<td>
											<div class="card border-primary" style="max-width: 16rem;">
												<div class="card-body text-primary">
													<?php 
														$in = new DateTime($row["tgl_kalibrasi"]);
														$tgl = $in->format("Y-m-d");
													?>
													<p class="card-text"><?= $tgl ?></p>
												</div>
											</div>
										</td>
										<td>
											<?php
											echo "<a href=".$url."/validasi.php?id=".$row['id_kalibrasi'].">";
											?>
												<button type="button" class="btn btn-primary">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
													<path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
													<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
													</svg>
												</button>
											</a>
										</td>
										<td>
										<?php 

											$datetime = new DateTime;
											$otherTZ = new DateTimeZone("Asia/Jakarta");
											$datetime->setTimezone($otherTZ);
											$date = $datetime->format('Y-m-d H:i:s');

											$temp = new DateTime($row["tgl_kalibrasi"]);
											$kal = $in->format("Y-m-d H:i:s");

											$now = date('Y-m-d', strtotime($date));

											$cek = date('Y-m-d', strtotime($kal));
												
											if ($now >= $cek){
										?>
												<div class="card text-white bg-danger mb-3" style="max-width: 16rem;">
													<div class="card-body">
														<p class="card-text">Melewati Deadline</p>
													</div>
												</div>
										<?php
											}else if (date('Y-m-d',strtotime("tomorrow")) == $cek) {
										?>
											<div class="card text-white bg-warning mb-3" style="max-width: 16rem;">
												<div class="card-body">
													<p class="card-text">Kurang 1Hari</p>
												</div>
											</div>
										<?php
											}
										?>
										</td>
									</tr>
									<?php $i++; ?>
								<?php 
									//endforeach; 
									endwhile;
								?>
							</table>
							<button type="submit" name="kalibrasi" value="Kalibrasi" class="btn btn-success">Tambah Kalibrasi</button>
						</div>
					</div>
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