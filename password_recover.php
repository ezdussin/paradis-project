<?php
session_start();

if(isset($_SESSION['recoverCode'])){
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Recuperar Senha | Paradis</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style.css">
    </head>
    <body>
        <?php
        include_once './elements/php/Header.php'
        ?>
        <div class="container flex">
            <form action="/queries/password_recover_query.php" method='POST'>
                <h3>Informe Seu Email:</h3>
                <?php
                if(isset($_SESSION['passwordRecoverErrorMsg'])){
                    echo '<p class="warning" style="color: red; border: 2px solid red;">'.$_SESSION['passwordRecoverErrorMsg'].'</p>';
                    session_destroy();
                }
                ?>
                <p class="secondary-text">
                    Um email será enviado para você com seu codigo de recuperação.
                </p>
                <label for="email">Email:</label><br>
                <input type="email" name="email" required><br>
                <input type="submit" value="Recuperar">
            </form>
        </div>
        <?php
        include_once './elements/php/Footer.php'
        ?>
    </body>
</html>