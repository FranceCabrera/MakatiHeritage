<?php
session_start();

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

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $method = $_POST['method'];
    $customer_id = $_SESSION['user_id']; // Assuming user_id is stored in session
    $cart_items = $_SESSION['cart'] ?? [];

    foreach ($cart_items as $item) {
        $product_id = $item['id'];
        $product_name = $item['name'];
        $quantity = $item['quantity'];
        $product_price = $item['price'];

        $sql = "INSERT INTO orderlist (customer_id, product_id, product_name, quantity, product_price, status) VALUES (?, ?, ?, ?, ?, 'pending')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisid", $customer_id, $product_id, $product_name, $quantity, $product_price);
        $stmt->execute();
    }

    // Clear the cart after placing the order
    unset($_SESSION['cart']);
    $_SESSION['selectedItems'] = array();

    $response['success'] = true;
}

$conn->close();

echo json_encode($response);
?>
