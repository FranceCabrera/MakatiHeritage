<?php
// FILE LOCATION and NAME: <document root>\Students\edit_student.php

// Address error handling
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

// Define TITLE for this page
define('TITLE', 'Edit Records');

// Include external files
include("config.php");
include_once('functions/display_message.php');
include_once('templates/header.php');

// Create database connection
$dbConn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

// Check database connection
if (!$dbConn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize variables
$id = '';
$first = '';
$last = '';
$bday = '';

// Check if studID is provided in the URL
if (isset($_GET['studID'])) {
    $id = $_GET['studID'];

    if (isset($_POST['update'])) {
        // Update the record
        $ud_id = $_POST['ud_id'];
        $ud_first = $_POST['ud_first'];
        $ud_last = $_POST['ud_last'];
        $ud_bday = $_POST['ud_bday'];

        // Generate SQL statement
        $sql = "UPDATE tbl_students SET fname='$ud_first', lname='$ud_last', bday='$ud_bday' WHERE studID='$ud_id'";

        // Execute SQL statement
        $result = mysqli_query($dbConn, $sql);
        if ($result) {
            // Display "Record Updated" message
            display_message('Record Updated');

            // Update displayed values
            $first = $ud_first;
            $last = $ud_last;
            $bday = $ud_bday;
        } else {
            echo "Error updating record: " . mysqli_error($dbConn);
        }
    } else {
        // Display edit record message only if update button is not clicked
        display_message('Edit Record');
    }

    // Generate SQL statement to fetch the record
    $sql = "SELECT * FROM tbl_students WHERE studID='$id'";

    // Execute SQL statement
    $result = mysqli_query($dbConn, $sql);

    // Check if record exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $first = $row["fname"];
        $last = $row["lname"];
        $bday = $row["bday"];
    }
} else {
    echo "Error: Missing studID parameter";
}

// Close connection
mysqli_close($dbConn);
?>
<br>
<center>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?studID=' . $id; ?>" method="POST">
    <input type="hidden" name="ud_id" value="<?php echo $id; ?>">
    <table>
        <tr>
            <th>First Name:</th>
            <td><input type="text" name="ud_first" value="<?php echo $first; ?>"></td>
        </tr>
        <tr>
            <th>Last Name:</th>
            <td><input type="text" name="ud_last" value="<?php echo $last; ?>"></td>
        </tr>
        <tr>
            <th>Birthday:</th>
            <td><input type="text" name="ud_bday" value="<?php echo $bday; ?>"></td>
        </tr>
    </table>
    <br>
    <input type="submit" value="Update" name="update">
    <input type="reset" value="Clear All">
</form>
<br><a href="index.php"> Back to Menu </a>
<br><a href="view_student.php"> View Information </a>
</center>
<br>
<?php
include_once('templates/footer.php');
?>
