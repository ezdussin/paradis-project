<?php
include_once('../db/mysqli.php');

session_start();

require_once("../src/PHPMailer.php");
require_once("../src/SMTP.php");
require_once("../src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$_SESSION['toMail'] = $_POST['email'];

$sql = "SELECT * FROM user WHERE email = '".$_SESSION['toMail']."' LIMIT 1";

$result = $db->query($sql);
$user = $result->fetch_assoc();

if(empty($user)) {
    $_SESSION['passwordRecoverErrorMsg'] = 'Email inválido!';
    header("Location: http://localhost/password_recover.php");
    die();
}

$mail = new PHPMailer(true);
$recoverCode = rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9);

try {
	// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'paradiseventosltda@gmail.com';
	$mail->Password = 'paradisS@123';
	$mail->Port = 587;
 
	$mail->setFrom('paradiseventosltda@gmail.com', 'Paradis');
	$mail->addAddress($_SESSION['toMail']);
 
	$mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
	$mail->Subject = 'Recuperação de Senha';
	$mail->Body = 
    '<div style="font-size: 22px; 
    text-align: center;  
    padding: 20px; 
    margin: 20px auto; 
    background-color: #219EBC; 
    font-weight: bolder;
    letter-spacing: 1px;
    border-radius: 15px; 
    width: 600px;">
    <img src="https://i.imgur.com/duc2Iw8.png" alt="Paradis" height="43">
    <span style="display: block;
    color: white;
    padding: 10px 0 20px 0;">
    Seu código para recuperação de senha:</span>
    <span style="color: white; 
    font-size: 72px;
    display: block;
    background-color: #1d0643; 
    padding: 15px; 
    border-radius: 15px; 
    text-decoration: none;
    letter-spacing: 40px;">'.$recoverCode.'</span>
</div>';
	$mail->AltBody = 'Clique para ver seu código de recuperação de senha';
 
	if($mail->send()) {
		$_SESSION['recoverCode'] = $recoverCode;
        header("Location: http://localhost/new_password.php");
	} else {
		$_SESSION['passwordRecoverErrorMsg'] = 'Erro no envio do email!';
        header("Location: http://localhost/password_recover.php");
	}
} catch (Exception $e) {
    $_SESSION['passwordRecoverErrorMsg'] = "Erro no envio do email! {$mail->ErrorInfo}";
    header("Location: http://localhost/password_recover.php");
}

die();
?>