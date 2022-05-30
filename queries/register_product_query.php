<?php

include_once('../db/mysqli.php');

session_start();

$provider_id = $_POST['provider_id'];
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

// Insert product
$prodSql = "INSERT INTO product (name, description, price, amount, thumbnail) VALUES
    ('".$name."', 
    '".$description."', 
    '".$price."',
    '".$amount."',
    '".$imageContent."')";

    
    
if($db->query($prodSql)){
    // Fetch just inserted product id
    $fetchProdSql = "SELECT id FROM product WHERE name = '".$name."' LIMIT 1";
    
    $result = $db->query($fetchProdSql);
    $product = $result->fetch_assoc();
    $product_id = $product['id'];
    
    // Insert foreign relation prov_prod
    $provSql = "INSERT INTO prov_prod (id_prov, id_prod) VALUES
    ('".$provider_id."', 
    '".$product_id."')";

    if($db->query($provSql)){
        $_SESSION['productMsg'] = 'Produto registrado com sucesso!';
        header('Location: http://localhost/register_product.php');
    } else{
        $_SESSION['productErrorMsg'] = 'Não foi possível registrar a relação entre produto e fornecedor...';
        header('Location: http://localhost/register_product.php');
    }
} else{
    $_SESSION['productErrorMsg'] = 'Não foi possível registrar o produto...';
    header('Location: http://localhost/register_product.php');
}

$db->close();

die();

?>