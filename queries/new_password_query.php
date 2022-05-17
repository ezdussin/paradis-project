<?php
include_once('../db/mysqli.php');

session_start();

$recoverCode = $_POST['recover_code'];
$password = $_POST['password'];

$sql = "UPDATE user SET password = '".$password."' WHERE email = '".$_SESSION['toMail']."'";

if($db->query($sql) && $recoverCode == $_SESSION['recoverCode']){
    header("Location: http://localhost/login.php");
    unset($_SESSION['recoverCode']);
    unset($_SESSION['email']);  
} else {
    $_SESSION['newPasswordErrorMsg'] = 'Código de recuperação inválido!';
    header("Location: http://localhost/new_password.php");
}

die();
?>