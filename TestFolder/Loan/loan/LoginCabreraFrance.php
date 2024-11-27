<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

include("config.php");

$con = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT username, password FROM loan_user WHERE username = '$username'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            $db_username = $row['username'];
            $db_password = $row['password'];

            if ($password == $db_password) {
                session_start();
                $_SESSION['username'] = $username;
                header("Location: LoanCabreraFrance.php");
                exit;
            } else {
                $error_message = "Incorrect password.";
            }
        } else {
            $error_message = "User not found.";
        }
    } else {
        $error_message = "Please provide both username and password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body style="background-color: #DFDBE5; background-image: url('data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'4\' height=\'10\' viewBox=\'0 0 4 4\'%3E%3Cpath fill=\'%239C92AC\' fill-opacity=\'0.4\' d=\'M1 3h1v1H1V3zm2-2h1v1H3V1z\'%3E%3C/path%3E%3C/svg%3E');">
    <div class="heading">
        <h2>FRANCE CABRERA COOPERATIVE INCORPORATED</h2>
        <br>
        <p>906 Marinduque St. Pitogo, Taguig City<br></p>
        <p>Phone Number#: 09982521501</p>
    </div>
    <hr style="color: green; font-size: 2px;">
    <div class="heading-User-Pass">
        <h1>Username & Password Enter:</h1>
    </div>
    <div class="LoginForm">
        <form name="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>
            <button type="submit" name="login">Login</button>
            <input type="reset" value="Reset">
        </form>
        <?php
        if (isset($error_message)) {
            echo '<p class="error-message">' . $error_message . '</p>';
        }
        ?>
        <a href="registrationLoanCabreraFrance.php">Back to Registration</a>
    </div>
</body>
</html>
