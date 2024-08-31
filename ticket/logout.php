<?php
session_start();

// Check user role
$userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : '';

// Unset and destroy session
session_unset();
session_destroy();

// Redirect based on user role
if ($userRole === 'BC') {
    header('Location: bc-login.php');
} else {
    header('Location: user-login.php');
}

exit();

?>
