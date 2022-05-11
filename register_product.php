<?php
    include_once("./db/mysqli.php");

    session_start();

    if(!isset($_COOKIE['userID'])){
        unset($_SESSION['loginErrorMsg']);
        unset($_SESSION['registerUserErrorMsg']);
        header('Location: http://localhost/login.php');
    }

    $sql = "SELECT * FROM provider";

    $providers = $db->query($sql);
    $providers->fetch_all(MYSQLI_ASSOC);
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
                <label for="provider_id">Fornecedor:</label><br>
                <select name="provider_id" required>
                    <option value="" disabled hidden selected></option>
                    <?php
                    foreach($providers as $provider){
                        echo '<option value="'.$provider['id'].'">'.$provider['name'].'</select>';
                    }
                    ?>
                </select>
                <label for="product_name">Produto:</label><br>
                <input type="text" name="product_name" required><br>
                <label for="description">Descrição:</label><br>
                <input type="text" name="description" required><br>
                <label for="price">Valor:</label><br>
                <input type="number" name="price" min=".01" step=".01" required><br>
                <label for="amount">Quantidade:</label><br>
                <input type="number" name="amount" min="1" required><br>
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