<?php

/** @var $pdo \PDO */
require_once "../../database.php";
require_once "../../functions.php";

$errors = [];

$title = '';
$price = '';
$description = '';
$product = [
    'image' => '',
];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Validate
    require_once "../../validate_product.php";

    if(empty($errors)) {
       
        // Insert new
        $statement = $pdo->prepare("insert into products(title, image, description, price, create_date) values(:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $image_path);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));
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

    <h1>Create new Product</h1>

    <!-- Form -->
    <?php include_once "../../views/products/form.php" ?>

<!-- Footer -->
</body>
</html>