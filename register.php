<?php
    session_start();

    if(isset($_COOKIE['userID'])){
        unset($_SESSION['loginErrorMsg']);
        unset($_SESSION['registerErrorMsg']);
        header('Location: http://localhost/account.php');
    }
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Registrar | Paradis</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        include_once './elements/php/Header.php'
        ?>
        <div class="container flex">
            <form action="/queries/register_query.php" method='POST' enctype="multipart/form-data">
                <h3>Registrar</h3>
                <?php
                if(isset($_SESSION['registerErrorMsg'])){
                    echo '<p class="warning" style="color: red; border: 2px solid red;">'.$_SESSION['registerErrorMsg'].'</p>';
                    unset($_SESSION['registerErrorMsg']);
                }
                ?>
                <label for="email">Email:</label><br>
                <input type="email" name="email" required><br>
                <label for="name">Nome:</label><br>
                <input type="text" name="name" required><br>
                <label for="pw">Senha:</label><br>
                <input type="password" name="password" required><br>
                <label for="avatar">Avatar:</label>
                <input type="file" name="avatar">
                <input type="submit" value="Cadastrar">
            </form>
        </div>
        <?php
        include_once './elements/php/Footer.php'
        ?>
    </body>
</html>