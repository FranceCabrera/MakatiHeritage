<?php
session_start(); 

$error_message = "";

$pizza_sizes = [
    'Small' => 100.00,
    'Medium' => 200.00,
    'Large' => 300.00
];

$crust_types = [
    'Thin' => -0.25, // 25% less
    'Regular' => 0.00, // Same amount
    'Thick' => 0.25 // 25% more
];

$drinks = [
    'Softdrinks' => 25.00,
    'Iced Tea' => 30.00,
    'Fruit Juice' => 35.00
];

$form_values = [
    'rdoSize' => $_POST['rdoSize'] ?? 'Small', 
    'rdoCrust' => $_POST['rdoCrust'] ?? 'Regular', 
    'rdoDrinks' => $_POST['rdoDrinks'] ?? ''
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['customer_name']) || empty($_POST['customers_address']) || empty($_POST['contact_number'])) {
        $error_message = "Please complete all customer information fields.";
    } else {
        $_SESSION['customer_name'] = $_POST['customer_name'];
        $_SESSION['customers_address'] = $_POST['customers_address'];
        $_SESSION['contact_number'] = $_POST['contact_number'];
        $_SESSION['rdoSize'] = $_POST['rdoSize'] ?? '';
        $_SESSION['rdoCrust'] = $_POST['rdoCrust'] ?? '';
        $_SESSION['rdoDrinks'] = $_POST['rdoDrinks'] ?? '';
        $_SESSION['extra-toppings'] = $_POST['extra-toppings'] ?? '';
        
        header("Location: OrderCabreraFrance.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRANCE CABRERA PIZZA ON-LINE ORDERING</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-color: #DFDBE5; background-image: url('data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'4\' height=\'10\' viewBox=\'0 0 4 4\'%3E%3Cpath fill=\'%239C92AC\' fill-opacity=\'0.4\' d=\'M1 3h1v1H1V3zm2-2h1v1H3V1z\'%3E%3C/path%3E%3C/svg%3E');">
    <div class="headings">
        <div class="title">
            <h2>FRANCE CABRERA PIZZA ON-LINE ORDERING</h2>
        </div>
        <br>
        <p>906 Marinduque St. Pitogo, Taguig City<br></p>
        <p>Phone Number#: 09982521501</p>
        <p>Email: cabrera_pizza@yahoo.com</p>
        <p>www.cabrerapizza.com.ph</p>
    </div>
    <p>Complete all entries below:(Customers Information)</p>
    <form action="" method="POST">
        <div class="customer-info">
            <?php if ($error_message) : ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <label for="name">Customer Name:</label>
            <input type="text" name="customer_name" value="">
            <br>
            <label for="address">Address:</label>
            <input type="text" name="customers_address" value="">
            <br>
            <label for="contact">Contact Number:</label>
            <input type="text" name="contact_number" value="">
        </div>
        <hr>
        <div class="order-form">
            <table>
                <tr>
                    <th>
                        <p>Pizza Size</p>
                    </th>
                    <th>
                        <p>Amount</p>
                    </th>
                    <th>
                        <p>Crust Type</p>
                    </th>
                    <th>
                        <p>Amount</p>
                    </th>
                    <th>
                        <p>Drinks</p>
                    </th>
                    <th>
                        <p>Amount</p>
                    </th>
                    <th>
                        <p>Extra toppings</p>
                    </th>
                </tr>
                <tr>
                    <td>
                        <?php foreach ($pizza_sizes as $size => $price): ?>
                            <input type="radio" id="<?php echo strtolower($size); ?>" name="rdoSize" value="<?php echo $size; ?>" <?php echo ($form_values['rdoSize'] == $size) ? 'checked' : ''; ?>>
                            <label for="<?php echo strtolower($size); ?>"><?php echo $size; ?></label><br>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <?php foreach ($pizza_sizes as $size => $price): ?>
                            <?php echo number_format($price, 2); ?><br>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <?php foreach ($crust_types as $type => $price): ?>
                            <input type="radio" id="<?php echo strtolower($type); ?>" name="rdoCrust" value="<?php echo $type; ?>" <?php echo ($form_values['rdoCrust'] == $type) ? 'checked' : ''; ?>>
                            <label for="<?php echo strtolower($type); ?>"><?php echo $type; ?></label><br>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <?php foreach ($crust_types as $type => $price): ?>
                            <?php echo number_format($price, 2); ?><br>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <?php foreach ($drinks as $drink => $price): ?>
                            <input type="radio" id="<?php echo strtolower($drink); ?>" name="rdoDrinks" value="<?php echo $drink; ?>" <?php echo ($form_values['rdoDrinks'] == $drink) ? 'checked' : ''; ?>>
                            <label for="<?php echo strtolower($drink); ?>"><?php echo $drink; ?></label><br>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <?php foreach ($drinks as $drink => $price): ?>
                            <?php echo number_format($price, 2); ?><br>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <select name="extra-toppings" id="extra-top">
                            <option value="Pepperoni">Pepperoni</option>
                            <option value="Mushroom">Mushroom</option>
                            <option value="Black Olive">Black Olive</option>
                            <option value="Onions">Onions</option>
                            <option value="Tomatoes" selected>Tomatoes</option> 
                            <option value="Cheese">Cheese</option>
                        </select>
                    </td>
                </tr>
            </table>
            <label for="Comments and Suggestion">Enter your Comments and Suggestion here:</label>
            <br>
            <textarea name="txtAreaComSug" id="" cols="50" rows="20"></textarea>
        </div>
        <br>
        <button type="submit" value="submit">Order</button>
        <input type="reset" value="Clear Order">
    </form>
</body>
</html>
