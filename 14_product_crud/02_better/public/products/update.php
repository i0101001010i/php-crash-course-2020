<?php

/** @var $pdo \PDO */
require_once "../../database.php";
require_once "../../functions.php";

// Get id to update
$id = $_GET['id'] ?? null;
if(!$id) {
    header('location: index.php');
    exit;
}

// Get data
$statement = $pdo->prepare('select * from products where id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

$errors = [];

$title = $product['title'];
$price = $product['price'];
$description = $product['description'];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Validate
    require_once "../../validate_product.php";

    if(empty($errors)) {

        // Update
        $statement = $pdo->prepare("update products set title = :title, image = :image, description = :description, price = :price where id = :id");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $image_path);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);
        $statement->execute();

        header('location: index.php');
    }
}

?>

<!-- Header -->
<?php include_once "../../views/partials/header.php"; ?>

    <p>
        <a href="index.php" class="btn btn-secondary">Go Back</a>
    </p>

    <h1>Update Product <b><?php echo $title ?></b> </h1>

    <!-- Form -->
    <?php include_once "../../views/products/form.php" ?>

<!-- Footer -->
</body>
</html>