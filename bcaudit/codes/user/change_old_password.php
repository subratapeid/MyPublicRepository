<?php
session_start();
// Include config.php
require_once '../config.php';
$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $strength = $_POST['strength'];
    $passStatus = "custom";

    // Fetch old password from db
    $stmt = $pdo->prepare('SELECT password FROM all_user_data WHERE user_id = ?');
    $stmt->execute([$userId]);
    $user = $stmt->fetch();

    // Check old password is correct or not
    if (password_verify($oldPassword, $user['password'])) {
        if (!password_verify($newPassword, $user['password'])) {
            if($newPassword === $confirmPassword){
                if($strength > 59){
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the new password in the database
            $updateStmt = $pdo->prepare('UPDATE all_user_data SET password_status = ?, password = ? WHERE user_id = ?');
            if ($updateStmt->execute([$passStatus, $hashedPassword, $userId])) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Password changed successfully! Please Re-Login',
                    'redirect' => 'logout.php'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Some error in updating password.',
                    'redirect' => '#'
                );
            }
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'New Password is weak, Please make it strong',
                'redirect' => '#'
            );
        }
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'New & Confirm password do not match.',
                'redirect' => '#'
            );
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => "Current & New Password Can't be same",
            'redirect' => '#'
        );
    }
    } else {
        $response = array(
            'status' => 'error',
            'message' => "Entered Current password is Incorrect",
            'redirect' => '#'
        );
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
} else {
    echo '<script>alert("You are not allowed to access this page."); window.location.href = "../index.php";</script>';
    exit();
}
?>
