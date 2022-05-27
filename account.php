<?php

include_once("./db/mysqli.php");

session_start();

if(isset($_COOKIE['userID'])){
    $userID = $_COOKIE['userID'];
    session_destroy();
} else{
    header('Location: http://localhost/login.php');
}

$sql = "SELECT * FROM user WHERE id = '".$userID."' LIMIT 1";

$result = $db->query($sql);
$user = $result->fetch_assoc();

?>

<html lang="pt">
    <head>
        <title>Conta | Paradis</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style.css">
    </head>
    <body>
        <?php
        include_once './elements/php/Header.php'
        ?>
        <div class="container">
            <h3>Conta</h3>
            <div class="account-container flex">
                <div class="left-account">
                <img src="<?php echo !empty($user['avatar']) ? 
                        'data:image/jpg;charset=utf8;base64,'.base64_encode($user['avatar']) : 
                        '/svg/account.svg' ?>" alt="Account">
                </div>
                <div class="right-account">
                    <span>Nome: <?php echo isset($user['name']) ? $user['name'] : ''?></span>
                    <span>Email: <?php echo isset($user['email']) ? $user['email'] : ''?></span>
                    <a href="/queries/logout_query.php">Sair</a>
                    <a href="/register_provider.php">Cadastrar fornecedor</a>
                    <a href="/register_product.php">Cadastrar produto</a>
                    <a href="/register_event.php">Cadastrar evento</a>
                    <a href="/purchase_order.php">Fazer pedido de compra</a>
                </div>
            </div>
        </div>
        <?php
        include_once './elements/php/Footer.php'
        ?>
    </body>
</html>