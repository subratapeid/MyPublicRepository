<?php
session_start();
$logFilePath = __DIR__ . '/error_log.txt';
ini_set('log_errors', 1);
ini_set('error_log', $logFilePath);
include 'config.php';

include "getDateTime.php";
// Call the getDateTime() function to fetch the current date and time
$dateAndTime = getDateTime();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : 'NA';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : 'NA';
    $email = isset($_POST['email']) ? $_POST['email'] : 'NA';
    $userMobile = isset($_POST['userMobile']) ? $_POST['userMobile'] : 'NA';
    $role = isset($_POST['role']) ? $_POST['role'] : '';
    $department = isset($_POST['depertment']) ? $_POST['depertment'] : 'NA';
    $pin = isset($_POST['pin']) ? $_POST['pin'] : 'NA';
    $officeId = isset($_POST['office']) ? $_POST['office'] : 'NA';
    $officeName = isset($_POST['officeName']) ? $_POST['officeName'] : 'NA';
    $password = 12345; // Default password is '12345'
    $passwordStatus = "default";
    $status = "Inactive";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $loggedInUserId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    if ($role == "Admin" || $role == "Executive" || $role == "Manager") {
        $officeId = 101010;
        $officeName = "Bangalore";
    } else {
        $officeId = isset($_POST['office']) ? $_POST['office'] : 'NA';
        $officeName = isset($_POST['officeName']) ? $_POST['officeName'] : 'NA';
    }
    // Check if the email already exists
    $stmtCheckEmail = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
    $stmtCheckEmail->bindParam(':email', $email, PDO::PARAM_STR);
    $stmtCheckEmail->execute();
    $emailCount = $stmtCheckEmail->fetchColumn();

    if ($emailCount > 0) {
        // Email already exists, handle accordingly
        $errorMessage = 'Entered Email Already Exists.';
        echo json_encode(['error' => $errorMessage]);
        error_log('Error: ' . $errorMessage, 3, $logFilePath);
    } else {
        // Generate a unique username using the first name and two random digits
        do {
            $randomDigits = str_pad(mt_rand(1, 99), 2, '0', STR_PAD_LEFT);
            $username = strtolower($firstName . $randomDigits);

            // Check if the username already exists
            $stmtCheckUsername = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
            $stmtCheckUsername->bindParam(':username', $username, PDO::PARAM_STR);
            $stmtCheckUsername->execute();
            $usernameCount = $stmtCheckUsername->fetchColumn();
        } while ($usernameCount > 0);
        
        if ($usernameCount > 0) {
            // Username already exists, handle accordingly
            $errorMessage = 'Username already exists.';
            echo json_encode(['error' => $errorMessage]);
            error_log('Error: ' . $errorMessage, 3, $logFilePath);
        } else {
            // Insert data into the database
            $query = "INSERT INTO users (first_name, last_name, username, email, mobile, role, department, pin, office_id, office, password, password_status, status, created_by_id, created_on)
                      VALUES (:firstName, :lastName, :username, :email, :userMobile, :role, :department, :pin, :office_id, :officeName, :hashedPassword, :passwordStatus, :status, :loggedInUserId, :createdOn)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':userMobile', $userMobile, PDO::PARAM_STR);
            $stmt->bindParam(':role', $role, PDO::PARAM_STR);
            $stmt->bindParam(':department', $department, PDO::PARAM_STR);
            $stmt->bindParam(':pin', $pin, PDO::PARAM_STR);
            $stmt->bindParam(':office_id', $officeId, PDO::PARAM_INT);
            $stmt->bindParam(':officeName', $officeName, PDO::PARAM_STR);
            $stmt->bindParam(':hashedPassword', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':passwordStatus', $passwordStatus, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':loggedInUserId', $loggedInUserId, PDO::PARAM_STR);
            $stmt->bindParam(':createdOn', $dateAndTime, PDO::PARAM_STR);

            // Use a try-catch block to catch any exceptions
            try {
                $success = $stmt->execute();

                if ($success) {
                    $successMessage = 'User created successfully.';
                    echo json_encode(['success' => true]);
                    error_log('Success: ' . $successMessage, 3, $logFilePath);
                } else {
                    $errorMessage = 'An error occurred while processing the request.';
                    echo json_encode(['error' => $errorMessage]);
                    error_log('Error: ' . $errorMessage, 3, $logFilePath);
                }
            } catch (PDOException $e) {
                // Log the error to the specified file
                $errorMessage = 'An error occurred while processing the request: ' . $e->getMessage();
                echo json_encode(['error' => $errorMessage]);
                error_log('Error: ' . $errorMessage, 3, $logFilePath);
            }
        }
    }
} else {
    $errorMessage = 'Invalid request';
    echo json_encode(['error' => $errorMessage]);
    error_log('Error: ' . $errorMessage, 3, $logFilePath);
}
?>
