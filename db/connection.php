<?php
$dbSetup = "mysql:host=localhost;dbname=b;charset=utf8;";
$username = "root";
$password = "";
$errMode = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$conn = new PDO($dbSetup, $username, $password, $errMode);
?>