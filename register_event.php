<?php
    include_once("./db/mysqli.php");

    session_start();

    if(!isset($_COOKIE['userID'])){
        session_destroy();
        header('Location: http://localhost/login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Cadastro Evento | Paradis</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style.css">
    </head>
    <body>
        <?php
        include_once './elements/php/Header.php'
        ?>
        <div class="container flex">
            <form action="/queries/register_event_query.php" method='POST' enctype="multipart/form-data">
                <h3>Cadastrar Evento</h3>
                <label for="name">Nome:</label><br>
                <input type="text" name="name" required><br>
                <label for="description">Descrição:</label><br>
                <input type="text" name="description"><br>
                <label for="price">Valor:</label><br>
                <input type="number" name="price" min=".01" step=".01" required><br>
                <label for="amount">Quantidade:</label><br>
                <input type="number" name="amount" min="1" required><br>
                <label for="thumbnail">Miniatura:</label><br>
                <input type="file" name="thumbnail" required><br>
                <input type="submit" value="Cadastrar">
            </form>
        </div>
        <?php
        include_once './elements/php/Footer.php'
        ?>
    </body>
</html>