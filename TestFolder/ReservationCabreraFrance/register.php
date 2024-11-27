<?php
include('header.php');
include('config.php');
session_start();

$registrationSuccessful = false;
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $dbConn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

    if (!$dbConn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM tbl_reservations WHERE emailAdd = '$email'";
    $result = mysqli_query($dbConn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $message = "Email already registered.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO tbl_reservations (fname, lname, emailAdd, password, dateReg) VALUES ('$fname', '$lname', '$email', '$hashedPassword', NOW())";

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
        <a href="home.php" class="button">Login</a>
    <?php else: ?>
        <h2>Register a New Guest</h2>
        <form action="register.php" method="post">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required>
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
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
<?php include('footer.php'); ?>
