<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'paradis';

$db = new mysqli(
    $hostname,
    $username,
    $password,
    $database
);

$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(255),
    password varchar(255),
    email varchar(255),
    avatar longblob NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if(!$db->query($sql)) 'Error'.mysqli_error($mysql);

if($db->connect_error) 
    die('Error to connect'.mysqli_error($mysql));
?>