<?php
session_start();

// Include config.php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['newPassword'];
    
    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the password in the database for the logged-in user
    $stmt = $pdo->prepare('UPDATE users SET password = ?, password_status = ? WHERE id = ?');
    $stmt->execute([$hashedPassword, 'custom', $_SESSION['user_id']]);
    $_SESSION['is_logged_in'] = false;
    $_SESSION['requires_password_change'] = false;    
    
    echo json_encode(['status' => 'success']);
}
?>
