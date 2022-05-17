<?php

include_once('../db/mysqli.php');

session_start();

$email = strtolower($_POST['email']);
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE email = '".$email."' AND password = '".$password."' LIMIT 1";

$result = $db->query($sql);
$user = $result->fetch_assoc();

mysqli_free_result($result);

// if(isset($_COOKIE['userID'])){
//     $_SESSION['loginErrorMsg'] = 'Você já está logado!';
//     header("Location: http://localhost/login.php");
// } else
if(isset($user)){
    setcookie("userID", $user['id'], time() + (86400 * 30), "/");
    header("Location: http://localhost/account.php");
} else{
    $_SESSION['loginErrorMsg'] = 'Email ou senha inválidos!';
    header("Location: http://localhost/login.php");
}

$db->close();

die();

?>