<?php

$host = 'localhost';
$db = 'products';
$user = 'root';
$password = '21132113Gg';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $password);
} catch (PDOException $e) {
        echo 'Database error ' . $e->getMessage();
}

