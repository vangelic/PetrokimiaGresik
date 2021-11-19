<html>
<head>
    <title>QRCode Scanner</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
  	<thead>
		<div class="logo">
			<img src="aset/Logonobg.png" width="140px" height="50px">
			<nav>
				<ul class="home">
					<li>
						<img src="gambar/notif.png">
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
	</tbody>
	<div class="container">
	  <div class="row">
	  	<div class="col-md-6">
	  		<video id="preview" width="100%"></video>
			</div>
			    <div class="col-md-6">
				    <label>SCAN QR CODE</label>
				    <input type="text" name="text" id="text" readonyy="" placeholder="scan qrcode" class="form-control">
			    </div>
		    </div>
	    </div>
	</tbody>
	<script>
		  let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
		  Instascan.Camera.getCameras().then(function(cameras){
			  if(cameras.length > 0) {
				  scanner.start(cameras[0]);
			  } else {
				  alert("No cameras found");
			  }
		  }).catch(function(e) {
			  console.error(e);
		  });

		  scanner.addListener('scan',function(c){
			  document.getElementById('text').value=c;
		  });
	</script>
	</body>
</html>