<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);


include('config.php');


$con = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $password = "";
$usernameErr = $passwordErr = $registrationMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = $_POST["username"];
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    if (!empty($username) && !empty($password)) {
        $sql = "INSERT INTO loan_user (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($con, $sql)) {
            $registrationMsg = "Registration successful!";
        } else {
            $registrationMsg = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registration</title>
</head>
    <hr style="color: green; font-size: 2px;">
    <div class="heading-User-Pass">
        <h1>User Registration</h1>
    </div>
    <div class="RegistrationForm">
        <form name="registrationForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <span class="error"><?php echo $usernameErr; ?></span><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <span class="error"><?php echo $passwordErr; ?></span><br><br>
            <button type="submit" name="register">Register</button>
            <input type="reset" value="Reset">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($registrationMsg)) {
                echo '<p class="registration-message">' . $registrationMsg . '</p>';
            }
        }
        ?>
        <p>Already have an account? <a href="loginMillaresMigui.php">Login here</a>.</p>
    </div>
</body>
</html>
