<?php
session_start();
include('config.php');


$conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $phone = $reserve_date_from = $reserve_date_to = $room_capacity = $room_type = $payment_type = "";
$total_bill = 0;
$show_results = false;
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $reserve_date_from = $_POST['reserve_date_from_year'] . '-' . $_POST['reserve_date_from_month'] . '-' . $_POST['reserve_date_from_day'];
    $reserve_date_to = $_POST['reserve_date_to_year'] . '-' . $_POST['reserve_date_to_month'] . '-' . $_POST['reserve_date_to_day'];
    $room_capacity = $_POST['room_capacity'];
    $room_type = $_POST['room_type'];
    $payment_type = $_POST['payment_type'];
        // Validate required fields
        if (!empty($name) && !empty($phone) && !empty($reserve_date_from) && !empty($reserve_date_to) && !empty($room_capacity) && !empty($room_type) && !empty($payment_type)) {
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
            $total_bill = $days * $rate_per_day * (1 + $additional_charge - $discount);
        }

    if ($reserve_date_to < $reserve_date_from) {
        $errors['dates'] = "Check-out date cannot be before the check-in date.";
    }

    $date_from = new DateTime($reserve_date_from);
    $date_to = new DateTime($reserve_date_to);
    $interval = $date_from->diff($date_to);
    $days_difference = $interval->days;
    if ($days_difference > 365) {
        $errors['dates'] = "Reservation cannot exceed 1 year.";
    }

    if ($date_to < $date_from) {
        $errors['dates'] = "Check-out date cannot be before the check-in date.";
    }

    if (empty($errors)) {


        $sql = "INSERT INTO reservations (name, phone, reserve_date_from, reserve_date_to, room_capacity, room_type, payment_type)
                VALUES ('$name', '$phone', '$reserve_date_from', '$reserve_date_to', '$room_capacity', '$room_type', '$payment_type')";

        if ($conn->query($sql) === TRUE) {
            $show_results = true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="header-container">
            <h1>CABRERA FIVE STAR HOTEL ON-LINE REGISTRATION</h1>
        </div>
    </header>
    <div class="container">
        <nav>
            <ul>
                <li><a href="homeCabrera.php">Home</a></li>
                <li><a href="profileCabrera.php">Company's Profile</a></li>
                <li><a href="ReservationCabreraFrance.php">Reservation</a></li>
                <li><a href="contactsCabrera.php">Contacts</a></li>
            </ul>
        </nav>
        <main>
            <div class="container-reservation-form">
                <h2>Reservation Page</h2>
                <form action="ReservationCabreraFrance.php" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>

                    <div class="form-group">
                        <label for="reserve_date_from">From:</label>
                        <select id="reserve_date_from_month" name="reserve_date_from_month" required>
                            <option value="">Month</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select id="reserve_date_from_day" name="reserve_date_from_day" required>
                            <option value="">Day</option>
                            <?php for ($i = 1; $i <= 31; $i++) echo "<option value='$i'>$i</option>"; ?>
                        </select>
                        <select id="reserve_date_from_year" name="reserve_date_from_year" required>
                            <option value="">Year</option>
                            <?php for ($i = date("Y"); $i <= date("Y") + 5; $i++) echo "<option value='$i'>$i</option>"; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="reserve_date_to">To:</label>
                        <select id="reserve_date_to_month" name="reserve_date_to_month" required>
                            <option value="">Month</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select id="reserve_date_to_day" name="reserve_date_to_day" required>
                            <option value="">Day</option>
                            <?php for ($i = 1; $i <= 31; $i++) echo "<option value='$i'>$i</option>"; ?>
                        </select>
                        <select id="reserve_date_to_year" name="reserve_date_to_year" required>
                            <option value="">Year</option>
                            <?php for ($i = date("Y"); $i <= date("Y") + 5; $i++) echo "<option value='$i'>$i</option>"; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="room_capacity">Room Capacity:</label>
                        <div class="radio-group">
                            <label for="single">
                                <input type="radio" id="single" name="room_capacity" value="Single" required>
                                Single
                            </label>
                            <label for="double">
                                <input type="radio" id="double" name="room_capacity" value="Double" required>
                                Double
                            </label>
                            <label for="family">
                                <input type="radio" id="family" name="room_capacity" value="Family" required>
                                Family
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room_type">Room Type:</label>
                        <div class="radio-group">
                            <label for="regular">
                                <input type="radio" id="regular" name="room_type" value="Regular" required>
                                Regular
                            </label>
                            <label for="deluxe">
                                <input type="radio" id="deluxe" name="room_type" value="De Luxe" required>
                                De Luxe
                            </label>
                            <label for="suite">
                                <input type="radio" id="suite" name="room_type" value="Suite" required>
                                Suite
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="payment_type">Payment Type:</label>
                        <div class="radio-group">
                            <label for="cash">
                                <input type="radio" id="cash" name="payment_type" value="Cash" required>
                                Cash
                            </label>
                            <label for="check">
                                <input type="radio" id="check" name="payment_type" value="Check" required>
                                Check
                            </label>
                            <label for="credit_card">
                                <input type="radio" id="credit_card" name="payment_type" value="Credit Card" required>
                                Credit Card
                            </label>
                        </div>
                    </div>

                    <?php if (isset($errors['dates'])): ?>
                        <p class="error" style="color: red;"><?php echo $errors['dates']; ?></p>
                    <?php endif; ?>

                    <div class="form-group">
                        <button type="submit">Submit Reservation</button>
                    </div>
                </form>

                <?php if ($show_results): ?>
                    <div class="reservation-results">
                        <h3>Reservation Details</h3>
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
                        <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>
                        <p><strong>From:</strong> <?php echo htmlspecialchars($reserve_date_from); ?></p>
                        <p><strong>To:</strong> <?php echo htmlspecialchars($reserve_date_to); ?></p>
                        <p><strong>Room Capacity:</strong> <?php echo htmlspecialchars($room_capacity); ?></p>
                        <p><strong>Room Type:</strong> <?php echo htmlspecialchars($room_type); ?></p>
                        <p><strong>Payment Type:</strong> <?php echo htmlspecialchars($payment_type); ?></p>
                        <p><strong>Total Bill:</strong> $<?php echo number_format($total_bill, 2); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>
</html>
