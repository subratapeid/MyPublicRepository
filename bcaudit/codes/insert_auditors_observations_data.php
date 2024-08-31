<?php
session_start();
include 'verify_audit_session.php';
include 'config.php';
include 'common/getDateTime.php';
header('Content-Type: application/json');

$response = ['status' => '', 'error' => ''];

// Get JSON data sent from frontend
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    $response['status'] = 'error';
    $response['error'] = 'Invalid JSON input';
    echo json_encode($response);
    exit;
}

$dbDatetime = getDateTime(); // get real date and time from common function

// Check if session variables are set
if (!isset($_SESSION['user_id']) || !isset($_SESSION['auditNumber'])) {
    $response['status'] = 'error';
    $response['error'] = 'Session variables not set';
    echo json_encode($response);
    exit;
}

$userId = $_SESSION['user_id'];
$auditId = $_SESSION['auditNumber'];
$progress = 9; // progress value for this form
$status = 'submited'; // Audit Status for this form

// Extract data from JSON
$selectedAuditors = $data['selectedAuditors'] ?? [];
$auditorsToDelete = $data['auditorsToDelete'] ?? [];
$signatures = $data['signatures'] ?? [];
$conclusion = $data['conclusion'] ?? '';
$recommendations = $data['recommendations'] ?? '';

// Validate required fields
if (empty($signatures) || empty($conclusion) || empty($recommendations)) {
    $response['status'] = 'error';
    $response['error'] = 'Required fields missing';
    echo json_encode($response);
    exit;
}

try {
    // Start transaction
    $pdo->beginTransaction();

    // // Process signatures
    // foreach ($signatures as $signature) {
    //     $empId = $signature['empId'];
    //     $dataUrl = $signature['dataUrl'];
    //     $frontendDate = $signature['date'];
    //     $date = convertToDatabaseFormat($frontendDate);

    //     $stmt = $pdo->prepare("INSERT INTO auditor_and_signature (emp_id, signature_data_url, date, audit_number) VALUES (:empId, :dataUrl, :date, :auditId)");
    //     $stmt->bindParam(':empId', $empId);
    //     $stmt->bindParam(':dataUrl', $dataUrl);
    //     $stmt->bindParam(':date', $date);
    //     $stmt->bindParam(':auditId', $auditId);
    //     $stmt->execute();

    //     if ($stmt->rowCount() == 0) {
    //         throw new PDOException("Error inserting signature for emp_id $empId");
    //     }
    // }


// Function to save the image data and return the URL
function saveImageAndGetUrl($dataUrl, $empId, $auditId) {
    // Decode the base64 encoded image data
    list($type, $data) = explode(';', $dataUrl);
    list(, $data) = explode(',', $data);
    $data = base64_decode($data);

    // Set the file path and name
    $filePath = 'uploads/signatures/';
    if (!file_exists($filePath)) {
        mkdir($filePath, 0755, true);
    }
    $fileName = $empId . '_' . $auditId . '_' . uniqid() . '.png';
    $fullPath = $filePath . $fileName;

    // Save the file
    file_put_contents($fullPath, $data);

    // Generate the URL (adjust the base URL as per your server configuration)
    $baseUrl = '/bcaudit/codes/'; // Replace with your domain
    $url = $baseUrl . $fullPath;

    return $url;
}

// Process signatures
foreach ($signatures as $signature) {
    $empId = $signature['empId'];
    $dataUrl = $signature['dataUrl'];
    $frontendDate = $signature['date'];
    $date = convertToDatabaseFormat($frontendDate);

    // Save the image data and get the URL
    $imageUrl = saveImageAndGetUrl($dataUrl, $empId, $auditId);

    $stmt = $pdo->prepare("INSERT INTO auditor_and_signature (emp_id, signature_data_url, date, audit_number) VALUES (:empId, :imageUrl, :date, :auditId)");
    $stmt->bindParam(':empId', $empId);
    $stmt->bindParam(':imageUrl', $imageUrl);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':auditId', $auditId);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        throw new PDOException("Error inserting signature for emp_id $empId");
    }
}

    // Insert auditor observations
    $stmt = $pdo->prepare("INSERT INTO auditor_observation (audit_number, conclusion, recommendations, created_by_id, created_date, last_updated_date) 
        VALUES (:auditId, :conclusion, :recommendations, :createdById, :createdDate, :lastUpdatedDate)");
    $stmt->bindParam(':auditId', $auditId);
    $stmt->bindParam(':conclusion', $conclusion);
    $stmt->bindParam(':recommendations', $recommendations);
    $stmt->bindParam(':createdById', $userId);
    $stmt->bindParam(':createdDate', $dbDatetime);
    $stmt->bindParam(':lastUpdatedDate', $dbDatetime);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        throw new PDOException("Error inserting auditor observations Data");
    }

    // Update Audit Status progress and updated date
    $stmt = $pdo->prepare("UPDATE audit_list SET progress = :progress, status = :status, last_updated_by_id = :lastUpdatedBy, last_updated_date = :lastUpdatedDate WHERE audit_number = :auditNumber");
    $stmt->bindParam(':progress', $progress);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':lastUpdatedBy', $userId);
    $stmt->bindParam(':lastUpdatedDate', $dbDatetime);
    $stmt->bindParam(':auditNumber', $auditId);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        throw new PDOException("Error Updating Audit Progress");
    }

    // Commit transaction
    $pdo->commit();

    $response['status'] = 'success';
    $response['message'] = 'Data inserted successfully';
    echo json_encode($response);

} catch (PDOException $e) {
    // Rollback transaction on error
    $pdo->rollBack();
    $response['status'] = 'error';
    $response['error'] = 'Transaction failed: ' . $e->getMessage();
    echo json_encode($response);
}

// Function to convert frontend date to database format
function convertToDatabaseFormat($frontendDate) {
    $dateTime = DateTime::createFromFormat('d-M-Y, h:i A', $frontendDate);
    return $dateTime->format('Y-m-d H:i:s');
}
?>
