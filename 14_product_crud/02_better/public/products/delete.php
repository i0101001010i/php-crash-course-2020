<?php

/** @var $pdo \PDO */
require_once "../../database.php";;

// Get id to delete
$id = $_POST['id'] ?? null;
if(!$id) {
    header('location: index.php');
    exit;
}

// Delete
$statement = $pdo->prepare('delete from products where id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('location: index.php');