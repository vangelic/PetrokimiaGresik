<?php
	include "inisiasi.php";
    require 'adminPermission.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/484db9065f.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width">
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
	@media screen and (max-width: 768px){
        .container{
            width: auto;
            height: 600px;
        }
    }
    @media screen and (max-width: 320px){
        .container{
            width: 300px !important;
            height: 525px;
        }
        .header img{
            width: 250px;
            height: 120px;
        }
        .col-12 button{
            width: 200px;
            margin-bottom: 20px;
        }
    }
    @media screen and (max-width: 375px){
        .container{
            width: 350px !important;
            height: 525px;
        }
        .header img{
            width: 300px;
            height: 120px;
        }
        .col-12 button{
            width: 200px;
            margin-bottom: 20px;
        }
    }
    @media screen and (max-width: 425px){
        .container{
            width: 350px !important;
            height: 525px;
        }
        .header img{
            width: 300px;
            height: 120px;
        }
        .col-12 button{
            width: 200px;
            margin-bottom: 20px;
        }
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
			<div class="header">
				<div style="background-color: #939896">
					<h1>ADMIN</h1>
				</div>
			</div>
			<div class="main">
				<form>
					<button formaction="insert.php">
						<img src="gambar/insertt.png"><br>
						<a href="insert.php">INSERT</a>
					</button>
					<button formaction="adm_history.php">
						<img src="gambar/history1.png"><br>
						<a href="adm_history.php">HISTORY</a>
					</button>
					<button formaction="daftar_kalibrasi.php">
						<img src="gambar/kalibrasi1.png"><br>
						<a href="daftar_kalibrasi.php">KALIBRASI</a>
					</button>
				</form>
			</div>
		</div>
	</tbody>
	<div style="text-align: right;">
		<p><a href='https://www.freepik.com/photos/technology'>Technology photo created by freepik - www.freepik.com</a><br>
		<a href='https://www.freepik.com/photos/woman'>Woman photo created by freepik - www.freepik.com</a>
		</p>
	</div>
</body>
</html>