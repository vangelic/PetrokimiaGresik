<?php 
	include "inisiasi.php";
	require 'adminPermission.inc.php';

	if (isset($_POST['lanjut'])) {
		$lanjutkan = $_POST['text'];

		header("Location: $lanjutkan");
        exit();
    }
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QRCODE SCANNER</title>
  <link rel="stylesheet" href="../dist/css/qrcode-reader.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
    padding-bottom: 10px;
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
  nav ul li:hover .auto{
    display: block;
    width:300px;
    height:200px;
    overflow:auto;
    background-color: #ffff;
    border-radius: 5px;
  }
  nav ul li ul{
    display: none;
  }
  nav ul li ul li{
    width: 250px;
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
  .badge-notif {
        position:absolute;
        top : 5px;
        right: 270px;
        background-color: rgba(255,255,255,0.5);
        height: 20px;
        width: 15px;
        border-radius: 8px;
        padding: 0.5px;
  }
  .logo h3{
    margin-left: 3px;
  }
</style>
<body>
  <thead>
    <div class="logo">
      <img src="aset/Logonobg.png" width="140px" height="50px">
      <h5 class="badge-notif">
        <?php               
              $datetime = new DateTime;
              $otherTZ = new DateTimeZone("Asia/Jakarta");
              $datetime->setTimezone($otherTZ);
              $date = $datetime->format('Y-m-d');

              $statement = $dbc->prepare("SELECT COUNT(nama_alat) as jumlah FROM (SELECT nama_alat, tgl_kalibrasi FROM kalibrasi, daftar_alat WHERE kalibrasi.id_alat=daftar_alat.id_alat AND DATE(kalibrasi.tgl_kalibrasi) >= :date order by kalibrasi.tgl_kalibrasi ASC) as A");
              $statement->execute(['date' => $date]);
              $data = $statement->fetchAll();
              foreach ($data as $row) {
                echo "{$row['jumlah']}";
              }
              ?>
      </h5>
      <nav>
        <ul class="home">
          <li>
            <img src="gambar/notification.png">
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
          <a href="user.php" style="margin-right: 30px">Home</a>
          <a href="login.php">Logout</a>
        </ul>
      </nav>
    </div>
  </thead>
  <tbody>
    <div class="container">
      <h2>SCAN QRCODE</h2>
      <hr style="position: relative; border: none; height: 1px; background: #999;" />
      <form>
        <div class="form">
          <div class="col-md-12">
            <div class="mb-3">
              <input id="single2" type="text" class="form-control"> 
            </div>
            <button class="btn btn-success" type="button" id="openreader-single2" 
              data-qrr-target="#single2" 
              data-qrr-audio-feedback="true">Klik untuk Scan</button>
          </div>
        </div>
      </form>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="../dist/js/qrcode-reader.min.js?v=20190604"></script>
      <script>         
            $(function(){

            // overriding path of JS script and audio 
            $.qrCodeReader.jsQRpath = "../dist/js/jsQR/jsQR.min.js";
            $.qrCodeReader.beepPath = "../dist/audio/beep.mp3";

            // bind all elements of a given class
            $(".qrcode-reader").qrCodeReader();

            // read or follow qrcode depending on the content of the target input
            $("#openreader-single2").qrCodeReader({callback: function(code) {
              if (code) {
                window.location.href = code;
              }  
            }}).off("click.qrCodeReader").on("click", function(){
              var qrcode = $("#single2").val().trim();
              if (qrcode) {
                  window.location.href = qrcode;
              } else {
                  $.qrCodeReader.instance.open.call(this);
              }
              });
            });
          </script>
    </div>
  </tbody>
  <footer>
  <div style="background-color: #939896 ; width: auto; height: auto;">
    <p style="text-align: center; font-family: sans-serif;"> Copyright &copy; 2021 ivfatusySyrani & rufinarahma</p>
  </div>
</footer>

</body>
</html>