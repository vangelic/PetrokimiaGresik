<?php 
	include "inisiasi.php";
	require 'adminPermission.inc.php';

	$result = mysqli_query($koneksi, "SELECT checkin, checkout, nama_alat FROM history, daftar_alat WHERE history.id_alat=daftar_alat.id_alat AND checkout IS NOT NULL AND id_user=$_SESSION[id]");
?>

<!DOCTYPE html>
<html>
<head>
	<title>History User</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	</head>
	<style>
		body{
			font-family: sans-serif;
			background-image: url(bg.jpg);
			background-repeat: no-repeat;
			background-size: cover;
		}
		.container{
			width: auto;
			margin:5% auto;
			border-radius: 25px;
			background-color: rgba(255,255,255,0.7);
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
	nav ul li:hover .auto{
		display: block;
        width:300px;
        height:100px;
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
	    right: 265px;
	    background-color: rgba(255,255,255,0.5);
	    height: 20px;
	    width: 20px;
	    border-radius: 8px;
	    padding: 0.5px;
	}
	.logo h5{
		padding-left: 3px;
		margin-bottom: 3px;
	}
	</style>
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
			<div class="container">
				<div class="container-fluid" style="margin: 50px; padding:30px;
				width: calc(100% - 100px);">
						<h2>History Penggunaan</h2>
							<div class="data-tables datatable-dark">
								
							<table class="table table-borderes text-center align-middle" id="mauexport">
					<thead>
					<tr>
						<th>No.</th>
						<th>Nama Alat</th>
						<th>Waktu</th>
					</tr>
					</thead>
					<tbody>
					<?php $i = 1; ?>
					<?php 
						while ($row = mysqli_fetch_assoc($result)) : ?>
						<tr>
							<td><?=$i; ?></td>
							<td><?= $row["nama_alat"] ?></td>
							<td>
								<div class="card border-primary" style="max-width: 21rem;">
									<div class="card-body text-primary">
										<?php 
										$in = new DateTime($row["checkin"]);
										$masuk = $in->format("Y/m/d H:i");

										$out = new DateTime($row["checkout"]);
										$keluar = $out->format("Y/m/d H:i");
																			
										?>
										<p class="card-text"><?= $masuk ?>-<?= $keluar ?></p>
									</div>
								</div>
							</td>
						</tr>
						<?php $i++; ?>
					<?php 
						//endforeach; 
						endwhile;
					?>
					</tbody>
				</table>
								
				</div>
			</div>
				
			<script>
			$(document).ready(function() {
				$('#mauexport').DataTable( {
					dom: 'Bfrtip',
					buttons: [
						'excel', 'pdf', 'print'
					]
				} );
			} );

			</script>

			<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
			<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
			<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
			<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
			<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

			</div>
		</tbody>
	</body>
	<footer>
		<div style="background-color: #939896 ; width: auto; height: auto;">
			<p style="text-align: center; font-family: sans-serif;"> Copyright &copy; 2021 ivfatusySyrani & rufinarahma</p>
		</div>
	</footer>
</html>