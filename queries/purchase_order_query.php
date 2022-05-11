<?php

include_once('../db/mysqli.php');

session_start();

$provider = $_POST['provider'];
$product_name = $_POST['product_name'];
$amount = $_POST['amount'];
$total = $_POST['total'];
$unit_price = $_POST['unit_price'];

$sql = "INSERT INTO purchase_order (provider, product_name, amount, total_price, unit_price) VALUES
    ('".$provider."', 
    '".$product_name."', 
    '".$amount."',
    '".$total."',
    '".$unit_price."')";

if($db->query($sql)){
    echo 'Pedido efetuado com sucesso!';
} else{
    $_SESSION['registerProductErrorMsg'] = $errorMsg;
    echo mysqli_error($db);
}

$db->close();

?>

<br>
<br>
<a href="/account.php">Voltar Para Conta</a><br>
<a href="/purchase_order.php">Fazer Outro Pedido de Compra</a>

<?php

die();

?>