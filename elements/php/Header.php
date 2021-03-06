<?php

include_once("./db/mysqli.php");

if(isset($_COOKIE['userID'])){
    $userID = $_COOKIE['userID'];

    $sql = "SELECT * FROM user WHERE id = '".$userID."' LIMIT 1";

    $result = $db->query($sql); 
    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html class="dark-mode">
    <head>
        <link rel="stylesheet" href="/elements/css/Header.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="/"><img src="/svg/paradis.svg" alt="Paradis" height="30"></a>
                <form action="">
                    <img src="/svg/search.svg" alt="Lupa" width="20" height="20">
                    <input type="text" name="search" placeholder="Pesquisar shows, eventos e produtos">
                    <input type="submit" value="PROCURAR">
                </form>
                <ul>
                    <li class="main-li"><a href="/stores.php">Lojas</a></li>
                    <li class="main-li"><a href="/promote.php">Organize</a></li>
                </ul>
                <div class="login-header">
                    <a href="<?php echo isset($user['avatar']) ? '/account.php' : '/login.php' ?>">
                        <img src="<?php echo !empty($user['avatar']) ? 
                        'data:image/jpg;charset=utf8;base64,'.base64_encode($user['avatar']) : 
                        '/svg/account.svg' ?>" alt="Account" width="40" height="40">
                        <?php echo isset($user) ? '' : "<span>Entrar</span>" ?>
                    </a>                
                </div>
            </nav>
        </header>
    </body>
</html>