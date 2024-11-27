<?php
session_start(); 

$customer_name = $_SESSION['customer_name'] ?? '';
$customers_address = $_SESSION['customers_address'] ?? '';
$contact_number = $_SESSION['contact_number'] ?? '';
$pizza_size = $_SESSION['rdoSize'] ?? '';
$crust_type = $_SESSION['rdoCrust'] ?? '';
$drinks = $_SESSION['rdoDrinks'] ?? '';
$extra_toppings = $_SESSION['extra-toppings'] ?? '';


$pizza_sizes = [
    'Small' => 100.00,
    'Medium' => 200.00,
    'Large' => 300.00
];

$crust_adjustments = [
    'Thin' => -0.25, 
    'Regular' => 0.00, 
    'Thick' => 0.25 
];

$drinks_prices = [
    'Softdrinks' => 25.00,
    'Iced Tea' => 30.00,
    'Fruit Juice' => 35.00
];

$toppings_prices = [
    "Pepperoni" => 20.00,
    "Mushroom" => 20.00,
    "Black Olive" => 20.00,
    "Onions" => 20.00,
    "Tomatoes" => 20.00,
    "Cheese" => 20.00
];


$pizza_size_amount = $pizza_sizes[$pizza_size] ?? 0;
$crust_type_amount = ($pizza_size_amount * (1 + $crust_adjustments[$crust_type])) ?? 0;
$drinks_amount = $drinks_prices[$drinks] ?? 0;

$extra_toppings_option = array_filter(array_keys($toppings_prices), function($topping) use ($extra_toppings) {
    return strpos($extra_toppings, $topping) !== false;
});

$extra_toppings_amount = array_reduce($extra_toppings_option, function($acc, $topping) use ($toppings_prices) {
    return $acc + ($toppings_prices[$topping] ?? 0);
}, 0);

$subtotal = $pizza_size_amount + $crust_type_amount + $drinks_amount + $extra_toppings_amount;
$vat = $subtotal * 0.12;
$total_amount = $subtotal + $vat;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-color: #DFDBE5; background-image: url('data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'4\' height=\'10\' viewBox=\'0 0 4 4\'%3E%3Cpath fill=\'%239C92AC\' fill-opacity=\'0.4\' d=\'M1 3h1v1H1V3zm2-2h1v1H3V1z\'%3E%3C/path%3E%3C/svg%3E');">
    <div class="headings">
        <div class="title">
            <h2>FRANCE CABRERA PIZZA ON-LINE ORDERING</h2>
        </div>
        <h2>Order Confirmation</h2>
        <div class="customer-info">
            <h3>Customer Information</h3>
            <table class="order-information">
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Customer Name:</td>
                    <td><?php echo htmlspecialchars($customer_name); ?></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><?php echo htmlspecialchars($customers_address); ?></td>
                </tr>
                <tr>
                    <td>Contact Number:</td>
                    <td><?php echo htmlspecialchars($contact_number); ?></td>
                </tr>
            </table>
        </div>
        <div class="order-details">
            <h3>Order Details</h3>
            <table class="order-table">
                <tr>
                    <th>Item</th>
                    <th>Selected Option</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>Pizza Size</td>
                    <td><?php echo $pizza_size; ?></td>
                    <td><?php echo number_format($pizza_size_amount, 2); ?></td>
                </tr>
                <tr>
                    <td>Crust Type</td>
                    <td><?php echo $crust_type; ?></td>
                    <td><?php echo number_format($crust_type_amount, 2); ?></td>
                </tr>
                <tr>
                    <td>Drinks</td>
                    <td><?php echo $drinks; ?></td>
                    <td><?php echo number_format($drinks_amount, 2); ?></td>
                </tr>
                <tr>
                    <td>Extra Toppings</td>
                    <td>
                        <?php 
                            foreach ($extra_toppings_option as $topping) {
                                echo $topping . "<br>";
                            }
                        ?>
                    </td>
                    <td><?php echo number_format($extra_toppings_amount, 2); ?></td>
                </tr>
                <tr>
                    <th colspan="2">Order Summary</th>
                    <td></td>
                </tr>
                <tr>
                    <td>Subtotal:</td>
                    <td></td>
                    <td><?php echo number_format($subtotal, 2); ?></td>
                </tr>
                <tr>
                    <td>VAT (12%):</td>
                    <td></td>
                    <td><?php echo number_format($vat, 2); ?></td>
                </tr>
                <tr>
                    <td>Total Amount:</td>
                    <td></td>
                    <td><?php echo number_format($total_amount, 2); ?></td>
                </tr>
            </table>
    
            <form action="OnLineCabreraFrance.php" method="get">
                <button type="submit" class="back-button">Back</button>
            </form>
            <form action="ConfirmCabreraFrance.php" method="post">
                <button type="submit" class="confirm-button">Confirm Order</button>
            </form>
        </div>
    </div>
</body>
</html>
