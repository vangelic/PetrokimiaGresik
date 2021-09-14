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
            header('Location: http://localhost/PetrokimiaGresik/Project1/home.php');
            exit();
        }
    }

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/484db9065f.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body class="masuk">
    <div class="container">
        <div class="header">
            <img src="Logonobg.png">
        </div>
    <form class="form-horizontal" id="form" name="myForm" method="POST">

        <div class="form-group">
        <label class="control-label col-sm-2" for="username"><b>Username</b></label>
        <div class="col-sm-12">
            <input value="<?php if (isset($_POST['username'])) echo htmlspecialchars($_POST['username']) ?>" type="text" name="username" class="form-control" id="username" placeholder="Enter username" required/>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="passwd"><b>Password</b></label>
        <div class="col-sm-12">          
            <input value="<?php if (isset($_POST['passwd'])) echo htmlspecialchars($_POST['passwd']) ?>" type="password" class="form-control" id="passwd" placeholder="Enter password" name="passwd" required />
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        </div>
        <div class="form-group" style="text-align: center;">        
            <button style="margin-bottom: 45px" type="submit" class="btn btn-success" value="Login" name="login">Login</button>
        </div>
    </form>
    </div>
</body>

</html>
