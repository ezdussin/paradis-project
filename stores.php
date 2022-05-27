<?php
include_once("./db/mysqli.php");

$productsSql = "SELECT * FROM product";

$products = $db->query($productsSql);
$products->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Lojas | Paradis</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style.css">
    </head>
    <body>
        <?php
        include_once './elements/php/Header.php'
        ?>
        <div class="container-content">
            <h2>Produtos</h2>
            <div class="container-products-content">
                <div class="products-container">
                    <?php
                    foreach($products as $product){
                        echo '<div class="product-block">
                        <div class="product-block-image">
                        <a href="#"><img src="'.'data:image/jpg;charset=utf8;base64,'.base64_encode($product['thumbnail']).'" alt="Produto"></a>
                        </div>
                        <h4>'.$product['name'].'</h4>
                        <span>R$ '.$product['price'].'</span>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>  
        <?php
        include_once './elements/php/Footer.php'
        ?>
    </body>
</html>