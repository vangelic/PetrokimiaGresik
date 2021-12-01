<?php 
	include "inisiasi.php";

	if (isset($_POST['lanjut'])) {
		$lanjutkan = $_POST['text'];

		header("Location: $lanjutkan");
        exit();
    }
?>
<html>
  <head>
    <title>QRCode Scanner</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
  </style>
  <body>
	  <div class="container p-3">
		  <div class="row">
			  <div class="col-md-6">
				  <video id="preview" width="100%"></video>
			  </div>
			  <div class="col-md-6">
			  <form method="POST">
				  <label>SCAN QR CODE</label>
				  <input type="text" name="text" id="text" readonyy="" placeholder="scan qrcode" class="form-control">
				  <button type="submit" name="lanjut" value="lanjut" class="btn btn-success">Lanjut</button>
			  </form>
			  </div>
		  </div>
	  </div>
	  <script>
		  let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
		  Instascan.Camera.getCameras().then(function(cameras){
			  if(cameras.length > 0) {
				  scanner.start(cameras[0]);
			  } else {
				  alert("No cameras found");
			  }
		  }).catch(function(e) {
			  console.error(e);
		  });

		  scanner.addListener('scan',function(c){
			  document.getElementById('text').value=c;
		  });
	  </script>
	</body>
	<footer>
		<div style="background-color: #939896 ; width: auto; height: auto;">
			<p style="text-align: center; font-family: sans-serif;"> Copyright &copy; 2021 ivfatusySyrani & rufinarahma</p>
		</div>
	</footer>
</html>