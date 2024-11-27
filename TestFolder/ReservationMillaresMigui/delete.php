<?php
include('header.php');
include('config.php');
session_start();

$message = '';
$user = null;
$deleteSuccessful = false;
$confirmDelete = false;

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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete']) && $_POST['confirm_delete'] == 'true') {
    $confirmDelete = true;
    $userID = $_POST['delete_id'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['final_delete'])) {
    $userID = $_POST['delete_id'];
    $confirmDelete = $_POST['confirm_delete'];

    if ($confirmDelete == 'yes') {
        $dbConn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

        if (!$dbConn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "DELETE FROM reservationmigui WHERE Id = '$userID'";

        if (mysqli_query($dbConn, $sql)) {
            $deleteSuccessful = true;
            $message = "Record has been deleted.";

            reorderIDs($dbConn);
        } else {
            $message = "Error: " . $sql . "<br>" . mysqli_error($dbConn);
        }

        mysqli_close($dbConn);
    } else {
        $message = "Deletion cancelled.";
    }
}
?>
<main>
    <h2>Delete Guest Record</h2>
    <?php if ($deleteSuccessful): ?>
        <h2>Record has been deleted</h2>
        <p>The user information has been successfully deleted.</p>
    <?php else: ?>
        <form action="delete.php" method="post">
            <label for="search_id">Guest ID:</label>
            <input type="text" id="search_id" name="search_id" required>
            <input type="submit" value="Search">
        </form>

        <?php if ($user && !$confirmDelete): ?>
            <form action="delete.php" method="post">
                <input type="hidden" name="delete_id" value="<?php echo $user['Id']; ?>">
                <p>User ID: <?php echo $user['Id']; ?></p>
                <p>Name: x x</p>
                <p>Email Address: x</p>
                <p>Date Registered: <?php echo $user['date_Reg']; ?></p>
                <input type="hidden" name="confirm_delete" value="true">
                <input type="submit" value="Delete">
            </form>
        <?php elseif ($confirmDelete): ?>
            <form action="delete.php" method="post">
                <input type="hidden" name="delete_id" value="<?php echo $userID; ?>">
                <p>Are you sure you want to delete this record?</p>
                <label><input type="radio" name="confirm_delete" value="yes" required> Yes</label>
                <label><input type="radio" name="confirm_delete" value="no" required> No</label>
                <br>
                <input type="submit" name="final_delete" value="Confirm Delete">
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
