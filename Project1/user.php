<?php
    $c_id = $_GET['id'];

	$dbc = new PDO('mysql:host=localhost;dbname=pg1', 'root', '');
		
    $statement = $dbc->prepare("SELECT gambar, nama_lokal, nama_latin, deskripsi FROM `pgpedia` WHERE id=:id");
	$statement->bindValue(':id', $c_id);
	$statement->execute();
	$row = $statement->fetch();
?>

<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<style>
	.gel{
		position: absolute;
		top: 0;
		right: 0;
	}
	.paragraf{
		width: 500px;
		height: auto;
		background-image: url(kotak.png);
		background-repeat: no-repeat;
		background-size: 100% 100%;
		padding: 15px;
		padding-right: 30px;
		margin-bottom: 5px; 
	}
	.daun{
		position: absolute;
		top: 250px;
		left: 530px;
	}
	.daunpojok{
		position: fixed;
		right: 0;
		bottom: 0;
	}
	.gambar{
		top: 0;
		right: 0;
		position: absolute;
		width: 650px;
		height: 500px;
	}
	.judul{
		margin-top: 200px;
	}
	@media screen and (max-width: 768px){
		.gel{
			z-index: -1;
		}
		.gel img{
			width: 500px !important;
			height: 500px !important;
		}
		.gambar{
			width: 500px;
			height: 500px;
			position: absolute;
			top: 0;
			right:0;
			z-index: -2;
		}
		.paragraf{
			z-index: 100;
		}
		.ctext{
			margin-top: 200px;
		}
		.daun{
			margin-top: 200px;
		}
		.logoatas{
			width: 250px !important;
		}
		.daunpojok{
			width: 200px;
		}
		.orang img{
			width: 250px !important;
			margin-top: 50px;
			margin-bottom: -140px;
		}
		.logobawah{
			position: fixed;
			bottom: 0;
		}
	}
	@media screen and (max-width: 425px){
		.gel{
			width: 300px;
			right: -125px;
		}
		.gambar{
			width: 450px;
			height: 450px;
			right: -325px;
		}
		.daun img{
			width: 150px !important;
			margin-top: 70px;
		}
		.orang img{
			width: 250px !important;
			margin-top: 50px;
			margin-bottom: -140px;
			margin-left: -50px;
		}
		.paragraf{
			margin-top: 0px;
			width: 600px;
			font-size: 20px;
		}
		.daun{
			margin-top: 300px;
			margin-left: 110px;
		}
		.daun img{
			width: 100px !important;
		}
		.ctext{
			margin-top: 0;
		}
	}
</style>

<body>
	<div style="z-index: 100;">
		<img class="logoatas" src="aset/logo_atas.png">
	</div>
	<img class="gambar" src="aset/Buah_Merah_Bawean.jpeg">
	<div class="gel">
		<img style="width: 700px; height: 500px;" src="aset/gel1.png">
	</div>
	<div class="orang">
		<img style="width: 150px; padding-left: 100px;" src="aset/orang.png">
	</div>
	<div class="judul">
		<div>
			<h1 style="font-size: 50px" >ANGGUR LAUT</h1>
		</div>
		<div>
			<h3 style="font-style: italic; font-size: 40px; margin-top: -10px">Caulerpa Rasemosa</h3>
		</div>
	</div>
	<div class="ctext">
		<div class="paragraf">
			<p><?php echo $row['deskripsi']; ?></p>
			
		</div>
		<div class="daun">
			<img style="width: 200px" src="aset/daun.png">
		</div>
	</div>
	<div class="logobawah">
		<img style="width: 500px; bottom: 0;" src="aset/logo_bawah.png">
	</div>
	<div class="daunpojok">
		<img style="width: 250px; height: 200px" src="aset/daun_pojok.png">
	</div>

</body>
</html>