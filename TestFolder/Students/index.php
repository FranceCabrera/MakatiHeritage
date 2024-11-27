<?php
// FILE LOCATION and NAME: <document root>\Students\index.php

// Define the title for this page
define("TITLE", "Welcome to the Student's Database Main page");

// Include external files
include("config.php");
include_once('functions/display_message.php');
include_once('templates/header.php');


// Display message
display_message("What do you want to do today?");
?>
<ol>
    <li><a href="add_student.php">Add New Student</a></li>
    <li><a href="view_student.php">Display List of Students</a></li>
    <li><a href="search_student.php">Search for a Student</a></li>
</ol>
<?php
include_once ('templates/footer.php');
?>
