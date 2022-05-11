<?php

include_once('../db/mysqli.php');

session_start();

$product_name = $_POST['product_name'];
$description = $_POST['description'];
$price = $_POST['price'];
$amount = $_POST['amount'];

$imageFileName = basename($_FILES['thumbnail']['name']);
$imageFileType = pathinfo($imageFileName, PATHINFO_EXTENSION);

$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
if(isset($_FILES['thumbnail'])){
    if(in_array($imageFileType, $allowTypes)){
        $image = $_FILES['thumbnail']['tmp_name'];
        $imageContent = addslashes(file_get_contents($image));
    } else{
        $errorMsg = 'Apenas arquivos jpg, png, jpeg, gif são suportados.';
        $_SESSION['registerProductErrorMsg'] = $errorMsg;
        $imageContent = null;
    }
}

$sql = "INSERT INTO product (product_name, description, price, amount, thumbnail) VALUES
    ('".$product_name."', 
    '".$description."', 
    '".$price."',
    '".$amount."',
    '".$imageContent."')";

if($db->query($sql)){
    echo 'Produto registrado com sucesso!';
} else{
    $_SESSION['registerProductErrorMsg'] = $errorMsg;
    echo mysqli_error($db);
}

$db->close();

?>

<br>
<br>
<a href="/account.php">Voltar Para Conta</a><br>
<a href="/register_product.php">Registrar Outro Produto</a>

<?php

die();

?>