<?php

include_once("./db/mysqli.php");

if(isset($_COOKIE['userID'])){
    $userID = $_COOKIE['userID'];

    $sql = "SELECT * FROM `users` WHERE id = '".$userID."' LIMIT 1";

    $result = $db->query($sql); 
    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html>
    <body>
        <header>
            <nav>
                <a href="/"><h1>Paradis</h1></a>
                <form action="">
                    <img src="../../svg/search.svg" alt="Lupa" width="20" height="20">
                    <input type="text" name="search" placeholder="Pesquisar shows e eventos">
                    <input type="submit" value="PROCURAR">
                </form>
                <ul>
                    <li class="main-li"><a href="#">Sobre Nós</a></li>
                    <li class="main-li"><a href="#">Contato</a></li>
                </ul>
                <div class="login-header">
                    <a href="<?php echo isset($user['avatar']) ? './account.php' : './login.php' ?>">
                        <img src="<?php echo isset($user['avatar']) ? 
                        'data:image/jpg;charset=utf8;base64,'.base64_encode($user['avatar']) : 
                        '../../svg/account.svg' ?>" alt="Account" width="40" height="40">
                    </a>                
                </div>
            </nav>
        </header>
    </body>
</html>