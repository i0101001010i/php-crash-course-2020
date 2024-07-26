<?php

$pdo = new PDO('mysql:host=localhost; port=3306; dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'] ?? null;
if(!$id) {
    header('location: index.php');
    exit;
}

$statement = $pdo->prepare('delete from products where id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('location: index.php');