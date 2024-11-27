<?php
session_start();

// Initialize selectedItems session variable if not set
$_SESSION['selectedItems'] = $_SESSION['selectedItems'] ?? array();

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['cart'])) {
        $session_array_id = array_column($_SESSION['cart'], "id");

        if (!in_array($_GET['id'], $session_array_id)) {
            array_push($_SESSION['selectedItems'], $_GET['id']);
            $session_array = array(
                'id' => $_GET['id'],
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity'] ?? 1
            );
            $_SESSION['cart'][] = $session_array;
        }
    } else {
        $session_array = array(
            'id' => $_GET['id'],
            "name" => $_POST['name'],
            "price" => $_POST['price'],
            "quantity" => $_POST['quantity'] ?? 1
        );
        $_SESSION['cart'][] = $session_array;
    }
}

if (isset($_POST['update_cart'])) {
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $_POST['id']) {
            $item['quantity'] = $_POST['quantity'];
        }
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                foreach ($_SESSION['selectedItems'] as $index => $selectedId) {
                    if ($selectedId == $_GET['id']) {
                        unset($_SESSION['selectedItems'][$index]);
                    }
                }
                unset($_SESSION['cart'][$key]);
            }
        }
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }

    if ($_GET['action'] == 'clearall') {
        unset($_SESSION['cart']);
        $_SESSION['selectedItems'] = array();
    }

    if ($_GET['action'] == 'checkout') {
        // Handle checkout process here
        // For now, just clear the cart and redirect to a confirmation page
        unset($_SESSION['cart']);
        header("Location: checkout.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="AddCart.css">
    <script>
        function updatePrice(id, price) {
            var quantity = document.getElementById('quantity-' + id).value;
            var totalElement = document.getElementById('total-' + id);
            var newTotal = price * quantity;
            totalElement.innerHTML = '₱' + newTotal.toFixed(2);
            updateCartTotal();
        }

        function updateCartTotal() {
            var total = 0;
            var quantities = document.getElementsByClassName('item-quantity');
            var prices = document.getElementsByClassName('item-price');
            
            for (var i = 0; i < quantities.length; i++) {
                var quantity = quantities[i].value;
                var price = prices[i].getAttribute('data-price');
                total += quantity * price;
            }
            
            document.getElementById('cart-total').innerHTML = '₱' + total.toFixed(2);
        }
    </script>
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="text-center my-4">Shopping Cart Data</h2>
                    <div class="col-md-12">
                        <div class="row">
                            <!-- Display products statically as an example -->
                            <?php
                            $products = [
                                ["id" => 1, "name" => "Product 1", "price" => 100, "image" => "product1.jpg"],
                                ["id" => 2, "name" => "Product 2", "price" => 200, "image" => "product2.jpg"],
                                ["id" => 3, "name" => "Product 3", "price" => 300, "image" => "product3.jpg"],
                            ];

                            foreach ($products as $product) { ?>
                                <div class="col-md-4">
                                    <div class="product-card">
                                        <form method="post" action="ATC.php?id=<?= $product['id'] ?>">
                                            <img src="img/<?= $product['image'] ?>" class="img-fluid">
                                            <h2><?= $product['name']; ?></h2>
                                            <h2>₱<?= number_format($product['price'], 2); ?></h2>
                                            <input type="hidden" name="name" value="<?= $product['name'] ?>">
                                            <input type="hidden" name="price" value="<?= $product['price'] ?>">
                                            <input type="submit" name="add_to_cart" class="btn btn-Add" value="ADD TO CART" <?php if (in_array($product['id'], $_SESSION['selectedItems'])) echo "disabled"; ?>>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h2 class="text-center my-4">Item Selected</h2>
                    <table class='table table-bordered table-striped table-custom'>
                        <tr>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Item Quantity</th>
                            <th>Item Total</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                        $total = 0;
                        if (!empty($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                echo "
                                <tr>
                                    <td>{$value['id']}</td>
                                    <td>{$value['name']}</td>
                                    <td class='item-price' data-price='{$value['price']}'>₱{$value['price']}</td>
                                    <td><input type='number' name='quantity' value='{$value['quantity']}' min='1' class='form-control mb-2 item-quantity' id='quantity-{$value['id']}' onchange='updatePrice({$value['id']}, {$value['price']})'></td>
                                    <td id='total-{$value['id']}'>₱" . number_format($value['price'] * $value['quantity'], 2) . "</td>
                                    <td>
                                        <a href='ATC.php?action=remove&id={$value['id']}'>
                                            <button class='btn btn-danger btn-block btn-custom'>Remove</button>
                                        </a>
                                    </td>
                                </tr>
                                ";
                                $total += $value['quantity'] * $value['price'];
                            }
                            echo "
                            <tr>
                                <td colspan='4' class='text-right'><b>Total</b></td>
                                <td id='cart-total'>₱" . number_format($total, 2) . "</td>
                                <td>
                                    <a href='ATC.php?action=clearall'>
                                        <button class='btn btn-danger btn-block btn-custom'>Clear Cart</button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='6' class='text-right'>
                                    <a href='ATC.php?action=checkout'>
                                        <button class='btn btn-success btn-block btn-custom'>Proceed to Checkout</button>
                                    </a>
                                </td>
                            </tr>
                            ";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7">
                    <a href="Landingpage.php" class="btn btn-success btn-block btn-custom">Home</a>
                </div>
            </div>
        </div>  
    </div>
</body>
</html>
