<?php

$server_name = 'localhost';
$username = 'root';
$password = '';
$db = 'crud';

try {
    $conn = new PDO("mysql:host=$server_name;$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed";
}