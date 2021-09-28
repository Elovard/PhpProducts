<?php
require_once "database.php";

$name = $_POST["name"];
$category= $_POST["category"];
$price = $_POST["price"];
$get_id = $_GET["id"];

if (isset ($_POST["submit"])) {
    $sql = ("INSERT INTO products (name, category, price) VALUES (?, ?, ?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $category, $price]);

    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

$sql = $pdo->prepare("SELECT * FROM `products`");
$sql->execute();
$result = $sql->fetchAll();

if (isset($_POST["delete_submit"])) {
    $sql = "DELETE FROM products WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
