<?php
session_start();
include('config.php');

// Create connection
$conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $reserve_date_from = $_POST['reserve_date_from_year'] . '-' . $_POST['reserve_date_from_month'] . '-' . $_POST['reserve_date_from_day'];
    $reserve_date_to = $_POST['reserve_date_to_year'] . '-' . $_POST['reserve_date_to_month'] . '-' . $_POST['reserve_date_to_day'];
    $room_capacity = $_POST['room_capacity'];
    $room_type = $_POST['room_type'];
    $payment_type = $_POST['payment_type'];

    // Calculate total bill
    $rate_per_day = 0;
    $additional_charge = 0;
    $discount = 0;

    if ($room_capacity == "Single") {
        if ($room_type == "Regular") $rate_per_day = 100;
        if ($room_type == "De Luxe") $rate_per_day = 300;
        if ($room_type == "Suite") $rate_per_day = 500;
    } elseif ($room_capacity == "Double") {
        if ($room_type == "Regular") $rate_per_day = 200;
        if ($room_type == "De Luxe") $rate_per_day = 500;
        if ($room_type == "Suite") $rate_per_day = 800;
    } elseif ($room_capacity == "Family") {
        if ($room_type == "Regular") $rate_per_day = 500;
        if ($room_type == "De Luxe") $rate_per_day = 750;
        if ($room_type == "Suite") $rate_per_day = 1000;
    }

    // Calculate additional charge based on payment type
    if ($payment_type == "Check") {
        $additional_charge = 0.05;
    } elseif ($payment_type == "Credit Card") {
        $additional_charge = 0.10;
    }

    // Calculate the number of days for the reservation
    $date_from = new DateTime($reserve_date_from);
    $date_to = new DateTime($reserve_date_to);
    $interval = $date_from->diff($date_to);
    $days = $interval->days;

    // Calculate discount based on the number of days
    if ($days >= 3 && $days <= 5) {
        $discount = 0.10;
    } elseif ($days > 5) {
        $discount = 0.15;
    }

    // Calculate the total bill
    $total_bill = $rate_per_day * $days;
    $total_bill += $total_bill * $additional_charge;
    $total_bill -= $total_bill * $discount;

    // Insert reservation data into the database
    $sql = "INSERT INTO reservations (name, phone, reserve_date_from, reserve_date_to, room_capacity, room_type, payment_type)
            VALUES ('$name', '$phone', '$reserve_date_from', '$reserve_date_to', '$room_capacity', '$room_type', '$payment_type')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the billing information page with the necessary data
        header("Location: ReservationBillingInformation.php?name=$name&phone=$phone&reserve_date_from=$reserve_date_from&reserve_date_to=$reserve_date_to&room_capacity=$room_capacity&room_type=$room_type&payment_type=$payment_type&total_bill=" . number_format($total_bill, 2));
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Billing Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Billing Information</h1>
        </div>
    </header>
    <div class="container">
        <main>
            <h2>Reservation Details</h2>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($_GET['name']); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($_GET['phone']); ?></p>
            <p><strong>Reservation Date From:</strong> <?php echo htmlspecialchars($_GET['reserve_date_from']); ?></p>
            <p><strong>Reservation Date To:</strong> <?php echo htmlspecialchars($_GET['reserve_date_to']); ?></p>
            <p><strong>Room Capacity:</strong> <?php echo htmlspecialchars($_GET['room_capacity']); ?></p>
            <p><strong>Room Type:</strong> <?php echo htmlspecialchars($_GET['room_type']); ?></p>
            <p><strong>Payment Type:</strong> <?php echo htmlspecialchars($_GET['payment_type']); ?></p>
            <p><strong>Total Bill:</strong> $<?php echo htmlspecialchars($_GET['total_bill']); ?></p>
        </main>
    </div>
</body>
</html>
