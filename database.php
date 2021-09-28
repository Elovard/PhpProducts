<?php

$host = 'localhost';
$db = 'test_schema';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $password);
} catch (PDOException $e) {
        echo 'Database error ' . $e->getMessage();
}

