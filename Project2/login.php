<?php
    include "inisiasi.php";

    function checkPassword($nik, $password)
    {
        global $db;
        $query = $db->row('SELECT * FROM user WHERE nik = ? AND `password` = SHA2(?,0)', $nik, $password);
		return $query ['id_user'];
    }
    if (isset($_POST['login'])) {
        if ($id = checkPassword($_POST['nik'], $_POST['passwd'])) {
            session_start();
            $_SESSION['isLogin'] = true;
            $_SESSION['id'] = $id;
            if($_POST['nik'] == 'admin'){
                header("Location: $url/admin.php");
            }else{
                header("Location: $url/user.php");
            }
            exit();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/484db9065f.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<style>
    .main i{
        position: absolute;
        left: 7px;
        color: #333;
        font-size: 16px;
        top: 10px;
    }
    @media screen and (max-width: 768px){
        .container{
            width: auto;
            height: 700px;
        }
    }
    @media screen and (max-width: 320px){
        .container{
            width: 300px !important;
            height: 525px;
        }
        .header img{
            width: 250px;
            height: 120px;
        }
        .col-12 button{
            width: 200px;
            margin-bottom: 20px;
        }
    }
    @media screen and (max-width: 375px){
        .container{
            width: 350px !important;
            height: 525px;
        }
        .header img{
            width: 300px;
            height: 120px;
        }
        .col-12 button{
            width: 200px;
            margin-bottom: 20px;
        }
    }
    @media screen and (max-width: 425px){
        .container{
            width: 350px !important;
            height: 525px;
        }
        .header img{
            width: 300px;
            height: 120px;
        }
        .col-12 button{
            width: 200px;
            margin-bottom: 20px;
        }
    }
</style>

<body style="background-image: url(aset/bg.jpg)">
    <div class="container">
        <div class="header">
            <img src="aset/Logonobg.png">
        </div>
        <div class="main">
            <form class="row g-3" id="form" name="myForm" method="POST">
            <div class="col-12">
                <label for="nik" class="form-label"><b>NIK</b></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    <input value="<?php if (isset($_POST['nik'])) echo htmlspecialchars($_POST['nik']) ?>" name="nik" type="text" class="form-control" id="nik" placeholder="Masukkan NIK" required>
                </div>
            </div>
            <div class="col-12">
                <label for="passwd" class="form-label"><b>Password</b></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    <input value="<?php if (isset($_POST['passwd'])) echo htmlspecialchars($_POST['passwd']) ?>" type="password" name="passwd" class="form-control" id="passwd" placeholder="Masukkan password" required>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" name="login" value="Login" class="btn btn-success">Submit</button>
            </div>
            <div style="margin-top: 0px;">
                Don’t have an account ? <a href='register.php'>Register here</a>
            </div>
            </form>
        </div>
    </div>
</body>
<footer>
    <div style="background-color: #939896 ; width: auto; height: auto;">
        <p style="text-align: center; font-family: sans-serif;">&copy; 2021 buncobpg.id</p>
    </div>
</footer>
</html>
