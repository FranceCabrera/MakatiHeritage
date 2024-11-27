<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: loginMillaresMigui.php");
    exit;
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <hr style="color: green; font-size: 2px;">
    <h2>Thank you, <?php echo $username; ?>!</h2>
    <p>Your loan will be processed within three (3) working days.</p>
    <form action="loginMillaresMigui.php" method="post">
    <button type="submit">Back to Login</button>
    </form>
</body>
</html>
