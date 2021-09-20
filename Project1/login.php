<?php
    function checkPassword($username, $password)
    {
        $dbc = new PDO('mysql:host=localhost;dbname=pg1', 'root', '');
    
        $statement = $dbc->prepare("SELECT * FROM admin WHERE username = :username AND password = SHA2(:password,0)");
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        return $statement->rowCount() > 0;
    }
    if (isset($_POST['login'])) {
        if (checkPassword($_POST['username'], $_POST['passwd'])) {
            session_start();
            $_SESSION['isAdmin'] = true;
            header('Location: http://localhost/PetrokimiaGresik/Project1/index.php');
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
</style>

<body style="background-image: url(aset/bg.jpg)">
    <div class="container">
        <div class="header">
            <img src="Logonobg.png">
        </div>
        <div class="main">
            <form class="row g-3" id="form" name="myForm" method="POST">
            <div class="col-12">
                <label for="username" class="form-label"><b>Username</b></label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    <input value="<?php if (isset($_POST['username'])) echo htmlspecialchars($_POST['username']) ?>" name="username" type="text" class="form-control" id="username" placeholder="Masukkan username" required>
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
                <button type="submit" name="login" value="Login" class="btn btn-success">Login</button>
            </div>
            </form>
        </div>
    </div>
</body>

</html>
