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
    nav ul li:hover ul .auto{
        display: block;
        border: 1px solid red;
        padding:5px;
        margin-top:5px;
        width:300px;
        height:300px;
        overflow:auto;
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
    .auto {
        display:none;
        padding:5px;
        margin-top:5px;
        width:330px;
        height:100px;
        overflow:auto;
    }
    .auto:hover {
        display:block;
        padding:5px;
        margin-top:5px;
        width:330px;
        height:100px;
        overflow:auto;
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
                        <ul class="auto">
                            <?php                           
                            $datetime = new DateTime;
                            $otherTZ = new DateTimeZone("Asia/Jakarta");
                            $datetime->setTimezone($otherTZ);
                            $date = $datetime->format('Y-m-d');

                            $statement = $dbc->prepare("SELECT nama_alat, tgl_kalibrasi FROM kalibrasi, daftar_alat WHERE kalibrasi.id_alat=daftar_alat.id_alat AND DATE(kalibrasi.tgl_kalibrasi) >= :date order by kalibrasi.tgl_kalibrasi ASC");
                            $statement->execute(['date' => $date]);
                            $data = $statement->fetchAll();
                            foreach ($data as $row) {
                                $kalibrasi = new DateTime($row["tgl_kalibrasi"]);
                                $tgl = $kalibrasi->format("Y-m-d");
                                
                                echo "<a href=''><li>{$row['nama_alat']}</li></a>";
                                echo "<p>Lakukan kalibrasi sebelum {$tgl}</p>";
                            }
                            ?>
                        </ul>
                    </li>
                    <a href="admin.php" style="margin-right: 30px">Home</a>
                    <a href="login.php">Logout</a>
                </ul>
            </nav>
        </div>
    </thead>
    <tbody>
    	<div class="container">
    		<h2>QR Code</h2>
    		<hr style="position: relative; border: none; height: 1px; background: #999;" />
    		<div class="row">
                <div class="col-md-6 text-center">
                    <img src="pgqrcode/<?php echo $c_id ?>.png" id="pg_code" class="img-thumbnail" alt="qrcode" style="width:350px; margin-bottom: 5px;">
                </div>
                <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
                <form method="POST">
                    <p>Klik Tombol dibawah untuk Mengunduh QR Code :</p>
                    <button type="submit" name="simpan" value="simpan" class="btn btn-secondary mb-5">Simpan</button>

                    <div>Klik Link berikut untuk kembali :</div>
                    <?php
                        echo "<a href='admin.php'>Kembali ke Halaman Home</a>";
                    ?>
                </form>
                </div>
            </div>
    	</div>
    </tbody>
</body>
</html>