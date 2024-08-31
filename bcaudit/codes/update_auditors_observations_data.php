<?php
session_start();
// Include the database configuration file
include 'config.php';

// Get JSON data sent from frontend
$data = json_decode(file_get_contents('php://input'), true);

// Extract data from JSON
$selectedAuditors = $data['selectedAuditors'];
$auditorsToDelete = $data['auditorsToDelete'];
$signatures = $data['signatures'];
$conclusion = $data['conclusion'];
$recommendations = $data['recommendations'];
$auditId = $_SESSION['auditNumber']; // Assuming auditId is stored in session

// Start transaction
try {
    // Insert or update auditors and their signatures start
    // foreach ($signatures as $signature) {
    //     $empId = $signature['empId'];
    //     $dataUrl = $signature['dataUrl'];
    //     $frontendDate = $signature['date'];
    //     $date = convertToDatabaseFormat($frontendDate);

    //     // Check if auditor already exists
    //     $stmt = $pdo->prepare("SELECT id FROM auditor_and_signature WHERE emp_id = :empId AND audit_number = :auditId");
    //     $stmt->bindParam(':empId', $empId);
    //     $stmt->bindParam(':auditId', $auditId);
    //     $stmt->execute();
    //     $auditorId = $stmt->fetchColumn();

    //     if (!$auditorId) {
    //         // Auditor does not exist, insert new auditor
    //         $stmt = $pdo->prepare("INSERT INTO auditor_and_signature (emp_id, signature_data_url, date, audit_number) VALUES (:empId, :dataUrl, :date, :auditId)");
    //         $stmt->bindParam(':empId', $empId);
    //         $stmt->bindParam(':dataUrl', $dataUrl);
    //         $stmt->bindParam(':date', $date);
    //         $stmt->bindParam(':auditId', $auditId);
    //         $stmt->execute();
    //         $auditorId = $pdo->lastInsertId(); // Get the ID of the newly inserted row
    //     } else {
    //         // Auditor exists, update the existing record
    //         $stmt = $pdo->prepare("UPDATE auditor_and_signature SET signature_data_url = :dataUrl, date = :date WHERE emp_id = :empId AND audit_number = :auditId");
    //         $stmt->bindParam(':empId', $empId);
    //         $stmt->bindParam(':dataUrl', $dataUrl);
    //         $stmt->bindParam(':date', $date);
    //         $stmt->bindParam(':auditId', $auditId);
    //         $stmt->execute();
    //     }
        
    // }
    // // Insert or update auditors and their signatures End

    // // Delete auditors marked for deletion
    // foreach ($auditorsToDelete as $empId) {
    //     $stmt = $pdo->prepare("DELETE FROM auditor_and_signature WHERE emp_id = :empId AND audit_number = :auditId");
    //     $stmt->bindParam(':empId', $empId);
    //     $stmt->bindParam(':auditId', $auditId);
    //     $stmt->execute();
    // }


// Function to save the image data and return the URL
function saveImageAndGetUrl($dataUrl, $empId, $auditId) {
    // Check if the data URL is valid base64 encoded PNG data
    if (preg_match('/^data:image\/png;base64,[A-Za-z0-9+\/=]+$/', $dataUrl)) {
        // Decode the base64 encoded image data
        list($type, $data) = explode(';', $dataUrl);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);

        // Set the file path and name
        $filePath = 'uploads/signatures/';
        if (!file_exists($filePath)) {
            mkdir($filePath, 0755, true);
        }
        $fileName = $empId . '_' . $auditId . '_' . uniqid() . '.png'; // Use uniqid() to ensure unique filenames
        $fullPath = $filePath . $fileName;

        // Save the file
        file_put_contents($fullPath, $data);

        // Generate the URL (adjust the base URL as per your server configuration)
        $baseUrl = '/bcaudit/codes/'; // Replace with your base URL
        $url = $baseUrl . $fullPath;

        return $url;
    }

    // If not valid, return an empty string
    return '';
}

// Insert or update auditors and their signatures start
foreach ($signatures as $signature) {
    $empId = $signature['empId'];
    $dataUrl = $signature['dataUrl'];
    $frontendDate = $signature['date'];
    $date = convertToDatabaseFormat($frontendDate);

    // Save the new image and get the URL
    $newImageUrl = saveImageAndGetUrl($dataUrl, $empId, $auditId);

    // If the newImageUrl is empty, skip the current iteration
    if (empty($newImageUrl)) {
        continue;
    }

    // Check if auditor already exists
    $stmt = $pdo->prepare("SELECT signature_data_url FROM auditor_and_signature WHERE emp_id = :empId AND audit_number = :auditId");
    $stmt->bindParam(':empId', $empId);
    $stmt->bindParam(':auditId', $auditId);
    $stmt->execute();
    $oldImageUrl = $stmt->fetchColumn();

    if (!$oldImageUrl) {
        // Auditor does not exist, insert new auditor
        $stmt = $pdo->prepare("INSERT INTO auditor_and_signature (emp_id, signature_data_url, date, audit_number) VALUES (:empId, :dataUrl, :date, :auditId)");
        $stmt->bindParam(':empId', $empId);
        $stmt->bindParam(':dataUrl', $newImageUrl);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':auditId', $auditId);
        $stmt->execute();
    } else {
        // Auditor exists, update the existing record if the new image URL is different
        if ($oldImageUrl) {
            $stmt = $pdo->prepare("UPDATE auditor_and_signature SET signature_data_url = :dataUrl, date = :date WHERE emp_id = :empId AND audit_number = :auditId");
            $stmt->bindParam(':empId', $empId);
            $stmt->bindParam(':dataUrl', $newImageUrl);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':auditId', $auditId);
            $stmt->execute();

            // Delete the old image file if the URL is different
            $oldImagePath = str_replace('/bcaudit/codes/', '', $oldImageUrl);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
    }
}

// Delete auditors marked for deletion
foreach ($auditorsToDelete as $empId) {
    // Get the URL of the signature to delete the file
    $stmt = $pdo->prepare("SELECT signature_data_url FROM auditor_and_signature WHERE emp_id = :empId AND audit_number = :auditId");
    $stmt->bindParam(':empId', $empId);
    $stmt->bindParam(':auditId', $auditId);
    $stmt->execute();
    $imageUrl = $stmt->fetchColumn();

    // Delete the database record
    $stmt = $pdo->prepare("DELETE FROM auditor_and_signature WHERE emp_id = :empId AND audit_number = :auditId");
    $stmt->bindParam(':empId', $empId);
    $stmt->bindParam(':auditId', $auditId);
    $stmt->execute();

    // Delete the image file
    $imagePath = str_replace('/bcaudit/codes/', '', $imageUrl);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}




        // Check if auditNumber exists in auditor_observation table
//         $stmt = $pdo->prepare("SELECT id FROM auditor_observation WHERE audit_number = :auditId");
//         $stmt->bindParam(':auditId', $auditId);
//         $stmt->execute();
//         $auditNumberFound = $stmt->fetchColumn();
// if ($auditNumberFound){
     // AuditNumber exists, update the existing record
     $stmt = $pdo->prepare("UPDATE auditor_observation SET conclusion = :conclusion, recommendations = :recommendations WHERE audit_number = :auditId");
     $stmt->bindParam(':conclusion', $conclusion);
     $stmt->bindParam(':recommendations', $recommendations);
     $stmt->bindParam(':auditId', $auditId);
     $stmt->execute();
// } else {
//     $stmt = $pdo->prepare("INSERT INTO auditor_observation (audit_number, conclusion, recommendations) VALUES (:auditId, :conclusion, :recommendations) WHERE audit_number = :auditId");
//      $stmt->bindParam(':conclusion', $conclusion);
//      $stmt->bindParam(':recommendations', $recommendations);
//      $stmt->bindParam(':auditId', $auditId);
//      $stmt->execute();
// }
    echo json_encode(['status' => 'ok']);
    $pdo = null;

} catch (PDOException $e) {
    // Rollback transaction on error
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => 'Error saving data: ' . $e->getMessage()]);
}

// Function to convert frontend date to database format
function convertToDatabaseFormat($frontendDate) {
    $dateTime = DateTime::createFromFormat('d-M-Y, h:i A', $frontendDate);
    return $dateTime->format('y-m-d H:i:s');
}

?>
