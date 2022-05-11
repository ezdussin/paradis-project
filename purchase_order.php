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
        <title>Pedido de Compra | Paradis</title>
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
                <h3>Fazer Pedido de Compra</h3>
                <?php
                if(isset($_SESSION['registerErrorMsg'])){
                    echo '<p class="warning" style="color: red; border: 2px solid red;">'.$_SESSION['registerErrorMsg'].'</p>';
                    unset($_SESSION['registerErrorMsg']);
                }
                ?>
                <label for="provider_name">Fornecedor:</label><br>
                <select name="provider_name">
                    <!-- Opções de Fornecedores -->
                </select>
                <label for="product_name">Produto:</label><br>
                <select name="product_name">
                    <!-- Opções de Produtos -->
                </select>
                <label for="amount">Quantidade:</label><br>
                <input type="number" name="amount" required><br>
                <label for="unit_price">Preço Unitário:</label><br>
                <input type="number" name="unit_price" readonly><br>
                <label for="total">Total:</label><br>
                <input type="number" name="total" readonly><br>
                <input type="submit" value="Fazer Pedido">
            </form>
        </div>
        <?php
        include_once './elements/php/Footer.php'
        ?>
    </body>
</html>