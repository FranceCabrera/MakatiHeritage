<?php
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

    $sql = "SELECT * FROM user_account WHERE email = '$email'";
    $result = mysqli_query($dbConn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['fullname'] = $user['fullname'];

            $welcomeMessage = "Welcome, " . ucwords(strtolower($user['fullname'])) . "!";
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
    <h2>Welcome to Lighthouse Cafe</h2>
    <form action="login.php" method="post">
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
