<?php
    include_once("./db/mysqli.php");

    session_start();

    if(!isset($_COOKIE['userID'])){
        unset($_SESSION['loginErrorMsg']);
        unset($_SESSION['registerUserErrorMsg']);
        header('Location: http://localhost/login.php');
    }

    $provSql = "SELECT * FROM provider";

    $providers = $db->query($provSql);
    $providers->fetch_all(MYSQLI_ASSOC);

    $prodSql = "SELECT * FROM product";

    $products = $db->query($prodSql);
    $products->fetch_all(MYSQLI_ASSOC);
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
            <form action="/queries/purchase_order_query.php" method='POST' enctype="multipart/form-data">
                <h3>Fazer Pedido de Compra</h3>
                <label for="provider_name">Fornecedor:</label><br>
                <select name="provider_name" required>
                    <option value="" disabled hidden selected></option>
                    <?php
                    foreach($providers as $provider){
                        echo '<option value="'.$provider['name'].'">'.$provider['name'].'</option>';
                    }
                    ?>
                </select>
                <label for="product_name">Produto:</label><br>
                <select name="product_name" required>
                    <option value="" disabled hidden selected></option>
                    <?php
                    foreach($products as $product){
                        echo '<option value="'.$product['name'].'">'.$product['name'].'</option>';
                    }
                    ?>
                </select>
                <label for="amount">Quantidade:</label><br>
                <input type="number" name="amount" min="1" id="amount" onchange="calculateTotal(<?php echo $product['price'] ?>)" required><br>
                <label for="unit_price">Preço Unitário:</label><br>
                <input type="number" name="unit_price" id="unit_price" readonly><br>
                <label for="total">Total:</label><br>
                <input type="number" name="total" id="total" readonly><br>
                <input type="submit" value="Fazer Pedido">
            </form>
        </div>
        <?php
        include_once './elements/php/Footer.php'
        ?>
    </body>
    <script src="/script.js"></script>
</html>