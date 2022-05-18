<?php

include_once('../db/mysqli.php');

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
    echo 'Evento registrado com sucesso!<br>';
} else{
    echo mysqli_error($db);
}

$db->close();

?>

<br>
<br>
<a href="/account.php">Voltar Para Conta</a><br>
<a href="/register_event.php">Registrar Outro Evento</a>

<?php

die();

?>