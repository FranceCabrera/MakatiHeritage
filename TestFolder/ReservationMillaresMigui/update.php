<?php
include('header.php');
include('config.php');
session_start();

$message = '';
$user = null;
$updateSuccessful = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_id'])) {
    $userID = $_POST['search_id'];

    $dbConn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

    if (!$dbConn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM reservationmigui WHERE Id = '$userID'";
    $result = mysqli_query($dbConn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
    } else {
        $message = "No user found with that ID.";
    }

    mysqli_close($dbConn);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_id'])) {
    $userID = $_POST['update_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    $dbConn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
    if (!$dbConn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE reservationmigui SET fname = '$fname', lname = '$lname', email_Add = '$email' WHERE Id = '$userID'";

    if (mysqli_query($dbConn, $sql)) {
        $updateSuccessful = true;
        $message = "Record has been updated.";
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($dbConn);
    }

    mysqli_close($dbConn);
}
?>
<main>
    <h2>Update Guest Information</h2>
    <?php if ($updateSuccessful): ?>
        <h2>Record has been updated</h2>
        <p>The user information has been successfully updated.</p>
    <?php else: ?>
        <form action="update.php" method="post">
            <label for="search_id">Guest ID:</label>
            <input type="text" id="search_id" name="search_id" required>
            <input type="submit" value="Search">
        </form>

        <?php if ($user): ?>
            <form action="update.php" method="post">
                <input type="hidden" name="update_id" value="<?php echo $user['userID']; ?>">
                <p>User ID: <?php echo $user['userID']; ?></p>
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" value="<?php echo $user['fname']; ?>" required>
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" value="<?php echo $user['lname']; ?>" required>
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email_Add']; ?>" required>
                <p>Date Registered: <?php echo $user['dateReg']; ?></p>
                <input type="submit" value="Update">
            </form>
        <?php endif; ?>

        <?php
        if ($message) {
            echo "<p style='color: green;'>$message</p>";
        }
        ?>
    <?php endif; ?>
</main>
<?php include('footer.php'); ?>
