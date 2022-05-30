<?php

include_once('../db/mysqli.php');

session_start();

$email = $_POST['email'];
$name = $_POST['name'];
$telephone = $_POST['telephone'];
$cnpj = $_POST['cnpj'];
$address = $_POST['address'];

$sql = "INSERT INTO provider (email, name, telephone, cnpj, address) VALUES
    ('".$email."', 
    '".$name."', 
    '".$telephone."',
    '".$cnpj."',
    '".$address."')";

$emailSql = "SELECT * FROM provider WHERE email = '".$email."' LIMIT 1";
$result = $db->query($emailSql);
$emailExists = $result->fetch_assoc();

if(!$emailExists){
    if($db->query($sql)){
        $_SESSION['providerMsg'] = 'Fornecedor registrado com sucesso!';
        header('Location: http://localhost/register_provider.php');
    } else{
        $_SESSION['providerErrorMsg'] = 'Não foi possível registrar o fornecedor...';
        header('Location: http://localhost/register_provider.php');
    }
} else {
    $_SESSION['providerErrorMsg'] = 'Este email já foi cadastrado...';
    header('Location: http://localhost/register_provider.php');
}

$db->close();

die();

?>