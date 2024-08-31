<?php
require_once('config.php');
include "getDateTime.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
// Call the getDateTime() function to fetch the current date and time
$dateAndTime = getDateTime();

// $logFilePath = 'error_log.txt';

// Function to log data to a file
// function logData($data)
// {
//     $logFile = 'post_data_log.txt';
//     $logMessage = date('Y-m-d H:i:s') . ' - ' . print_r($data, true) . PHP_EOL;
//     file_put_contents($logFile, $logMessage, FILE_APPEND);
// }

// Generate ticket_id
function generateUniqueSerialNumber($pdo)
{
    // Get the last ticket_id from the database
    $getLastSerialQuery = "SELECT MAX(ticket_id) AS last_serial FROM tickets";
    $result = $pdo->query($getLastSerialQuery);

    if ($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $lastSerialNumber = $row["last_serial"];
        // Increment the last serial number for uniqueness
        $serialNumber = $lastSerialNumber + 1;
    } else {
        // If no existing records, start with a default value
        $serialNumber = 10000;
    }

    return $serialNumber;
}

// Form variables for insert into DB
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $createdByRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : 'NA';
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'NA';

    $bcName = isset($_POST['fullName']) ? $_POST['fullName']: 'NA';
    $issueType = isset($_POST['issueType']) ? $_POST['issueType'] : 'NA';
    $remarks = isset($_POST['remarks']) ? $_POST['remarks'] : 'NA';
    $issue = isset($_POST['issues']) ? $_POST['issues'] : $remarks;
    $userMobile = isset($_POST['mobile']) ? $_POST['mobile'] : 'NA';
    $email = isset($_POST['emailId']) ? $_POST['emailId'] : 'NA';
    $remarks = isset($_POST['remarks']) ? $_POST['remarks'] : 'NA';
    $department = isset($_POST['department']) ? $_POST['department'] : 'NA';
    $pin = isset($_POST['poPin']) ? $_POST['poPin'] : 'NA';
    $officeId = isset($_POST['officeId']) ? $_POST['officeId'] : 'NA';
    $officeName = isset($_POST['officeName']) ? $_POST['officeName'] : 'NA';
    $status = 'Open';
    $img_path = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $img_path = $target_file;
    }

    // Generate a unique ticket_id
    $ticketId = generateUniqueSerialNumber($pdo);

    
    // Log the received data
    // $logData = [
    //     'TicketID' => $ticketId,
    //     'BCID' => $bcId,
    //     'issueType' => $issueType,
    //     'userMobile' => $userMobile,
    //     'email' => $email,
    //     'remarks' => $remarks,
    //     'department' => $department,
    //     'pin' => $pin,
    //     'office' => $office,
    //     'img_path' => $img_path,
    // ];

    // logData($logData);

// INSERT query
$insertQuery = "INSERT INTO tickets (ticket_id, created_by_id, created_by_role, created_by, issue_type, issue, mobile, ticket_email, image, office_pin, office_id, office_name, status, created_date) 
                VALUES (:ticketId, :userId, :createdByRole, :bcName, :issueType, :issue, :userMobile, :email, :img_path, :pin, :office_id, :office_name, :status, :createdOn)";
$insertStmt = $pdo->prepare($insertQuery);
$insertStmt->bindParam(':ticketId', $ticketId, PDO::PARAM_INT);
$insertStmt->bindParam(':userId', $userId, PDO::PARAM_STR);
$insertStmt->bindParam(':createdByRole', $createdByRole, PDO::PARAM_STR);
$insertStmt->bindParam(':bcName', $bcName, PDO::PARAM_STR);
$insertStmt->bindParam(':issueType', $issueType, PDO::PARAM_STR);
$insertStmt->bindParam(':issue', $issue, PDO::PARAM_STR);
$insertStmt->bindParam(':userMobile', $userMobile, PDO::PARAM_INT);
$insertStmt->bindParam(':email', $email, PDO::PARAM_STR);
$insertStmt->bindParam(':img_path', $img_path, PDO::PARAM_STR);
$insertStmt->bindParam(':pin', $pin, PDO::PARAM_INT);
$insertStmt->bindParam(':office_id', $officeId, PDO::PARAM_INT);
$insertStmt->bindParam(':office_name', $officeName, PDO::PARAM_STR);
$insertStmt->bindParam(':status', $status, PDO::PARAM_STR);
$insertStmt->bindParam(':createdOn', $dateAndTime, PDO::PARAM_STR);

// Use a try-catch block to catch any exceptions
try {
        // Execute INSERT query only if UPDATE was successful
        $insertSuccess = $insertStmt->execute();

        if ($insertSuccess) {
            $successMessage = 'Ticket created successfully.';
            $responseData = ['success' => true, 'ticketId' => $ticketId];
            echo json_encode($responseData);
            // error_log('Success: ' . $successMessage, 3, $logFilePath);
        } else {
            $errorMessage = 'An error occurred while processing the request.';
            echo json_encode(['error' => $errorMessage]);
            // error_log('Error: ' . $errorMessage, 3, $logFilePath);
        }
} catch (PDOException $e) {
    // Log the error to the specified file
    $errorMessage = 'An error occurred while processing the request: ' . $e->getMessage();
    echo json_encode(['error' => $errorMessage]);
    // error_log('Error: ' . $errorMessage, 3, $logFilePath);
}

} else {
    $errorMessage = 'Invalid request';
    echo json_encode(['error' => $errorMessage]);
    // error_log('Error: ' . $errorMessage, 3, $logFilePath);
}

// Close the database connection
$pdo = null;
?>
