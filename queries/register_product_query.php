<?php

include_once('../db/mysqli.php');

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
    echo 'Produto registrado com sucesso!<br>';
} else{
    echo mysqli_error($db);
}

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
    echo 'Relação fornecedor/produto efetuada com sucesso!';
} else{
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