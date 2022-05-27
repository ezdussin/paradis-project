<?php
session_start();

include_once('../db/mysqli.php');

$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO message (name, email, telephone, subject, message) VALUES
    ('".$name."', 
    '".$email."', 
    '".$telephone."',
    '".$subject."',
    '".$message."')";

if($db->query($sql)){
    $_SESSION['contactMsg'] = 'Mensagem enviada com sucesso!';
    header("Location: http://localhost/contact.php");
} else{
    $_SESSION['contactMsg'] = 'Algo deu errado...';
    header("Location: http://localhost/contact.php");
}

$db->close();
die();

?>