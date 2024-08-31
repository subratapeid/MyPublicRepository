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
    $title = isset($_POST['title']) ? $_POST['title'] : 'NA';
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : 'NA';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : 'NA';
    $bcId = isset($_POST['bcId']) ? $_POST['bcId'] : 'NA';
    $cardId = isset($_POST['cardId']) ? $_POST['cardId'] : 'NA';
    $terminalId = isset($_POST['terminalId']) ? $_POST['terminalId'] : 'NA';
    $bank = isset($_POST['bank']) ? $_POST['bank'] : 'NA';
    $ifscCode = isset($_POST['ifscCode']) ? $_POST['ifscCode'] : 'NA';
    $poolAccountNo = isset($_POST['poolAccountNo']) ? $_POST['poolAccountNo'] : 'NA';
    $poPin = isset($_POST['poPin']) ? $_POST['poPin'] : 'NA';
    $poOffice = isset($_POST['poOffice']) ? $_POST['poOffice'] : 'NA';
    $poId = isset($_POST['poId']) ? $_POST['poId'] : 'NA';
    $location = isset($_POST['city']) ? $_POST['city'] : 'NA';

    $email = isset($_POST['email']) ? $_POST['email'] : 'NA';
    $userMobile = isset($_POST['userMobile']) ? $_POST['userMobile'] : 'NA';
    
    $status = "Active";
    $loggedInUserId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // Check if the email already exists
    $stmtCheckEmail = $pdo->prepare("SELECT COUNT(*) FROM bc_details WHERE bc_id = :bcId");
    $stmtCheckEmail->bindParam(':bcId', $bcId, PDO::PARAM_STR);
    $stmtCheckEmail->execute();
    $emailCount = $stmtCheckEmail->fetchColumn();

    if ($emailCount > 0) {
        // Email already exists, handle accordingly
        $errorMessage = 'Entered Bc Id Already Exists.';
        echo json_encode(['error' => $errorMessage]);
        error_log('Error: ' . $errorMessage, 3, $logFilePath);
    } else {
            // Insert data into the database
            $query = "INSERT INTO bc_details (title, bc_first_name, bc_last_name, bc_id, card_id, terminal_id, bank, ifsc_code, pool_account_no, po_pin, po_name, po_id, bc_temp_email, bc_temp_mobile, location, status, created_by_id, created_date)
                      VALUES (:title, :firstName, :lastName, :bcId, :cardId, :terminalId, :bank, :ifscCode, :poolAccountNo, :poPin, :poOffice, :poId, :email, :userMobile, :location, :status, :loggedInUserId, :createdOn)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $stmt->bindParam(':bcId', $bcId, PDO::PARAM_STR);
            $stmt->bindParam(':cardId', $cardId, PDO::PARAM_STR);
            $stmt->bindParam(':terminalId', $terminalId, PDO::PARAM_STR);
            $stmt->bindParam(':bank', $bank, PDO::PARAM_STR);
            $stmt->bindParam(':ifscCode', $ifscCode, PDO::PARAM_STR);
            $stmt->bindParam(':poolAccountNo', $poolAccountNo, PDO::PARAM_STR);
            $stmt->bindParam(':poPin', $poPin, PDO::PARAM_INT);
            $stmt->bindParam(':poOffice', $poOffice, PDO::PARAM_STR);
            $stmt->bindParam(':poId', $poId, PDO::PARAM_INT);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':userMobile', $userMobile, PDO::PARAM_STR);
            $stmt->bindParam(':location', $location, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':loggedInUserId', $loggedInUserId, PDO::PARAM_STR);
            $stmt->bindParam(':createdOn', $dateAndTime, PDO::PARAM_STR);

            // Use a try-catch block to catch any exceptions
            try {
                $success = $stmt->execute();

                if ($success) {
                    $successMessage = 'BC created successfully.';
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
} else {
    $errorMessage = 'Invalid request';
    echo json_encode(['error' => $errorMessage]);
    error_log('Error: ' . $errorMessage, 3, $logFilePath);
}
?>
