<?php
    include "inisiasi.php";

    if (isset($_POST['register'])) {
        if ($_POST['passwd']==$_POST['pw']) {
            $statement = $dbc->prepare("INSERT INTO user VALUES(:nik, :nama, :email, SHA2(:password,0))");
            $statement->bindValue(':nik', $_POST['nik']);
            $statement->bindValue(':nama', $_POST['nama']);
            $statement->bindValue(':email', $_POST['email']);
            $statement->bindValue(':password', $_POST['passwd']);
            $statement->execute() or die ('Error '.$statement->errorInfo()[2]);

            header("Location: $url/login.php");
            exit();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/484db9065f.js" crossorigin="anonymous"></script>
    <title>Register</title>
</head>
<style>
    .main i{
        position: absolute;
        left: 7px;
        color: #333;
        font-size: 16px;
        top: 10px;
    }
</style>

<body style="background-image: url(aset/bg.jpg)">
    <div class="container">
        <div class="header">
            <img src="aset/Logonobg.png">
        </div>
        <div class="main">
            <h2>Create Account</h2>
            <form class="row g-3" id="form" name="myForm" method="POST">
            <div class="col-12">
                <label for="nama" class="form-label"><b>Name</b></label>
                <div class="input-group mb-3">
	    			<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
				</div>
            </div>
            <div class="col-12">
                <label for="email" class="form-label"><b>Email</b></label>
                <div class="input-group mb-3">
	    			<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
				</div>
            </div>
            <div class="col-12">
                <label for="nik" class="form-label"><b>NIK</b></label>
                <div class="input-group mb-3">
	    			<input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
				</div>
            </div>
            <div class="col-12">
                <label for="passwd" class="form-label"><b>Password</b></label>
                <div class="input-group mb-3">
                    <input type="password" name="passwd" class="form-control" id="passwd" placeholder="Masukkan password" required>
                </div>
            </div>
            <div class="col-12">
                <label for="pw" class="form-label"><b>Confirm Password</b></label>
                <div class="input-group mb-3">
                    <input type="password" name="pw" class="form-control" id="pw" placeholder="Ulangi password" required>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" name="register" value="Register" class="btn btn-success">Register</button>
            </div>
            <div>Have already an account ? <a href='login.php'>Login here</a></div>
            </form>
        </div>
    </div>
</body>

</html>
