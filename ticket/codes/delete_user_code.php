<?php
session_start();
$logFilePath = __DIR__ . '/error_log.txt';
ini_set('log_errors', 1);
ini_set('error_log', $logFilePath);
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $deleteId = isset($_POST['userId']) ? $_POST['userId'] : 'NA';
            // Delete user from the database
            $query = "DELETE FROM users WHERE id= :deleteId";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':deleteId', $deleteId, PDO::PARAM_STR);


            // Use a try-catch block to catch any exceptions
            try {
                $success = $stmt->execute();

                if ($success) {
                    $successMessage = 'User Deleted successfully.';
                    echo json_encode(['success' => true, 'message' => $successMessage]);
                    error_log('Success: ' . $successMessage, 3, $logFilePath);
                } else {
                    $errorMessage = 'An error occurred while processing the request.';
                    echo json_encode(['success' => false,'message' => $errorMessage]);
                    error_log('Error: ' . $errorMessage, 3, $logFilePath);
                }
            } catch (PDOException $e) {
                // Log the error to the specified file
                $errorMessage = 'An error occurred while processing the request: ' . $e->getMessage();
                echo json_encode(['success' => false,'message' => $errorMessage]);
                error_log('Error: ' . $errorMessage, 3, $logFilePath);
            }
        } else {
    $errorMessage = 'Invalid request';
    echo json_encode(['error' => $errorMessage]);
    error_log('Error: ' . $errorMessage, 3, $logFilePath);
}
?>
