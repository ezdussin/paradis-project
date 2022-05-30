<?php

include_once('../db/mysqli.php');

session_start();

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$amount = $_POST['amount'];

$imageFileName = basename($_FILES['thumbnail']['name']);
$imageFileType = pathinfo($imageFileName, PATHINFO_EXTENSION);

$allowTypes = array('jpg', 'png', 'jpeg');
if(!empty($imageFileName)){
    if(in_array($imageFileType, $allowTypes)){
        $image = $_FILES['thumbnail']['tmp_name'];
        $imageContent = addslashes(file_get_contents($image));
    } else{
        echo 'Apenas arquivos jpg, png, jpeg, gif são suportados.';
        die();
    }
} else{
    $imageContent = null;
}

$eventSql = "INSERT INTO event (name, description, price, amount, thumbnail) VALUES
    ('".$name."', 
    '".$description."', 
    '".$price."',
    '".$amount."',
    '".$imageContent."')";

if($db->query($eventSql)){
    $_SESSION['eventMsg'] = 'Evento registrado com sucesso!';
    header('Location: http://localhost/register_event.php');
} else{
    $_SESSION['eventErrorMsg'] = 'Não foi possível registrar o evento...';
    header('Location: http://localhost/register_event.php');
}

$db->close();

die();

?>