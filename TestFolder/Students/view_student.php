<?php
// FILE LOCATION and NAME: <document root>\Students\view_student.php:

// Address error handling
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

// Define TITLE for this page
define('TITLE', 'View Records');

// Include necessary files
include("config.php");
include_once('functions/display_message.php');
include_once('templates/header.php');


// Set the display message
display_message('View Records');

// Create connection - MySQL Procedural
$dbConn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

// Check connection
if (!$dbConn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Generate the SQL to execute in viewing the records
$sql = "SELECT * FROM tbl_students";

// Execute the SQL statement
$result = mysqli_query($dbConn, $sql);

// Display each record
?>
<h3>Records displayed using HTML table</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Birthday</th>
        <th>Action</th>
    </tr>
    <?php
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $bday = date_create($row["bday"]);
            ?>
            <tr>
                <td><?php echo $row["studID"]; ?></td>
                <td><?php echo ucwords(strtolower($row["fname"] . " " . $row["lname"])); ?></td>
                <td><?php echo date_format($bday, "F d, Y"); ?></td>
                <td>
                    <!-- Actions: Delete and Edit links -->
                    &nbsp;&nbsp;&nbsp;
                    <a href="delete_student.php?studID=<?php echo $row['studID']; ?>">Delete</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="edit_student.php?studID=<?php echo $row['studID']; ?>">Edit</a>
                    &nbsp;&nbsp;&nbsp;
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='4'>0 results</td></tr>";
    }
    ?>
</table>
<?php
// Close the connection
mysqli_close($dbConn);
?>

<!-- Back to menu link -->
<br>
<a href="index.php">Back to menu</a>
<br><br>

<?php
include_once('templates/footer.php');
?>
