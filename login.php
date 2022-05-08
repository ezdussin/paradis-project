<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Paradis | HOME</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="elements/css/Header.css">
        <link rel="stylesheet" href="elements/css/Footer.css">
    </head>
    <body>
        <?php
        include_once './elements/php/Header.php'
        ?>
        <div class="container flex">
            <form action="./queries/login_query.php" method="POST">
                <h3>Login</h3>
                <?php
                if(isset($_SESSION['loginErrorMsg'])){
                    if($_SESSION['loginErrorMsg']) echo 
                    '<p class="warning" style="color: red; border: 2px solid red;">'.$_SESSION['loginErrorMsg'].'</p>';
                }
                ?>
                <label for="name">Email:</label><br>
                <input type="email" name="email" required><br>
                <label for="pw">Senha:</label><br>
                <input type="password" name="password" required><br>
                <input type="submit" value="Login">
                <a href="./register.php">Criar conta</a>
            </form>
        </div>
        <?php
        include_once './elements/php/Footer.php'
        ?>
    </body>
</html>