<?php
include('header.php');
include('config.php');
session_start();

$message = '';
$user = null;

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
?>
<main>
    <h2>Search Guests</h2>
    <form action="search.php" method="post">
        <label for="search_id">Guest ID:</label>
        <input type="text" id="search_id" name="search_id" required>
        <input type="submit" value="Search">
    </form>

    <?php if ($user): ?>
        <h3>Guest Details</h3>
        <p>User ID: <?php echo $user['userID']; ?></p>
        <p>Name: <?php echo $user['lname'] . ', ' . $user['fname']; ?></p>
        <p>Email Address: <?php echo $user['emailAdd']; ?></p>
        <p>Date Registered: <?php echo $user['dateReg']; ?></p>
    <?php endif; ?>

    <?php
    if ($message) {
        echo "<p style='color: red;'>$message</p>";
    }
    ?>
</main>
<?php include('footer.php'); ?>
