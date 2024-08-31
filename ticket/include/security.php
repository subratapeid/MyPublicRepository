<?php

// Function to check if the user is logged in
function isLoggedIn() {
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true;
}

// Check if the user is logged in
    if (!isLoggedIn()) {
        echo '<script>window.location.href = "user-login.php";</script>'; // Redirect to the login page if the user is not logged in
        exit;
    }
    ?>