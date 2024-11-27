<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: LoginCabreraFrance.php");
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
<body style="background-color: #DFDBE5; background-image: url('data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'4\' height=\'10\' viewBox=\'0 0 4 4\'%3E%3Cpath fill=\'%239C92AC\' fill-opacity=\'0.4\' d=\'M1 3h1v1H1V3zm2-2h1v1H3V1z\'%3E%3C/path%3E%3C/svg%3E');">
        <div class="heading">
            <h2>FRANCE CABRERA COOPERATIVE INCORPORATED</h2>
            <br>
            <p>906 Marinduque St. Pitogo, Taguig City<br></p>
            <p>Phone Number#: 09982521501</p>
        </div>
        <hr style="color: green; font-size: 2px;">
    <h2>Thank you, <?php echo $username; ?>!</h2>
    <p>Your loan will be processed within three (3) working days.</p>
    <form action="LoginCabreraFrance.php" method="post">
    <button type="submit">Back to Login</button>
    </form>
</body>
</html>
