<?php
    include "inisiasi.php";
    require 'adminPermission.inc.php';

    $c_id = $_GET['id'];

	$datetime = new DateTime;
	$otherTZ = new DateTimeZone("Asia/Jakarta");
	$datetime->setTimezone($otherTZ);
	$date = $datetime->format('Y-m-d H:i:s');

    if (isset($_POST['checkin'])) {

		$db->update('daftar_alat', ['id_pinjam' => $_SESSION['id']], ['nama_alat'=> $c_id]);

		$query = $db->row("SELECT * FROM daftar_alat WHERE nama_alat=?",$c_id);
		$id = $query['id_alat'];

		$db->insert("history", ["id_alat" => $id, "checkin" => $date, "id_user" => $_SESSION['id']]);

		header("Location: $url/user.php");
        exit();
    }

	$result = mysqli_query($koneksi, "SELECT nama_alat, id_pinjam, nama, daftar_alat.kondisi FROM daftar_alat, user WHERE daftar_alat.nama_alat LIKE '$c_id' AND daftar_alat.id_pinjam=user.id_user");
	$row = mysqli_fetch_assoc($result)

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
</style>

<body>
	<div class="container">
		<h2><?php echo $c_id ?></h2>
		<hr style="position: relative; border: none; height: 1px; background: #999;" />
		<form method="POST">
		<div class="row">
            <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
				<?php
					$result = mysqli_query($koneksi, "SELECT nama_alat, id_pinjam, nama FROM daftar_alat, user WHERE daftar_alat.nama_alat LIKE '$c_id' AND daftar_alat.id_pinjam=user.id_user");
					$row = mysqli_fetch_assoc($result);

					if (!isset($row["id_pinjam"])) {

						if ($row["kondisi"]=="Rusak") {
							echo "<button type='submit' name='checkin' value='checkin' class='btn btn-primary mb-5' disabled>Check In</button>";
	
							echo "<div>Alat sedang rusak, silakan menghubungi admin.</div>";
						}
						elseif ($row["kondisi"]=="Belum Dikalibrasi") {
							echo "<button type='submit' name='checkin' value='checkin' class='btn btn-warning mb-5'>Check In</button>";

                			echo "<div>Alat belum dikalibrasi, klik untuk tetap menggunakan alat.</div>";
						}
						else {
							echo "<button type='submit' name='checkin' value='checkin' class='btn btn-primary mb-5'>Check In</button>";

                			echo "<div>Klik untuk menggunakan alat.</div>";
						}
					}
					elseif ($row["id_pinjam"]==$_SESSION['id']) {
						echo "<button type='submit' name='checkin' value='checkin' class='btn btn-primary mb-5' disabled>Check In</button>";

                		echo "<div>Alat sedang anda gunakan.</div>";

						echo "<a href='checkout.php?id=".$c_id."'>Klik untuk check out.</a>";
					}
					else{
						echo "<button type='submit' name='checkin' value='checkin' class='btn btn-primary mb-5' disabled>Check In</button>";

                		echo "<div>Sedang  digunakan oleh ".$row["nama"]."</div>";
					}
				?>
            </div>
        </div>
		</form>
	</div>
</body>
<footer>
	<div style="background-color: #939896 ; width: auto; height: auto;">
		<p style="text-align: center; font-family: sans-serif;">&copy; 2021 buncobpg.id</p>
	</div>
</footer>
</html>