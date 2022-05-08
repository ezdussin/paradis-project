<?php

include_once('../db/mysqli.php');

session_start();

$name = $_POST['name'];
$email = strtolower($_POST['email']);
$password = $_POST['password'];

$avatarFileName = basename($_FILES['avatar']['name']);
$avatarFileType = pathinfo($avatarFileName, PATHINFO_EXTENSION);

$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
if(isset($_FILES['avatar'])){
    if(in_array($avatarFileType, $allowTypes)){
        $avatar = $_FILES['avatar']['tmp_name'];
        $avatarContent = addslashes(file_get_contents($avatar));
    } else{
        $errorMsg = 'Apenas arquivos jpg, png, jpeg, gif são suportados.';
        header('Location: http://localhost/register.php?error='.$errorMsg);
    }
}

$sql = "INSERT INTO users (name, email, password, avatar) VALUES
    ('".$name."', 
    '".$email."', 
    '".$password."',
    '".$avatarContent."')";

$emailSql = "SELECT * FROM users WHERE email = '".$email."'";
$result = $db->query($emailSql);
$emailExists = $result->fetch_all(MYSQLI_ASSOC);

if($emailExists){
    $errorMsg = 'Este email já foi cadastrado...';
} else{
    $errorMsg = 'Não foi possível registrar...';
}

if($db->query($sql) && !$emailExists){
    $sql = "SELECT * FROM `users` WHERE email = '".$email."' AND password = '".$password."' LIMIT 1";

    $result = $db->query($sql);
    $user = $result->fetch_assoc();

    setcookie("userID", $user['id'], time() + (10 * 365 * 24 * 60 * 60), "/");
    header("Location: http://localhost/account.php");
} else{
    $_SESSION['registerErrorMsg'] = $errorMsg;
    header('Location: http://localhost/register.php');
}

$db->close();

die();

?>