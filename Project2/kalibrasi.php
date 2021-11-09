<?php

	include "inisiasi.php";
	require 'adminPermission.inc.php';

    if (isset($_POST['submit'])) {

		$datetime = new DateTime($_POST['date']);
		$date = $datetime->format('Y-m-d H:i:s');

		$statement = $dbc->prepare("INSERT INTO kalibrasi (id_alat, tgl_kalibrasi) VALUES(:alat, :tgl)");
			$statement->bindValue(':alat', $_POST['alat']);
			$statement->bindValue(':id', $date);
			
			$statement->execute() or die ('Error '.$statement->errorInfo()[2].$_POST['date']);

		header("Location: $url/admin.php");
        exit();
    }

?>

<!DOCTYPE html>
<html>

<head>
	<title>Kalibrasi Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>
<style>
	.container{
		width: 450px;
		text-align: center;
		margin: 5% auto;
		border-radius: 25px;
		background-color: rgba(255,255,255,0.9);
		box-shadow: 0 0 17px #333;
	}
	.form{
		text-align: left;
		margin-left: 50px;
		margin-bottom: 10px;

	}
	.text-end{
		margin-bottom: 15px;
	}
	.home{
		float: right;
		display: inline-block;
		width: 200px;
		height: 50px;
		list-style: none;
		line-height: 50px;	
		color: black;
		text-align: center;
		font-size: 20px;
	}
	body{
		background-image: url(bg.jpg);
		font-family: sans-serif;
		background-repeat: no-repeat;
		overflow: hidden;
		background-size: cover;
	}
	button{
		border-radius: 5px;
		margin-bottom: 25px;

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
			<h2>ATUR JADWAL</h2>
			<hr style="position: relative; border: none; height: 1px; background: #999;" />
			<form method="POST">
				<div class="form">
					<div class="col-md-6">
						<div class="mb-3">
							<label><b>Nama Alat</b></label><br>
							<select class="form-select" aria-label="Default select example" name="alat" id="alat">
								<?php 
									$statement = $dbc->prepare("SELECT id_alat, nama_alat FROM daftar_alat ORDER BY nama_alat ASC");
									$statement->execute() or die ('Error '.$statement->errorInfo()[2]);
									
									foreach ($statement as $row) {
										echo "<option value={$row['id_alat']}>{$row['nama_alat']}</option>";
									}
								?>
							</select>
						</div>

						<div class="col-12">
							<label for="date" class="form-label"><b>Atur Tanggal</b></label>
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
								<input name="date" type="text" class="form-control" id="datepicker" placeholder="Pilih Tanggal" required>
							</div>
						</div>

						<button type="submit" name="submit" value="submit" class="btn btn-success">SUBMIT</button>
					</div>
				</div>
			</form>
		</div>
	</tbody>
	<script> 
		$( document ).ready(function() {     
		$("#datepicker").datepicker({          
		format: 'yyyy-mm-dd' //can also use format: 'dd-mm-yyyy'     
		});      
		});  
	</script> 
</body>
</html>