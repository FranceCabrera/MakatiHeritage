<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_lighthouse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users
$sql = "SELECT * FROM user_account";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $userID = $row['customerID'];
        // Check if the password is already hashed by comparing length
        if (strlen($row['password']) != 60) {
            $hashed_password = password_hash($row['password'], PASSWORD_DEFAULT);

            // Update user password
            $update_sql = "UPDATE user_account SET password = ? WHERE customerID = ?";
            $stmt = $conn->prepare($update_sql);
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("si", $hashed_password, $userID);
            $stmt->execute();
            $stmt->close();
        }
    }
}

$conn->close();
echo "Passwords updated successfully!";
?>
