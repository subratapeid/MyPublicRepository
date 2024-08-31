<?php
session_start();
require_once('../config.php');
header('Content-Type: application/json');

$auditNumber = $_SESSION["auditNumber"];

function convertToFrontendFormat($dbDate) {
    $dateTime = new DateTime($dbDate);
    return $dateTime->format('d-M-Y, h:i A');
}

try {

    $audit_number = $auditNumber; // Replace with your actual audit number

    $stmt = $pdo->prepare("
        SELECT a.signature_data_url, u.emp_id, CONCAT(u.user_first_name, ' ', u.user_last_name) AS full_name, a.date
        FROM auditor_and_signature a
        JOIN all_user_data u ON a.emp_id = u.emp_id
        WHERE a.audit_number = :audit_number
    ");
    $stmt->bindParam(':audit_number', $audit_number, PDO::PARAM_STR);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Format the signature_date for each result
    foreach ($results as &$row) {
        $row['formatted_signature_date'] = convertToFrontendFormat($row['date']);
    }

    echo json_encode($results); // Return results as JSON

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]); // Return error as JSON
}
?>




