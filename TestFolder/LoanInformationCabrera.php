<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: LoginCabreraFrance.php");
    exit;
}

include("config.php");

$con = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loanAmount = isset($_POST['loan-amount']) ? $_SESSION['loan-amount'] : '';
    $terms = isset($_POST['terms-of-payment']) ? $_SESSION['terms-of-payment'] : '';
    $coopOfficer = isset($_POST['coop-officer']) ? $_SESSION['coop-officer'] : 'No';
    $username = $_SESSION['username'];

    $interestRate = $coopOfficer === "Yes" ? 0.1 : 0.05;
    $interest = $loanAmount * $interestRate;
    $totalAmount = $loanAmount + $interest;

    if ($terms === "6 mos") {
        $monthlyDues = number_format($totalAmount / 6, 2);
    } elseif ($terms === "12 mos") {
        $monthlyDues = number_format($totalAmount / 12, 2);
    } elseif ($terms === "24 mos") {
        $monthlyDues = number_format($totalAmount / 24, 2);
    }


    $sql = "INSERT INTO loan_user (username, amount, terms, officer) VALUES ('$username', '$loanAmount', '$terms', '$coopOfficer')";

    if (mysqli_query($con, $sql)) {
        header("Location: LoanConfirmationCabreraFrance.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-color: #DFDBE5; background-image: url('data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'4\' height=\'10\' viewBox=\'0 0 4 4\'%3E%3Cpath fill=\'%239C92AC\' fill-opacity=\'0.4\' d=\'M1 3h1v1H1V3zm2-2h1v1H3V1z\'%3E%3C/path%3E%3C/svg%3E');">
    <div class="heading">
        <h2>FRANCE CABRERA COOPERATIVE INCORPORATED</h2>
        <br>
        <p>906 Marinduque St. Pitogo, Taguig City<br></p>
        <p>Phone Number#: 09982521501</p>
    </div>
    <hr style="color: green; font-size: 4px;">
    <div class="loan-info">
        <center><h3>Loan Information</h3></center>
        <table>
            <tr>
                <th>Username:</th>
                <td><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?></td>
            </tr>
            <tr>
                <th>Amount:</th>
                <td><?php echo isset($_SESSION['loan_amount']) ? 'Php ' . $_SESSION['loan_amount'] : ''; ?></td>
            </tr>
            <tr>
                <th>Terms of Payment:</th>
                <td><?php echo isset($_SESSION['terms_of_payment']) ? $_SESSION['terms_of_payment'] : ''; ?></td>
            </tr>
            <tr>
                <th>Cooperative Officer:</th>
                <td><?php echo isset($_SESSION['coop_officer']) ? $_SESSION['coop_officer'] : ''; ?></td>
            </tr>
            <tr>
                <th>Total Amount:</th>
                <td><?php echo isset($totalAmount) ? 'Php ' . number_format($totalAmount, 2) : ''; ?></td>
            </tr>
            <tr>
                <th>Monthly Dues:</th>
                <td><?php echo isset($monthlyDues) ? 'Php ' . $monthlyDues : ''; ?></td>
            </tr>
        </table>
    </div>
    <div class="buttons">
        <form action="LoanConfirmationCabreraFrance.php" method="POST">
            <button type="submit">Submit</button>
        </form>
        <button onclick="window.location.href = 'LoanCabreraFrance.php';">Back</button>
    </div>
</body>
</html>
