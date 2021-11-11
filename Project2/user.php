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
		margin-right: 30px;
	}
</style>
<body>
	<thead>
		<div class="logo">
			<img src="aset/Logonobg.png" width="140px" height="50px">
				<ul class="home">
					<img src="gambar/notif.png">
					<a href="user.php" style="margin-right: 30px">Home</a>
					<a href="login.php">Logout</a>
				</ul>
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
</html>