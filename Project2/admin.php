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
		width: 450px !important;
		margin:2% auto;
		border-radius: 25px;
		background-color: rgba(255,255,255,0.5);
		box-shadow: 0 0 17px #333;
	}
	.main button{
		padding-left: 0;
		background-color: #939896;
		letter-spacing: 2px;
		font-weight: bold;
		margin-bottom: 70px;
		border-radius: 15px ;
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
					<button><a href="insert.php">INSERT</a></button>
					<button><a href="adm_history.php">HISTORY</a></button>
					<button><a href="kalibrasi.php">KALIBRASI</a></button>
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