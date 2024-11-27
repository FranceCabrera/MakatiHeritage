<?php
// FILE LOCATION and NAME: <document root>\Students\search_student.php

// Address error handling
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

// Define TITLE for this page
define('TITLE', 'Search Records');

// Include external files
include("config.php");
include_once('functions/display_message.php');
include_once('templates/header.php');

// Set the displaying message
display_message('View Records');

// Create connection - MySQL Procedural
$dbConn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

// Check connection
if (!$dbConn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<br><br>
<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>Student ID.</label>
    <input type="text" name="id" />
    <input type="submit" name="search" value="Search" />
</form>
<?php
if (isset($_GET['search'])) {
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $sql = "SELECT * FROM tbl_students WHERE studID = " . $id;

        $result = mysqli_query($dbConn, $sql);

        // Check if there is an error in SQL statement
        if (!$result) {
            printf("Error: %s\n", mysqli_error($dbConn));
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                echo "Student ID: " . $row["studID"] . "<br>";
                echo "Name: " . $row["fname"] . " " . $row["lname"] . "<br>";
                echo "Birthday: " . $row["bday"] . "<br>";
            } else {
                echo "Record with an ID no. {$_GET['id']} is not in the database.";
            }
        }
    }
}

// Close connection
mysqli_close($dbConn);
?>
<br>
<a href="index.php">Back to menu</a>
<br><br>
<?php
include_once('templates/footer.php');
?>
