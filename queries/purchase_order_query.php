<?php

include_once('../db/mysqli.php');

session_start();

$provider_name = $_POST['provider_name'];
$product_name = $_POST['product_name'];
$amount = $_POST['amount'];
$total = $_POST['total'];
$unit_price = $_POST['unit_price'];

$sql = "INSERT INTO purchase_order (provider_name, product_name, amount, total_price, unit_price) VALUES
    ('".$provider_name."', 
    '".$product_name."', 
    '".$amount."',
    '".$total."',
    '".$unit_price."')";

if($db->query($sql)){
    $_SESSION['orderMsg'] = 'Pedido de compra efetuado com sucesso!';
    header('Location: http://localhost/purchase_order.php');
} else{
    $_SESSION['orderErrorMsg'] = 'Não foi possível registrar o fornecedor...';
    header('Location: http://localhost/purchase_order.php');
}

$db->close();

die();

?>