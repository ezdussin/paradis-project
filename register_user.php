<?php
    session_start();

    if(isset($_COOKIE['userID'])){
        session_destroy();
        header('Location: http://localhost/account.php');
    }
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Cadastro | Paradis</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style.css">
    </head>
    <body>
        <?php
        include_once './elements/php/Header.php'
        ?>
        <div class="container flex">
            <form action="/queries/register_user_query.php" method='POST' enctype="multipart/form-data">
                <h3>Cadastrar</h3>
                <?php
                if(isset($_SESSION['registerUserErrorMsg'])){
                    echo '<p class="warning" style="color: red; border: 2px solid red;">'.$_SESSION['registerUserErrorMsg'].'</p>';
                    unset($_SESSION['registerUserErrorMsg']);
                }
                ?>
                <label for="email">Email:</label><br>
                <input type="email" name="email" required><br>
                <label for="name">Nome:</label><br>
                <input type="text" name="name" required><br>
                <label for="password">Senha:</label><br>
                <input type="password" name="password" id="password" required><br>
                <label for="confirm_password">Confirmar Senha:</label><br>
                <input type="password" name="confirm_password" id="confirm_password" required><br>
                <label for="avatar">Avatar:</label><br>
                <input type="file" name="avatar"><br>
                <input type="submit" value="Cadastrar">
            </form>
        </div>
        <?php
        include_once './elements/php/Footer.php'
        ?>
    </body>
    <script>
        const password = document.getElementById("password")
        const confirm_password = document.getElementById("confirm_password")

        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
            confirm_password.setCustomValidity('');
          }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</html>