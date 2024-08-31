<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 't_users';

// Create a database connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to get the current count of records in the database
function getCurrentRecordCount() {
    global $mysqli;

    $query = "SELECT COUNT(*) as count FROM bc_details";
    $result = $mysqli->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['count'];
    } else {
        return 0;
    }
}

// Get and echo the live count
$liveCount = getCurrentRecordCount();
echo $liveCount;

// Close the database connection
$mysqli->close();
?>
