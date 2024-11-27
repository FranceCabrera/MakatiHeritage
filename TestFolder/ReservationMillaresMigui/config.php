<?php
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASSWORD", "");
define("DBNAME", "db_reservationmigui");

function reorderIDs($dbConn) {
    $sql = "SELECT * FROM reservationmigui ORDER BY Id";
    $result = mysqli_query($dbConn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $newID = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $oldID = $row['userID'];
            $updateSql = "UPDATE reservationmigui SET Id = $newID WHERE Id = $oldID";
            mysqli_query($dbConn, $updateSql);
            $newID++;
        }
    } else {
        $newID = 1; 
    }
    $resetAutoIncrementSql = "ALTER TABLE reservationmigui AUTO_INCREMENT = $newID";
    mysqli_query($dbConn, $resetAutoIncrementSql);
}
?>