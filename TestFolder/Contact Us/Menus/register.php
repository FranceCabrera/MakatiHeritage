<?php
include('config.php');
session_start();

$registrationSuccessful = false;
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];

    $dbConn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

    if (!$dbConn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM user_account WHERE email = '$email'";
    $result = mysqli_query($dbConn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $message = "Email already registered.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user_account (fullname, email, password, address, phone_number) VALUES ('$fullname', '$email', '$hashedPassword', '$address', '$phone_number')";

        if (mysqli_query($dbConn, $sql)) {
            $registrationSuccessful = true;
        } else {
            $message = "Error: " . $sql . "<br>" . mysqli_error($dbConn);
        }
    }

    mysqli_close($dbConn);
}
?>
<main>
    <?php if ($registrationSuccessful): ?>
        <h2>Thank you!</h2>
        <p>You are now registered.</p>
        <a href="login.php" class="button">Login</a>
    <?php else: ?>
        <h2>Register a New Account</h2>
        <form action="register.php" method="post">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required>
            <br>
            <input type="submit" value="Register">
        </form>
        <?php
        if ($message) {
            echo "<p style='color: red;'>$message</p>";
        }
        ?>
    <?php endif; ?>
</main>
