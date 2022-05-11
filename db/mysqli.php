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

if($db->connect_error) 
    die('Error to connect'.mysqli_error($db));
    
?>