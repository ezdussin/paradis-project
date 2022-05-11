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

if($db->query($sql)){
    echo 'Fornecedor registrado com sucesso!';
} else{
    $_SESSION['registerProductErrorMsg'] = $errorMsg;
    echo mysqli_error($db);
}

$db->close();

?>

<br>
<br>
<a href="/account.php">Voltar Para Conta</a><br>
<a href="/register_provider.php">Registrar Outro Fornecedor</a>

<?php

die();

?>