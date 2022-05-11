<?php
    session_start();

    if(!isset($_COOKIE['userID'])){
        unset($_SESSION['loginErrorMsg']);
        unset($_SESSION['registerErrorMsg']);
        header('Location: http://localhost/account.php');
    }
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Cadastro Produto | Paradis</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php
        include_once './elements/php/Header.php'
        ?>
        <div class="container flex">
            <form action="/queries/register_product_query.php" method='POST' enctype="multipart/form-data">
                <h3>Cadastrar Produto</h3>
                <?php
                if(isset($_SESSION['registerUserErrorMsg'])){
                    echo '<p class="warning" style="color: red; border: 2px solid red;">'.$_SESSION['registerUserErrorMsg'].'</p>';
                    unset($_SESSION['registerUserErrorMsg']);
                }
                ?>
                <label for="product_name">Produto:</label><br>
                <input type="text" name="product_name" required><br>
                <label for="description">Descrição:</label><br>
                <input type="text" name="description" required><br>
                <label for="price">Valor:</label><br>
                <input type="number" name="price" step=".01" required><br>
                <label for="amount">Quantidade:</label><br>
                <input type="number" name="amount" required><br>
                <label for="thumbnail">Miniatura:</label><br>
                <input type="file" name="thumbnail"><br>
                <input type="submit" value="Cadastrar">
            </form>
        </div>
        <?php
        include_once './elements/php/Footer.php'
        ?>
    </body>
</html>