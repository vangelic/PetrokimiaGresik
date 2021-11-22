<?php
    include "inisiasi.php";
    require 'adminPermission.inc.php';

    $c_id = $_GET['id'];

	$datetime = new DateTime;
	$otherTZ = new DateTimeZone("Asia/Jakarta");
	$datetime->setTimezone($otherTZ);
	$date = $datetime->format('Y-m-d H:i:s');

    if (isset($_POST['checkout'])) {

		$db->update('daftar_alat', ['id_pinjam' => null], ['nama_alat'=> $c_id]);

		$query = $db->row("SELECT * FROM daftar_alat WHERE nama_alat=?",$c_id);
		$id = $query['id_alat'];

		$query = $db->row("SELECT * FROM history WHERE id_alat=? ORDER BY id_history DESC LIMIT 1",$id);
		$history = $query['id_history'];

		if (isset($_POST['kons'])) {
			$db->update('daftar_alat', ['kondisi' => 'Rusak'], ['nama_alat'=> $c_id]);

			$db->update('history', ['checkout' => $date, 'review' => $_POST['review'], 'kondisi' => 'Rusak'], ['id_user'=> $_SESSION['id'], 'id_history' => $history]);
		}
		else {
			$db->update('history', ['checkout' => $date, 'review' => $_POST['review']], ['id_user'=> $_SESSION['id'], 'id_history' => $history]);
		}
		
		header("Location: $url/scan.php");
        exit();
    }

?>

<!DOCTYPE html>
<html>

<head>
	<title>Insert Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>
<style>
	body{
		font-family: sans-serif;
		background-image: url(bg.jpg);
		background-repeat: no-repeat;
		background-size: cover;
	}
	.container{
		width: 800px !important;
		margin:5% auto;
		border-radius: 25px;
		background-color: rgba(255,255,255,0.5);
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
			<h2><?php echo $c_id ?></h2>
			<hr style="position: relative; border: none; height: 1px; background: #999;" />
			<form method="POST">
			<div class="row">
				<div class="col-12">
					<div>Bagaimana kondisi alat?</div>
						<div class="form-check">
							<div class="input-group mb-3">
							<input class="form-check-input" type="checkbox" value="rusak" name="kons" id="flexCheckDefault">
							<label class="form-check-label px-2" for="flexCheckDefault">
								 Rusak
							</label>
							</div>
						</div>
				</div>
				<div class="col-12">
					<label for="review" class="form-label">Tulis Review</label>
					<div class="input-group mb-3">
					<textarea class="form-control" name="review" id="review" rows="3"></textarea>
					</div>
				</div>
	        </div>
			<div class="col-12">
	            <button type="submit" name="checkout" value="checkout" class="btn btn-danger">Check out</button>
	        </div>
			</form>
		</div>
	</tbody>
</body>
<footer>
	<div style="background-color: #939896 ; width: auto; height: auto;">
		<p style="text-align: center; font-family: sans-serif;">&copy; 2021 buncobpg.id</p>
	</div>
</footer>
</html>