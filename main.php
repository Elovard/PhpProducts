<?php
require_once "database.php";

$name = $_POST["name"];
$category= $_POST["category"];
$price = $_POST["price"];
$get_id = $_GET["id"];



if (isset ($_POST["submit"])) {
    $sql = ("INSERT INTO test_schema.products (name, category, price) VALUES (?, ?, ?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $category, $price]);

    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
