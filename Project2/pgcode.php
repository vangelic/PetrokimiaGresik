<?php
    include "inisiasi.php";
    require 'adminPermission.inc.php';

    $c_id = $_GET['id'];

    $kode = "$url/checkin.php?id=$c_id";
    require_once("qrcode/qrlib.php");

    QRcode::png("$kode","pgqrcode/".$c_id.".png","M", 10,3);

    if (isset($_POST['simpan'])) {
        header('Content-Type: application/download');
        header("Content-Disposition: attachment; filename=".$c_id.".png"."");
        header("Content-Length: " . filesize("pgqrcode/".$c_id.".png"));
        $fp = fopen("pgqrcode/".$c_id.".png", "r");
        fpassthru($fp);
        fclose($fp);

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
		<h2>QR Code</h2>
		<hr style="position: relative; border: none; height: 1px; background: #999;" />
		<div class="row">
            <div class="col-md-6 text-center">
                <img src="pgqrcode/<?php echo $c_id ?>.png" id="pg_code" class="img-thumbnail" alt="qrcode" style="width:400px;">
            </div>
            <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
            <form method="POST">
                <p>Klik Tombol dibawah untuk Mengunduh QR Code :</p>
                <button type="submit" name="simpan" value="simpan" class="btn btn-success mb-5">Simpan</button>

                <div>Klik Link berikut untuk kembali :</div>
                <?php
                    echo "<a href='admin.php'>Kembali ke Halaman Home</a>"
                ?>
            </form>
            </div>
        </div>
	</div>
</body>
</html>