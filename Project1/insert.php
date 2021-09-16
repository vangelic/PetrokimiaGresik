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
		<h2>Form</h2>
		<hr style="position: relative; border: none; height: 1px; background: #999;" />
		<form class="row g-3" id="form" name="myForm" method="POST">
			<div class="col-md-6">
				<div class="mb-3">
					<label for="nm_lokal" class="form-label">Nama Lokal</label>
    				<input type="text" class="form-control" id="nm_lokal" placeholder="Masukkan nama lokal">
				</div>
				<div class="mb-3">
					<label for="nm_latin" class="form-label">Nama Latin</label>
    				<input type="text" class="form-control" id="nm_latin" placeholder="Masukkan nama latin">
				</div>
				<div class="mb-3">
					<label for="deskripsi" class="form-label">Deskripsi</label>
    				<textarea class="form-control" id="deskripsi" placeholder="Masukkan deskripsi" rows="3"></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label for="formFile" class="form-label">Upload Foto</label>
					<input class="form-control" type="file" id="formFile">
				</div>
			</div>	
			<div class="text-end">
				<button type="submit" name="upload" value="Upload" class="btn btn-success">Submit</button>
			</div>		
		</form>
	</div>
</body>
</html>