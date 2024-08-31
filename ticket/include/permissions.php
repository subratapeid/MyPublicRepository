<?php
session_start();
require 'connection.php';
function isLoggedIn() {
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true;
}
// Function to check if a password change is required
function requiresPasswordChange() {
    return isset($_SESSION['requires_password_change']) && $_SESSION['requires_password_change'] === true;
}
// Function to get permissions for the logged-in user
function getUserPermissions() {
    global $pdo;
    $userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : 'Guest';
    $stmt = $pdo->prepare('SELECT permission_name FROM permissions WHERE id IN (SELECT permission_id FROM role_permissions WHERE role_id = (SELECT id FROM roles WHERE role_name = ?))');
    $stmt->execute([$userRole]);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}
// Check if the user is logged in
if(isset($_SESSION['user_id'])) {
    // Get the user ID from the session
    $userId = $_SESSION['user_id'];
// Query the database to retrieve the password status for the logged-in user
$query = "SELECT password_status FROM users WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$userId]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the query was successful and the password status is not "custom"
if($row && $row['password_status'] !== "custom") {
    // Redirect the user to changepassword.php
    header("Location: change-default-password.php");
    exit; // Stop further execution
}
}

// Function to check if the user has a specific permission
function hasPermission($requiredPermission) {
    // Check if a password change is required
    if (requiresPasswordChange()) {
        echo '<script>window.location.href = "change-default-password.php";</script>';// Redirect to the change password page if a password change is required
        exit;
    }
    // Check if the user has the required permission
    $userPermissions = getUserPermissions();
    return in_array($requiredPermission, $userPermissions);
}
?>
