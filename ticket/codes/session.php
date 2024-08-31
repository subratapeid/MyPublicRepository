<?php
session_start();

// Check if user ID is set in session
if (isset($_SESSION['user_id'])) {
    // Retrieve the user ID from the session
    $userId = $_SESSION['user_id'];

    // Display the user ID
    echo "User ID: " . $userId;
} else {
    // Handle the case where the user ID is not set in the session
    echo "User ID is not set in the session.";
}

?>
