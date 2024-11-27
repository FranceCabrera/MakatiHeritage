<?php
// FILE LOCATION and NAME: <document root>\Students\delete_student.php

// Address error handling
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

// Define TITLE for this page
define('TITLE', 'Delete Record');

// Include external files
require("config.php");
include_once('functions/display_message.php');
include_once('templates/header.php');

// Check if the deletion process is initiated
if (isset($_POST['btnDelete'])) {
    // Get the student ID to delete
    $studID = $_GET['studID'];

    // Create database connection
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

    // Check database connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Generate SQL statement to select the record to be deleted
    $sqlSelect = "SELECT * FROM tbl_Students WHERE studID = {$studID}";

    // Generate SQL statement to delete the record
    $sqlDelete = "DELETE FROM tbl_Students WHERE studID = {$studID}";

    // Execute SQL statement to select the record first before delete
    $result1 = mysqli_query($conn, $sqlSelect);
    $result = mysqli_query($conn, $sqlDelete);

    // Check if the delete operation was successful
    if ($result) {
        // Display record deleted message
        display_message('Record Deleted');

        // Retrieve the data executed by mysqli_query($conn, $sqlSelect)
        $row = mysqli_fetch_assoc($result1);

        // Display the deleted student details
        if ($row) {
            echo "<h1 style=\"text-align: center;\">Record: # {$row['studID']}. {$row['fname']} {$row['lname']} is now deleted!</h1>";
            echo "<center><a href=\"index.php\"> Back to Menu </a><br><a href=\"view_student.php\"> View Information </a><br><br></center>";
        } else {
            echo "Error retrieving record details after deletion.";
        }
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // Display initial message using display_message()
    display_message('Delete Record');
}

if (!isset($_POST['btnDelete'])) {
    // Display confirmation form for deletion
    ?>
    <center><h1>
    <form method="POST">
    Deleting Record #
    <?php
    $studID = $_GET['studID'];

    // Create connection
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Generate SQL statement to retrieve the record to be deleted
    $sql = "SELECT * FROM tbl_students WHERE studID = {$studID}";

    // Execute SQL statement
    $result = mysqli_query($conn, $sql);

    // Check if any rows are returned
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the row
        $row = mysqli_fetch_assoc($result);

        // Check if $row is not null
        if ($row) {
            echo $row['studID'] . " " . $row['fname'] . " " . $row['lname'];
        } else {
            echo "Record not found";
        }
    } else {
        echo "Record not found";
    }
    ?>
    . Are you sure you want to delete this record?<br>
    <input type="submit" value="Confirm Deletion" name="btnDelete">
    <a href="index.php"><input type="button" value="Cancel" name="btnCancel"></a>
    </form>
    </h1></center>
    <?php
}

// Close connection
mysqli_close($conn);
include_once('templates/footer.php');
?>
