<?php

include_once("./db/mysqli.php");

if(isset($_COOKIE['userID'])){
    $userID = $_COOKIE['userID'];
} else{
    header('Location: http://localhost/login.php');
}

$sql = "SELECT * FROM `users` WHERE id = '".$userID."' LIMIT 1";

$result = $db->query($sql);
$user = $result->fetch_assoc();

?>

<html lang="pt">
    <head>
        <title>Paradis | HOME</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="elements/css/Header.css">
        <link rel="stylesheet" href="elements/css/Footer.css">
    </head>
    <body>
        <?php
        include_once './elements/php/Header.php'
        ?>
        <div class="container">
            <h3>Conta</h3>
            <div class="account-container flex">
                <div class="left-account">
                    <img src="<?php echo isset($user['avatar']) ? 'data:image/jpg;charset=utf8;base64,'.base64_encode($user['avatar']) : '../../svg/account.svg'; ?>" />
                </div>
                <div class="right-account">
                    <span>Nome: <?php echo isset($user['name']) ? $user['name'] : ''?></span><br>
                    <span>Email: <?php echo isset($user['email']) ? $user['email'] : ''?></span><br>
                    <span>Senha: <?php echo isset($user['password']) ? $user['password'] : ''?></span><br>
                    <a href="./queries/logout_query.php">LogOut</a>
                </div>
            </div>
        </div>
        <?php
        include_once './elements/php/Footer.php'
        ?>
    </body>
    <script src="./script.js"></script>
</html>