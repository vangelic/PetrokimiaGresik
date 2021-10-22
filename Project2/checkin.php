<?php
    include "inisiasi.php";
    require 'adminPermission.inc.php';

    $c_id = $_GET['id'];

    if (isset($_POST['checkin'])) {

		$db->update('daftar_alat', ['id_pinjam' => $_SESSION['id']], ['nama_alat'=> $c_id]);

		$query = $db->row("SELECT * FROM daftar_alat WHERE nama_alat=?",$c_id);
		$id = $query['id_alat'];

		$db->insert("history", ["id_alat" => $id, "checkin" => date('Y-m-d H:i:s'), "id_user" => $_SESSION['id']]);

		header("Location: $url/user.php");
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

<body>
	<div class="container">
		<h2><?php echo $c_id ?></h2>
		<hr style="position: relative; border: none; height: 1px; background: #999;" />
		<form method="POST">
		<div class="row">
            <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
                <button type="submit" name="checkin" value="checkin" class="btn btn-success mb-5">Check In</button>

                <div>Klik untuk menggunakan alat</div>
            </div>
        </div>
		</form>
	</div>
</body>
</html>