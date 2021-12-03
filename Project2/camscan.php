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
	.container{
		width: 800px !important;
		margin:5% auto;
		border-radius: 25px;
		background-color: rgba(255,255,255,0.5);
		box-shadow: 0 0 17px #333;
		padding: 25px;
	}
  </style>
  <body>
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
</body>
</html>