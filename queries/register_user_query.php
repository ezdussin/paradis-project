<?php

include_once('../db/mysqli.php');

session_start();

$name = $_POST['name'];
$email = strtolower($_POST['email']);
$password = $_POST['password'];

$imageFileName = basename($_FILES['avatar']['name']);
$imageFileType = pathinfo($imageFileName, PATHINFO_EXTENSION);

$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
if(!empty($imageFileName)){
    if(in_array($imageFileType, $allowTypes)){
        $image = $_FILES['avatar']['tmp_name'];
        $imageContent = addslashes(file_get_contents($image));
    } else{
        $_SESSION['registerUserErrorMsg'] = 'Apenas arquivos jpg, png, jpeg, gif são suportados.';
        header('Location: http://localhost/register_user.php');
        die();
    }
} else{
    $imageContent = null;
}

$sql = "INSERT INTO user (name, email, password, avatar) VALUES
    ('".$name."', 
    '".$email."', 
    '".$password."',
    '".$imageContent."')";

$emailSql = "SELECT * FROM user WHERE email = '".$email."' LIMIT 1";
$result = $db->query($emailSql);
$emailExists = $result->fetch_assoc();

if(!$emailExists){
    if($db->query($sql)){
        $userSql = "SELECT * FROM user WHERE email = '".$email."' AND password = '".$password."' LIMIT 1";
        $result = $db->query($userSql);
        $user = $result->fetch_assoc();
        setcookie("userID", $user['id'], time() + (10 * 365 * 24 * 60 * 60), "/");
        header("Location: http://localhost/account.php");
    } else {
        $_SESSION['registerUserErrorMsg'] = 'Não foi possível registrar...';
        header('Location: http://localhost/register_user.php');
    }
} else{
    $_SESSION['registerUserErrorMsg'] = 'Este email já foi cadastrado...';
    header('Location: http://localhost/register_user.php');
}

$db->close();

die();

?>