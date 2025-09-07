<?php

$host = 'localhost';
$dbname = 'timebridge';
$dbusername = 'root';
$dbpassword = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",$dbusername,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo"Database Connected";
}catch(PDOException $e){
    die("Connection Failed " . $e->getmessage());
}