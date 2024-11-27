<?php
session_start();

include("config.php");

$con = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $amount = $_POST['loan-amount'];
        $terms = $_POST['terms-of-payment'];
        $officer = isset($_POST['coop-officer']) ? $_POST['coop-officer'] : "No";

        $username = $_SESSION['username'];
        $existingLoanQuery = "SELECT * FROM loan_user WHERE username = '$username'";
        $existingLoanResult = mysqli_query($con, $existingLoanQuery);

        if (mysqli_num_rows($existingLoanResult) > 0) {
            $updateQuery = "UPDATE loan_user SET amount = '$amount', terms = '$terms', officer = '$officer' WHERE username = '$username'";
            if (mysqli_query($con, $updateQuery)) {
                header("Location: LoanInformationMillaresMigui.php");
                exit;
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }
        } else {
            $insertQuery = "INSERT INTO loan_user (username, amount, terms, officer) VALUES ('$username', '$amount', '$terms', '$officer')";
            if (mysqli_query($con, $insertQuery)) {
                header("Location: LoanInformationMillaresMigui.php");
                exit;
            } else {
                echo "Error inserting record: " . mysqli_error($con);
            }
        }
    }
} else {
    header("Location: loginMillaresMigui.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Loan Cabrera France</title>
</head>
<body>
    <div class="heading">
        <h2>FRANCE CABRERA COOPERATIVE INCORPORATED</h2>
        <br>
        <p>906 Marinduque St. Pitogo, Taguig City<br></p>
        <p>Phone Number#: 09982521501</p>
    </div>
    <hr style="color: green; font-size: 2px;">
    <div class="loan-amount-box">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"> 
        <div class="loan-amount-box">
        <div class="select-loan">
            <p>Select Loan Amount</p>
        </div>
            <input type="radio" id="5000" name="loan-amount" value="5000">
            <label for="5000">Php 5,000</label><br>
            <input type="radio" id="10000" name="loan-amount" value="10000">
            <label for="10000">Php 10,000</label><br>
            <input type="radio" id="15000" name="loan-amount" value="15000">
            <label for="15000">Php 15,000</label><br>
            <input type="radio" id="20000" name="loan-amount" value="20000">
            <label for="20000">Php 20,000</label><br>
            <input type="radio" id="25000" name="loan-amount" value="25000">
            <label for="25000">Php 25,000</label><br>

        <div class="terms-pay">
            <p>Terms of payment</p>
        </div>
        <input type="radio" id="6 mos" name="terms-of-payment" value="6 mos">
        <label for="6 mos">6 mos</label>
        <input type="radio" id="12 mos" name="terms-of-payment" value="12 mos">
        <label for="12 mos">12 mos</label>
        <input type="radio" id="24 mos" name="terms-of-payment" value="24 mos">
        <label for="24 mos">24 mos</label>

        <div class="coop">
            <p>Cooperative officer</p>
            </div>
            <input type="radio" id="Yes" name="coop-officer" value="Yes">
            <label for="Yes">Yes</label>
        <br>
            <button type="submit">Submit</button>
            <input type="reset" value="Clear all">
        </form>
    </div>
</body>
</html>
