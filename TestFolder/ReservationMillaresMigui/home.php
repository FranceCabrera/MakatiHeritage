<?php
include('header.php');
include('config.php');
session_start();

$message = '';
$welcomeMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $dbConn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

    if (!$dbConn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM reservationmigui WHERE email_Add = '$email'";
    $result = mysqli_query($dbConn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['Id'] = $user['Id'];
            $_SESSION['email'] = $user['email_Add'];
            $_SESSION['fname'] = $user['fname'];
            $_SESSION['lname'] = $user['lname'];

            $welcomeMessage = "Welcome, " . ucwords(strtolower($user['fname'])) . " " . ucwords(strtolower($user['lname'])) . "!";
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "No user found with that email.";
    }

    mysqli_close($dbConn);
}
?>
<main>
    <h2>Welcome to the Online Guest Registration</h2>
    <form action="home.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">
    </form>
    <?php
    if ($message) {
        echo "<p style='color: red;'>$message</p>";
    }
    if ($welcomeMessage) {
        echo "<p style='color: green;'>$welcomeMessage</p>";
        echo "<a href='view.php' class='button'>Continue</a>";
    }
    ?>
</main>
<?php include('footer.php'); ?>
