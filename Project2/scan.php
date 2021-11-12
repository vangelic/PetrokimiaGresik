<?php 
	include "inisiasi.php";
	require 'adminPermission.inc.php';
	
	$result = mysqli_query($koneksi, "SELECT * FROM daftar_alat WHERE id_pinjam=$_SESSION[id]");
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Petrocode</title>
	<style>
		body{
			font-family: sans-serif;
			background-image: url(aset/bg.jpg);
			background-repeat: no-repeat;
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

	</style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<style>
    body{
        background-repeat: no-repeat;
        background-image: url(bg.jpg);
    }
    .home img{
		width: 30px;
		height: 30px;
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
							<a href=""><li>Notif 1</li></a>
							<a href=""><li>Notif 2</li></a>
							<a href=""><li>Notif 3</li></a>
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
							<a href="rekan.php"><button type="button" class="btn btn-secondary">Tambah Rekan</button></a>
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
		</div>
	</tbody>
</body>
</html>