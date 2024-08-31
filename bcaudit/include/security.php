<?php

// Function to check if the user is logged in
function isLoggedIn() {
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true;
}

// Check if the user is logged in and retrieve user details
if (isLoggedIn()) {
    $userFirstName = $_SESSION['user_id']; // or the appropriate key for the user's first name
    $userEmail = $_SESSION['email_id'];
    $userId = $_SESSION['user_id'];
} else {
    // Redirect to the login page if not logged in
    $currentPage = basename($_SERVER['PHP_SELF']);
    if ($currentPage !== 'user-login.php') {
        echo '<script>window.location.href = "/bcaudit/user-login.php";</script>';
        exit;
    }
}
?>
