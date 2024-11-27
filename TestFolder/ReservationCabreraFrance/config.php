<?php
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASSWORD", "");
define("DBNAME", "db_reservationcabrera");

function reorderIDs($dbConn) {
    $sql = "SELECT * FROM tbl_reservations ORDER BY userID";
    $result = mysqli_query($dbConn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $newID = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $oldID = $row['userID'];
            $updateSql = "UPDATE tbl_reservations SET userID = $newID WHERE userID = $oldID";
            mysqli_query($dbConn, $updateSql);
            $newID++;
        }
    } else {
        $newID = 1; 
    }
    $resetAutoIncrementSql = "ALTER TABLE tbl_reservations AUTO_INCREMENT = $newID";
    mysqli_query($dbConn, $resetAutoIncrementSql);
}
?>