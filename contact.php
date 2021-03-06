<?php
include_once("./db/mysqli.php");

session_start();
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Contato | Paradis</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style.css">
    </head>
    <body>
        <?php
        include_once './elements/php/Header.php'
        ?>
        <div class="container flex">
            <form action="/queries/contact_query.php" method="POST">
                <h3>Contate-nos</h3>
                <?php 
                if(isset($_SESSION['contactMsg'])){
                    echo '<p class="warning" style="color: green; border: 2px solid green;">'.$_SESSION['contactMsg'].'</p>';
                    session_destroy(); 
                }
                ?>
                <label for="name">Nome:</label>
                <input type="text" name="name" required>
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <label for="tellphone">Telefone:</label>
                <input type="text" name="telephone" required>
                <label for="subject">Assunto:</label>
                <input type="text" name="subject" value="<?php echo isset($_GET['assunto']) ? $_GET['assunto'] : '' ?>" required>
                <label for="message">Mensagem:</label><br>
                <textarea name="message" rows="10" maxlength="6000" required></textarea>
                <input type="submit" value="Enviar">
            </form>
        </div>  
        <?php
        include_once './elements/php/Footer.php'
        ?>
    </body>
</html>