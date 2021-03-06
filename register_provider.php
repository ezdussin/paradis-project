<?php
    session_start();

    if(!isset($_COOKIE['userID'])){
        session_destroy();
        header('Location: http://localhost/login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Cadastro Fornecedor | Paradis</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style.css">
    </head>
    <body>
        <?php
        include_once './elements/php/Header.php'
        ?>
        <div class="container flex">
            <form action="/queries/register_provider_query.php" method='POST'>
                <h3>Cadastrar Fornecedor</h3>
                <?php
                if(isset($_SESSION['providerMsg'])){
                    echo '<p class="warning" style="color: green; border: 2px solid green;">'.$_SESSION['providerMsg'].'</p>';
                    session_destroy();
                } else if(isset($_SESSION['providerErrorMsg'])) {
                    echo '<p class="warning" style="color: red; border: 2px solid red;">'.$_SESSION['providerErrorMsg'].'</p>';
                    session_destroy();
                }
                ?>
                <label for="email">Email:</label><br>
                <input type="email" name="email" required><br>
                <label for="name">Nome:</label><br>
                <input type="text" name="name" required><br>
                <label for="cellphone">Telefone:</label><br>
                <input type="text" name="telephone" required><br>
                <label for="cnpj">CNPJ:</label><br>
                <input type="text" name="cnpj" required><br>
                <label for="address">Endereço:</label><br>
                <input type="text" name="address" required><br>
                <input type="submit" value="Cadastrar">
            </form>
        </div>
        <?php
        include_once './elements/php/Footer.php'
        ?>
    </body>
</html>