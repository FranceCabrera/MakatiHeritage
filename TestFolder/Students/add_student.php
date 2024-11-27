<?php
// FILE LOCATION and NAME: <document root>\Students\add_student.php:

// Address error handling
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

// Define TITLE for this page
define('TITLE', 'Add Record');

// Include necessary files
include("config.php");
include_once('functions/display_message.php');
include_once('templates/header.php');

// Set the display message
display_message('Add Records');

// Create connection - MySQL procedural
$conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the add_button was clicked
if (isset($_POST['add_button'])) {
    // Sanitize and retrieve form data
    $fname = ucwords(strtolower($_POST['fname']));
    $lname = ucwords(strtolower($_POST['lname']));
    $bday = $_POST['bday'];

    // Generate the SQL statement to add a record
    $sql = "INSERT INTO tbl_students (fname, lname, bday) VALUES ('$fname', '$lname', '$bday')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('One record is added.'); window.location.href='index.php';</script>";
    } else {
        echo "<br>Error: No Record is added..." . mysqli_error($conn);
    }
} else {
    // Display the form for adding a student if the button was not clicked
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p>First Name: <input type="text" name="fname"></p>
        <p>Last Name: <input type="text" name="lname"></p>
        <p>Birthday: <input type="date" name="bday"></p>
        <p><input type="submit" name="add_button" value="Add Student"></p>
        <a href="index.php">Back to menu</a>
    </form>
    <?php
}

// Close connection
mysqli_close($conn);
include_once('templates/footer.php');
?>
