<?php
session_start();

if(!isset($_SESSION['recoverCode'])){
  header('Location: http://localhost/password_recover.php');
}
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Nova Senha | Paradis</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style.css">
    </head>
    <body>
        <?php
        include_once './elements/php/Header.php'
        ?>
        <div class="container flex">
            <form action="/queries/new_password_query.php" method='POST'>
                <h3>Informe Nova Senha:</h3>
                <?php
                if(isset($_SESSION['newPasswordErrorMsg'])){
                    echo '<p class="warning" style="color: red; border: 2px solid red;">'.$_SESSION['newPasswordErrorMsg'].'</p>';
                    unset($_SESSION['newPasswordErrorMsg']);
                }
                ?>
                <label for="code">Código de Recuperação:</label><br>
                <input type="text" name="recover_code" required><br>
                <label for="password">Nova Senha:</label><br>
                <input type="password" name="password" id="password" required><br>
                <label for="confirm_password">Confirmar Senha:</label><br>
                <input type="password" name="confirm_password" id="confirm_password" required><br>
                <input type="submit" value="Recuperar">
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