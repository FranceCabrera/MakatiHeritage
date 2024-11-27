<?php
session_start();

$delivery_fee = 38;
$total_price = 0;
$cart_items = $_SESSION['cart'] ?? [];

foreach ($cart_items as $item) {
    $total_price += $item['price'] * $item['quantity'];
}
$total_price += $delivery_fee;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="orders.css">
</head>
<body>
    <div class="container">
        <h1>LIGHTHOUSE CAFE</h1>
        <p>Delivered by GrabFood</p>
        <h3>ORDER SUMMARY</h3>
        <h5>_____________________________________</h5>
        <h2>Product</h2>
        <?php if (!empty($cart_items)) { ?>
            <?php foreach ($cart_items as $item) { ?>
                <h2 class="product-name"><?= $item['name'] ?></h2>
                <h4>QTY: <?= $item['quantity'] ?></h4>
                <h2 class="Product-Price">₱<?= number_format($item['price'] * $item['quantity'], 2) ?></h2>
            <?php } ?>
            <h5 class="delivery-fee">Delivery Fee</h5>
            <h5 class="delivery-fee-price">₱<?= number_format($delivery_fee, 2) ?></h5>
            <h6>TOTAL</h6>
            <h5 class="line1">_____________________________________</h5>
            <h5 class="total-product">₱<?= number_format($total_price, 2) ?></h5>
            <h5 class="method">METHOD</h5>

            <form id="deliveryForm">
                <label>
                    <input type="radio" name="deliveryOption" value="Delivery" onclick="toggleLayout('delivery')">
                    Delivery
                </label><br>

                <label>
                    <input type="radio" name="deliveryOption" value="Pick Up" onclick="toggleLayout('pickup')">
                    Pick Up
                </label><br><br>
            </form>

            <h5 class="line2">_____________________________________</h5>
            
            <h5 class="pickup-time">PICK UP TIME</h5>
            <h5 class="standard-time">Standard time 20 - 25 minutes</h5>
            <h5 class="line3">_____________________________________</h5>
            <h5 class="pickup-address">PICKUP ADDRESS</h5>
            <h5 class="store-address">STORE ADDRESS:</h5>
            <h5 class="address">Ground floor, Lighthouse Bible Baptist <br> Church, 89 ROTC Hunters St., Barangay <br> Tatalon, Quezon City, Philippines</h5>
            
            <h5 class="payment-method">PAYMENT METHOD</h5>

            <form class="paymentForm">
                <label>
                    <input type="radio" name="paymentOption" value="Cash On Delivery">
                    Cash On Delivery
                </label><br>

                <label>
                    <input type="radio" name="paymentOption" value="Gcash">
                    Gcash
                </label><br><br>
            </form>
            
            <h5 class="line4">_____________________________________</h5>
            <button class="btn-submit" onclick="placeOrder('delivery')">PLACE ORDER</button>
            <button class="btn-submit2" onclick="placeOrder('pickup')">PICK UP ORDER</button>
            <a href="ATC.php" class="btn-back">Back</a>
        <?php } else { ?>
            <h2>Your cart is empty.</h2>
        <?php } ?>
        <div class="image">
            <img src="/Image/lighthouselogo.png" alt="" class="logo">
        </div>
    </div>

    <script>
        function toggleLayout(option) {
            const elementsToToggle = {
                'pickup': ['pickup-time', 'standard-time', 'pickup-address', 'store-address', 'address', 'btn-submit2', 'line4'],
                'delivery': ['delivery-fee', 'delivery-fee-price', 'payment-method', 'paymentForm', 'btn-submit']
            };

            for (const [key, elements] of Object.entries(elementsToToggle)) {
                elements.forEach(id => {
                    document.querySelector(`.${id}`).style.display = key === option ? 'block' : 'none';
                });
            }

            // Adjust the position of the Back button
            const backButton = document.querySelector('.btn-back');
            const referenceButton = option === 'pickup' ? document.querySelector('.btn-submit2') : document.querySelector('.btn-submit');
            backButton.style.top = (referenceButton.offsetTop + referenceButton.offsetHeight + 10) + 'px';
        }

        function placeOrder(method) {
            const formData = new FormData();
            formData.append('method', method);

            fetch('place_order.php', {
                method: 'POST',
                body: formData
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      alert('Order placed successfully!');
                      window.location.href = 'thank_you.php';
                  } else {
                      alert('Failed to place order. Please try again.');
                  }
              });
        }
    </script>
</body>
</html>
