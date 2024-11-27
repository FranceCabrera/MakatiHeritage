<?php
include('header.php');

// Initialize selectedItems array if not already set
if (!isset($_SESSION['selectedItems'])) {
    $_SESSION['selectedItems'] = [];
}

$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_lighthouse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products
$sql = "SELECT * FROM products WHERE status = 'available'";
$result = $conn->query($sql);
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="AddCart.css">
</head>
<body>


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center my-4">MENU</h2>
                    
                    <!-- Pastries Section -->
                    <h3 class="text-center my-4">Pastries</h3>
                    <div class="row">
                        <?php
                        foreach ($products as $product) {
                            if ($product['category'] == 'PASTRIES') { ?>
                                <div class="col-md-4">
                                    <div class="product-card">
                                        <form method="post" action="Atc.php?id=<?= $product['product_id'] ?>">
                                            <img src="Image/<?= str_replace(' ', '', $product['product_name']) ?>.jpg" class="img-fluid" alt="<?= $product['product_name'] ?>">
                                            <h2><?= $product['product_name']; ?></h2>
                                            <h2>₱<?= number_format($product['product_price'], 2); ?></h2>
                                            <input type="hidden" name="name" value="<?= $product['product_name'] ?>">
                                            <input type="hidden" name="price" value="<?= $product['product_price'] ?>">
                                            <input type="submit" name="add_to_cart" class="btn btn-Add" value="ADD TO CART" <?php if (in_array($product['product_id'], $_SESSION['selectedItems'])) echo "disabled"; ?>>
                                        </form>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>

                    <!-- Hot Coffee Section -->
                    <h3 class="text-center my-4">Hot Coffee</h3>
                    <div class="row">
                        <?php
                        foreach ($products as $product) {
                            if ($product['category'] == 'HOT COFFEE') { ?>
                                <div class="col-md-4">
                                    <div class="product-card">
                                        <form method="post" action="Atc.php?id=<?= $product['product_id'] ?>">
                                            <img src="Image/<?= str_replace(' ', '', $product['product_name']) ?>.jpg" class="img-fluid" alt="<?= $product['product_name'] ?>">
                                            <h2><?= $product['product_name']; ?></h2>
                                            <h2>₱<?= number_format($product['product_price'], 2); ?></h2>
                                            <input type="hidden" name="name" value="<?= $product['product_name'] ?>">
                                            <input type="hidden" name="price" value="<?= $product['product_price'] ?>">
                                            <input type="submit" name="add_to_cart" class="btn btn-Add" value="ADD TO CART" <?php if (in_array($product['product_id'], $_SESSION['selectedItems'])) echo "disabled"; ?>>
                                        </form>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>

                    <!-- Cold Coffee Section -->
                    <h3 class="text-center my-4">Cold Coffee</h3>
                    <div class="row">
                        <?php
                        foreach ($products as $product) {
                            if ($product['category'] == 'COLD COFFEE') { ?>
                                <div class="col-md-4">
                                    <div class="product-card">
                                        <form method="post" action="Atc.php?id=<?= $product['product_id'] ?>">
                                            <img src="Image/<?= str_replace(' ', '', $product['product_name']) ?>.jpg" class="img-fluid" alt="<?= $product['product_name'] ?>">
                                            <h2><?= $product['product_name']; ?></h2>
                                            <h2>₱<?= number_format($product['product_price'], 2); ?></h2>
                                            <input type="hidden" name="name" value="<?= $product['product_name'] ?>">
                                            <input type="hidden" name="price" value="<?= $product['product_price'] ?>">
                                            <input type="submit" name="add_to_cart" class="btn btn-Add" value="ADD TO CART" <?php if (in_array($product['product_id'], $_SESSION['selectedItems'])) echo "disabled"; ?>>
                                        </form>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>

                    <!-- Tea Section -->
                    <h3 class="text-center my-4">Tea</h3>
                    <div class="row">
                        <?php
                        foreach ($products as $product) {
                            if ($product['category'] == 'TEA') { ?>
                                <div class="col-md-4">
                                    <div class="product-card">
                                        <form method="post" action="Atc.php?id=<?= $product['product_id'] ?>">
                                            <img src="Image/<?= str_replace(' ', '', $product['product_name']) ?>.jpg" class="img-fluid" alt="<?= $product['product_name'] ?>">
                                            <h2><?= $product['product_name']; ?></h2>
                                            <h2>₱<?= number_format($product['product_price'], 2); ?></h2>
                                            <input type="hidden" name="name" value="<?= $product['product_name'] ?>">
                                            <input type="hidden" name="price" value="<?= $product['product_price'] ?>">
                                            <input type="submit" name="add_to_cart" class="btn btn-Add" value="ADD TO CART" <?php if (in_array($product['product_id'], $_SESSION['selectedItems'])) echo "disabled"; ?>>
                                        </form>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                    <!-- Ice Blended Section -->
                    <h3 class="text-center my-4">Ice Blended</h3>
                    <div class="row">
                        <?php
                        foreach ($products as $product) {
                            if ($product['category'] == 'ICE BLENDED') { ?>
                                <div class="col-md-4">
                                    <div class="product-card">
                                        <form method="post" action="Atc.php?id=<?= $product['product_id'] ?>">
                                            <img src="Image/<?= str_replace(' ', '', $product['product_name']) ?>.jpg" class="img-fluid" alt="<?= $product['product_name'] ?>">
                                            <h2><?= $product['product_name']; ?></h2>
                                            <h2>₱<?= number_format($product['product_price'], 2); ?></h2>
                                            <input type="hidden" name="name" value="<?= $product['product_name'] ?>">
                                            <input type="hidden" name="price" value="<?= $product['product_price'] ?>">
                                            <input type="submit" name="add_to_cart" class="btn btn-Add" value="ADD TO CART" <?php if (in_array($product['product_id'], $_SESSION['selectedItems'])) echo "disabled"; ?>>
                                        </form>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 text-center my-4">
                    <a href="Atc.php" class="btn btn-success btn-block btn-custom">Go to Cart</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
