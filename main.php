<?php
require_once "database.php";

$name = $_POST["name"];
$category= $_POST["category"];
$price = $_POST["price"];
$get_id = $_GET["id"];

$edit_name = $_POST["edit_name"];
$edit_category = $_POST["edit_category"];
$edit_price = $_POST["edit_price"];

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

if (isset($_POST["edit_submit"])) {
    $sql = "UPDATE products SET name=?, category=?, price=? WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute([$edit_name, $edit_category, $edit_price, $get_id]);
    header("Location: " . $_SERVER['HTTP_REFERER']);

}
