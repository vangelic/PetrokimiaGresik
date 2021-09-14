<?php
    function checkPassword($username, $password)
    {
        $dbc = new PDO('mysql:host=localhost;dbname=myapp', 'root', '');
    
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
        }
    }
    else{
        session_start();
    }

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="TM_4.css">
    <title>Tugas Mingguan 4</title>
</head>

<body>
    <table>
        <tr>
            <th colspan="4">DATA MAHASISWA</th>
        </tr>
        <tr class='putih'><td colspan="4"></td></tr>
        <tr>
            <td rowspan="5" class="foto"><img src="image/me.JPEG" alt="me" width="100" height="150"></td>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td>Iffatusy Syaharani</td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td>180411100099</td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td>Teknik Informatika</td>
        </tr>
        <tr>
            <td>Fakultas</td>
            <td>:</td>
            <td>Teknik</td>
        </tr>
        <tr>
            <td>Universitas</td>
            <td>:</td>
            <td>Universitas Trunojoyo Madura</td>
        </tr>
        <tr>
            <?php
                if (!isset($_SESSION['isAdmin'])) 
                {
                    echo '<td class="mnu3"><a href="login.php">Login</a></td>';
                }
                else
                {
                    echo '<td class="mnu4"><a href="logout.php">Logout</a></td>';
                }
            ?>
            <td colspan="2" class='mnu2'><a href="private1.php">Detil Data 1</a></td>
            <td class='mnu1'><a href="private2.php">Detil Data 2</a></td>
        </tr>
    </table>
    <br>
    <?php
                if (!isset($_SESSION['isAdmin'])) 
                {
                    echo '<form id="form" name="myForm" action="index.php" method="POST">';
                        echo '<fieldset>';
                            echo '<div class="field">';
                                echo '<label for="username">Username</label>';
                                echo '<input value="';
                                if (isset($_POST['username'])) echo htmlspecialchars($_POST['username']);
                                echo '" type="text" name="username" id="username" size="31" />';
                                echo '<span class="err">';
                                echo $errors['username'] ?? '';
                                echo '</span><p></p>';
                                echo '<label for="passwd">Password</label>';
                                echo '<input value="';
                                if (isset($_POST['passwd'])) echo htmlspecialchars($_POST['passwd']);
                                echo '" type="password" name="passwd" id="passwd" size="31" />';
                                echo '<span class="err">';
                                echo $errors['passwd'] ?? '';
                                echo '</span><p></p>';        
                                echo '<input class="tombol" type="submit" value="Login" name="login" />';
                            echo '</div>';
                        echo '</fieldset>';
                    echo '</form>';
                    exit();
                }
                else
                {
                    echo '<br>';
                }
    ?>
</body>

</html>