<?php
    require 'adminPermission.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/484db9065f.js" crossorigin="anonymous"></script>
</head>
<body>
	<thead>
		<div class="logo">
			<img src="Logonobg.png" width="140px" height="50px">
				<ul class="home">
					<a href="home.php" style="margin-right: 30px">Home</a>
					<a href="logout.php">Logout</a>
				</ul>
		</div>
	</thead>
	<tbody>
		<div class="container">
			<div class="header">
				<img src="Logonobg.png">
			</div>
			<div class="main">
				<form>
					<button>INSERT DATA</button>
					<button>LIST DATA</button>
				</form>
			</div>
		</div>
	</tbody>
</body>
<footer style="text-align: center; width: 100%">
	<img src="kontak.png" height="30px">
</footer>
</html>