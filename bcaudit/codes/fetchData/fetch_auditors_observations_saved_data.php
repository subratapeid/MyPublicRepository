<?php
session_start();

// Include the database configuration file
include '../config.php';
// get_saved_data.php
header('Content-Type: application/json');

// Initialize saved data array

$savedData = [
    'selectedAuditorsAndSignature' => [],
    'inputFieldsData' => []
];
$auditNumber = $_SESSION['auditNumber'];

try {
    // Fetch selected auditors
    $stmt = $pdo->prepare("SELECT emp_id as empId, signature_data_url, date FROM auditor_and_signature
                           WHERE audit_number = :auditNumber");
    $stmt->bindParam(':auditNumber', $auditNumber, PDO::PARAM_STR);
    $stmt->execute();
    $selectedAuditorsAndSignature = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Format the date to frontend format
    foreach ($selectedAuditorsAndSignature as &$auditor) {
    $dbDate = $auditor['date'];
    $frontendDate = convertToFrontendFormat($dbDate); // Function defined earlier
    $auditor['date'] = $frontendDate;
    }
    $savedData['selectedAuditorsAndSignature'] = $selectedAuditorsAndSignature;

    // Fetch input fields data (conclusion and recommendations)
    $stmt = $pdo->prepare("SELECT conclusion, recommendations FROM auditor_observation
        WHERE audit_number = :auditNumber");
    $stmt->bindParam(':auditNumber', $auditNumber, PDO::PARAM_STR);
    $stmt->execute();
    $inputFieldsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $savedData['inputFieldsData'] = $inputFieldsData;

    // Output saved data as JSON
    echo json_encode($savedData);

$pdo = null;

} catch (PDOException $e) {
    // Handle database error
    echo json_encode(['error' => 'Error fetching saved data: ' . $e->getMessage()]);
}

// Function to convert database date to frontend format
function convertToFrontendFormat($dbDate) {
    $dateTime = new DateTime($dbDate);
    return $dateTime->format('d-M-Y, h:i A');
}

?>
