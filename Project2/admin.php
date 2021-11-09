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
</style>
<body>
	<thead>
		<div class="logo">
			<img src="aset/Logonobg.png" width="140px" height="50px">
				<ul class="home">
					<a href="admin.php" style="margin-right: 30px">Home</a>
					<a href="login.php">Logout</a>
				</ul>
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
					<button>
						<img src="gambar/insertt.png"><br>
						<a href="insert.php">INSERT</a>
					</button>
					<button>
						<img src="gambar/history1.png"><br>
						<a href="adm_history.php">HISTORY</a>
					</button>
					<button value="kalibrasi.php">
						<img src="gambar/kalibrasi1.png"><br>
						<a href="kalibrasi.php">KALIBRASI</a>
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