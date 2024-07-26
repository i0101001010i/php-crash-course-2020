<?php

$pdo = new PDO('mysql:host=localhost; port=3306; dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ?? null;
if(!$id) {
    header('location: index.php');
    exit;
}

$statement = $pdo->prepare('select * from products where id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

$errors = [];
$title = $product['title'];
$price = $product['price'];
$description = $product['description'];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title']; // test
    $description = $_POST['description'];
    $price = $_POST['price'];

    if(!$title) {
        $errors[] = 'Product title is required';
    }
    if(!$price) {
        $errors[] = 'Product price is required';
    }

    // make directory if it not exists
    if(!is_dir('images')) {
        mkdir('images');
    }

    if(empty($errors)) {
        $image = $_FILES['image'] ?? null;
        $image_path = $product['image'];

        
        if($image && $image['tmp_name']) {
            
            if($product['image']) {
                unlink($product['image']);
            }
            
            $image_path = 'images/' . randomString(8) . '/' . $image['name'];
            mkdir(dirname($image_path));

            move_uploaded_file($image['tmp_name'], $image_path);
        }

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

function randomString($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i=0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }
    return $str;
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Products CRUD</title>
</head>
<body>

    <p>
        <a href="index.php" class="btn btn-secondary">Go Back</a>
    </p>

    <h1>Update Product <b><?php echo $title ?></b> </h1>

    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div><?php echo $error ?></div>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <form action="" method="post" enctype="multipart/form-data">

        <?php if($product['image']): ?>
            <img src="<?php echo $product['image'] ?>" class="update-image" alt="">
        <?php endif; ?>

        <div class="mb-3">
            <label" class="form-label">Product Image</label>
            <br>
            <input type="file" name="image">
        </div>
        <div class="mb-3">
            <label" class="form-label">Product Title</label>
            <input type="text" name="title" value="<?php echo $title ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label" class="form-label">Product Desciption</label>
            <textarea class="form-control" name="description"><?php echo $description ?></textarea>
        </div>
        <div class="mb-3">
            <label" class="form-label">Product Price</label>
            <input type="number" step=".01" name="price" value="<?php echo $price ?>" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>
</html>