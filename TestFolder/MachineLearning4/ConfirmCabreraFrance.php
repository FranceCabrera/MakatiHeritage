<?php
session_start();
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
        <br>
        <p>906 Marinduque St. Pitogo, Taguig City<br></p>
        <p>Phone Number#: 09982521501</p>
        <p>Email: cabrera_pizza@yahoo.com</p>
        <p>www.cabrerapizza.com.ph</p>
    </div>
    <div class="confirmation-message">
        <h2>Your order has been sent to Cabrera's Pizza</h2>
        
        <p>Thank you <?php echo htmlspecialchars($_SESSION['customer_name'] ?? ''); ?> for patronizing our special and delicious pizza.</p>
        <p><strong>Waiting time:</strong> 20-30 minutes or will get 10% discount for late delivery</p>
    </div>
    <form action="OnLineCabreraFrance.php" method="get">
        <button type="submit">Back to Home</button>
    </form>
</body>
</html>
