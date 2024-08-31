<?php

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {

    // Set the last activity time if not already set (for a new session)
    if (!isset($_SESSION['last_activity'])) {
        $_SESSION['last_activity'] = time();
    }

    $inactive_time = 2000 * 60; // 20 minutes in seconds

    // Calculate the time since the last activity
    $session_life = time() - $_SESSION['last_activity'];

    // If the user has been inactive for more than 20 minutes, log them out
    if ($session_life > $inactive_time) {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }

    // Update the last activity time
    $_SESSION['last_activity'] = time();
} else {
    // If the user is not logged in, redirect to index.php
    header('Location: index.php');
    exit();
}
?>
